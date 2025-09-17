<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobPostingResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'salary' => $this->salary,
            'position' => RefResource::make($this->position),
            'positionType' => RefResource::make($this->positionType),
            'startDate' => $this->start_date->format('d-m-Y'),
            'endDate' => $this->end_date->format('d-m-Y'),
            'isActive' => $this->is_active,
            'createdAt' => $this->created_at,
        ];
    }
}
