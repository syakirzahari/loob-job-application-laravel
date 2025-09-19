<?php

namespace App\Livewire;

use App\Models\Application\Application;
use App\Models\Job\JobPosting;
use DB;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $applications = Application::query()
            ->select([
                DB::raw('COUNT(*) as total'),
                DB::raw('COUNT(CASE WHEN status_id = 5 THEN 1 END) as total_offered'),
                DB::raw('COUNT(CASE WHEN status_id = 6 THEN 1 END) as total_rejected'),
                DB::raw('COUNT(CASE WHEN status_id IN (2,3,4) THEN 1 END) as total_in_progress'),
            ])
            ->first();

        $jobPostings = JobPosting::jobActive()
            ->select('job_postings.id', 'job_postings.title')
            ->leftJoin('applications', 'applications.job_posting_id', '=', 'job_postings.id')
            ->selectRaw('COUNT(applications.id) as total_applications')
            ->groupBy('job_postings.id', 'job_postings.title')
            ->get();

        return view('livewire.dashboard', compact('applications', 'jobPostings'));
    }
}
