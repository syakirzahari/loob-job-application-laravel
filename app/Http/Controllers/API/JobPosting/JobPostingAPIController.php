<?php

namespace App\Http\Controllers\API\JobPosting;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobPostingResource;
use App\Models\Job\JobPosting;

class JobPostingAPIController extends Controller
{
    public function index()
    {
        $data = JobPosting::jobActive()->with('position', 'positionType')
            ->get();

        return JobPostingResource::collection($data);
    }

    public function show($id)
    {
        $data = JobPosting::with('position', 'positionType')->find($id);

        return JobPostingResource::make($data);
    }
}
