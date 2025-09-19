<?php

namespace App\Http\Controllers\API\Application;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApplicationLogHelper;
use App\Http\Requests\ApplicationRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application\Application;
use App\Notifications\ApplicationReceived;
use Illuminate\Http\Request;
use Notification;
use Str;

class ApplicationAPIController extends Controller
{
    public function checkApplication(Request $request)
    {
        $input = $request->only('keyword');

        if (! $input) {
            return response()->json([
                'success' => false,
                'message' => 'Keyword is required',
            ], 400);
        }

        $data = Application::with('status', 'jobPosting', 'statusLog')
            ->when($input, function ($query) use ($input) {
                return $query->searchCandidateApplication($input['keyword']);
            })
            ->get();

        return ApplicationResource::collection($data);
    }

    public function store(ApplicationRequest $request)
    {
        $input = $request->validated();

        $application = Application::where('job_posting_id', $input['job_posting_id'])
            ->where(function ($q) use ($input) {
                $q->where('applicant_email', $input['applicant_email'])
                    ->orWhere('applicant_phone', $input['applicant_phone']);
            })
            ->first();

        if ($application) {
            return response()->json([
                'status' => false,
                'message' => 'Application already exist',
            ], 409);
        }

        $input['reference_no'] = self::generateReferenceNo();
        $input['status_id'] = 2;

        $application = Application::create($input);

        if ($request->has('file')) {
            $details->addMedia($request->file)
                ->withCustomProperties(['type' => 'application', 'slug' => $application->id])
                ->toMediaCollection('application');
        }

        ApplicationLogHelper::store($application->id, $application->status_id, $application->status_id, null, null);

        if ($application->applicant_email !== null) {
            Notification::route('mail', [
                $application->applicant_email => $application->applicant_name,
            ])->notify(new ApplicationReceived($application));
        }

        return [
            'status' => true,
            'message' => 'Application created successfully',
            'data' => ApplicationResource::make($application),
        ];
    }

    public function generateReferenceNo()
    {
        $timestamp = now()->format('YmdHis');

        $random = Str::upper(Str::random(4));

        return "REF-{$timestamp}{$random}";
    }
}
