<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'referenceNo' => $this->reference_no,
            'jobPosting' => JobPostingResource::make($this->jobPosting),
            'description' => $this->description,
            'applicantName' => $this->applicant_name,
            'applicantEmail' => $this->applicant_email,
            'applicantPhone' => $this->applicant_phone,
            'expectedSalary' => $this->expected_salary,
            'interviewDate' => $this->interview_date,
            'evaluationRemark' => $this->evaluation_remark,
            'evaluatedAt' => $this->evaluated_at,
            'status' => RefResource::make($this->status),
            'submittedAt' => $this->created_at,
            'statusLog' => StatusLogResource::collection($this->statusLog),
        ];
    }
}
