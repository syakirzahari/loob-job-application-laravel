<?php

namespace App\Livewire\JobPostings;

use App\Livewire\Forms\JobPostingForm;
use App\Models\Job\JobPosting;
use Livewire\Component;

class Show extends Component
{
    public JobPostingForm $form;

    public function mount(JobPosting $jobPosting)
    {
        $this->form->setJobPostingModel($jobPosting);
    }

    public function render()
    {
        return view('livewire.job-posting.show', ['jobPosting' => $this->form->jobPostingModel]);
    }
}
