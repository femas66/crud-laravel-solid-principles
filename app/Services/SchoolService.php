<?php

namespace App\Services;

use App\Base\Interfaces\upload\ShouldHandleFileUpload;
use App\Enums\DiskPathEnum;
use App\Http\Requests\SchoolRequests\StoreRequest;
use App\Http\Requests\SchoolRequests\UpdateRequest;
use App\Models\School;
use App\Traits\UploadTrait;

class SchoolService implements ShouldHandleFileUpload
{
    use UploadTrait;
    public function create(StoreRequest $storeRequest): array
    {
        $data = $storeRequest->validated();
        return [
            'name' => $data['name'],
            'image' => $this->upload(DiskPathEnum::STUDENT->value, $storeRequest->file('image')),
        ];

    }

    public function update(School $school, UpdateRequest $updateRequest): array
    {
        $data = $updateRequest->validated();

        $oldImage = $school->image;

        if ($updateRequest->hasFile('image')) {
            $this->remove($oldImage);
            $oldImage = $this->upload(DiskPathEnum::STUDENT->value, $updateRequest->file('image'));
        }

        return [
            'name' => $data['name'],
            'image' => $oldImage,
        ];
    }
}
