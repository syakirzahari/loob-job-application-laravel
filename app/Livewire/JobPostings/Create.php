<?php

namespace App\Livewire\JobPostings;

use App\Livewire\Forms\JobPostingForm;
use App\Models\Job\JobPosting;
use App\Models\Ref\Position;
use App\Models\Ref\Status;
use Livewire\Component;

class Create extends Component
{
    public JobPostingForm $form;

    public function mount(JobPosting $jobPosting)
    {
        $this->form->setJobPostingModel($jobPosting);
    }

    public function save()
    {
        $this->form->store();

        return $this->redirectRoute('job-postings.index', navigate: true);
    }

    public function render()
    {
        $positions = Position::isActive()->select('name', 'id')->get();
        $statuses = Status::isJobStatus()->select('name', 'id')->get();

        return view('livewire.job-posting.create', compact('positions', 'statuses'));
    }
}
