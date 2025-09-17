<?php

namespace App\Livewire\JobPostings;

use App\Models\Job\JobPosting;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 10;
    public $sortDirection = 'ASC';

    public function setSortFunctionality($columnName){
        if ($this->sortByColumn == $columnName) {
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortByColumn = $columnName;
        $this->sortDirection = 'ASC';
    }

    public function render(): View
    {
        $jobPostings = JobPosting::when($this->search, function ($q, $search) {
                            $q->where('title', 'like', '%' . $search . '%')
                                ->orWhere('description', 'like', '%' . $search . '%');
                        })
                        ->paginate($this->perPage);

        return view('livewire.job-posting.index', compact('jobPostings'));
    }

    public function delete(JobPosting $jobPosting)
    {
        $jobPosting->delete();

        return $this->redirectRoute('job-postings.index', navigate: true);
    }
}
