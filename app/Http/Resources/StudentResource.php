<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'image' => $this->image,
            'gender' => $this->gender,
            'classroom_id' => $this->classroom_id,
            'classroom' => [
                'id' => $this->classroom->id,
                'name' => $this->classroom->name,
            ],
        ];
    }
}
