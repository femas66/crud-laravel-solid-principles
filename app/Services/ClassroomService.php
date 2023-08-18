<?php

namespace App\Services;

use App\Http\Requests\ClassroomRequests\StoreRequest;

class ClassroomService
{
    public function create(StoreRequest $storeRequest): array
    {
        $data = $storeRequest->validated();
        return [
            'school_id' => $data['school_id'],
            'name' => $data['name'],
        ];
    }

    public function update(StoreRequest $updateRequest): array
    {
        $data = $updateRequest->validated();
        return [
            'school_id' => $data['school_id'],
            'name' => $data['name'],
        ];
    }
}
