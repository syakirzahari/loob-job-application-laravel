<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatusLogResource extends JsonResource
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
            'fromStatusId' => RefResource::make($this->fromStatus),
            'toStatusId' => RefResource::make($this->toStatus),
            'remarks' => $this->remarks,
            'createdAt' => $this->created_at,
        ];
    }
}
