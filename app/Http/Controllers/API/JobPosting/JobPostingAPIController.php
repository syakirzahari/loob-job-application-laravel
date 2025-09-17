<?php

namespace App\Http\Controllers\API\JobPosting;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobPostingResource;
use App\Models\Job\JobPosting;

class JobPostingAPIController extends Controller
{
    public function index()
    {
        $data = JobPosting::with('position', 'positionType')
            ->where('is_active', 1)
            ->where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->get();

        return JobPostingResource::collection($data);
    }
}
