<?php

namespace App\Livewire\Forms;

use App\Models\Job\JobPosting;
use Livewire\Form;

class JobPostingForm extends Form
{
    public ?JobPosting $jobPostingModel;

    public $title = '';

    public $description = '';

    public $salary = '';

    public $position_id = '';

    public $position_type_id = '';

    public $start_date = '';

    public $end_date = '';

    public $is_active = false;

    public function rules(): array
    {
        return [
            'title' => 'string',
            'description' => 'string',
            'salary' => 'string',
            'position_id' => 'required',
            'position_type_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'is_active' => 'boolean',
        ];
    }

    public function setJobPostingModel(JobPosting $jobPostingModel): void
    {
        $this->jobPostingModel = $jobPostingModel;

        $this->title = $this->jobPostingModel->title;
        $this->description = $this->jobPostingModel->description;
        $this->salary = $this->jobPostingModel->salary;
        $this->position_id = $this->jobPostingModel->position_id;
        $this->position_type_id = $this->jobPostingModel->position_type_id;
        $this->start_date = $this->jobPostingModel->start_date;
        $this->end_date = $this->jobPostingModel->end_date;
        $this->is_active = $this->jobPostingModel->is_active;
    }

    public function store(): void
    {
        $data = $this->validate();
        $data['created_by'] = auth()->user()->id;

        JobPosting::create($data);

        $this->reset();
    }

    public function update(): void
    {
        $this->jobPostingModel->update($this->validate());

        $this->reset();
    }
}
