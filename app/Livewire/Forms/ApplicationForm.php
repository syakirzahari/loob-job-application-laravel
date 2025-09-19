<?php

namespace App\Livewire\Forms;

use App\Http\Helpers\ApplicationLogHelper;
use App\Models\Application\Application;
use App\Notifications\ApplicationRejected;
use App\Notifications\InterviewOffer;
use App\Notifications\JobOffer;
use Livewire\Form;
use Notification;

class ApplicationForm extends Form
{
    public ?Application $applicationModel;

    public $reference_no = '';

    public $job_posting_id = '';

    public $user_id = '';

    public $applicant_name = '';

    public $applicant_email = '';

    public $applicant_phone = '';

    public $applicant_address = '';

    public $expected_salary = '';

    public $description = '';

    public $status_id = '';

    public $evaluation_remark = '';

    public $evaluated_by = '';

    public $evaluated_at = '';

    public $interview_date = '';

    public function rules(): array
    {
        return [
            'applicant_email' => 'nullable|string',
            'applicant_phone' => 'string',
            'applicant_address' => 'nullable|string',
            'expected_salary' => 'string',
            'status_id' => 'required',
            'evaluation_remark' => 'required_if:status_id,4',
            'evaluated_by' => 'required_if:status_id,4',
            'interview_date' => 'required_if:status_id,4',
        ];
    }

    public function setApplicationModel(Application $applicationModel): void
    {
        $this->applicationModel = $applicationModel;

        $this->reference_no = $this->applicationModel->reference_no;
        $this->job_posting_id = $this->applicationModel->job_posting_id;
        $this->user_id = $this->applicationModel->user_id;
        $this->applicant_name = $this->applicationModel->applicant_name;
        $this->applicant_email = $this->applicationModel->applicant_email;
        $this->applicant_phone = $this->applicationModel->applicant_phone;
        $this->applicant_address = $this->applicationModel->applicant_address;
        $this->expected_salary = $this->applicationModel->expected_salary;
        $this->description = $this->applicationModel->description;
        $this->status_id = $this->applicationModel->status_id;
        $this->evaluation_remark = $this->applicationModel->evaluation_remark;
        $this->evaluated_by = $this->applicationModel->evaluated_by;
        $this->evaluated_at = $this->applicationModel->evaluated_at;
        $this->interview_date = $this->applicationModel->interview_date;
    }

    public function store(): void
    {
        $this->applicationModel->create($this->validate());

        $this->reset();
    }

    public function update(): void
    {
        $data = $this->validate();
        $data['evaluated_by'] = auth()->user()->id;
        $data['evaluated_at'] = now();

        // store log
        ApplicationLogHelper::store($this->applicationModel->id, $this->applicationModel->status_id, $data['status_id'], auth()->user()->id, $data['evaluation_remark']);

        $this->applicationModel->update($data);

        // if email available, send email updates
        // send email based on status id
        // TO-DO: set email in queue to allow better performance

        if ($this->applicationModel->applicant_email !== null) {
            switch ($this->applicationModel->status_id) {
                case 4:
                    Notification::route('mail', [
                        $this->applicationModel->applicant_email => $this->applicationModel->applicant_name,
                    ])->notify(new InterviewOffer($this->applicationModel));
                    break;
                case 5:
                    Notification::route('mail', [
                        $this->applicationModel->applicant_email => $this->applicationModel->applicant_name,
                    ])->notify(new JobOffer($this->applicationModel));
                    break;
                case 6:
                    Notification::route('mail', [
                        $this->applicationModel->applicant_email => $this->applicationModel->applicant_name,
                    ])->notify(new ApplicationRejected($this->applicationModel));
                    break;
                default:
                    break;
            }
        }

        $this->reset();
    }
}
