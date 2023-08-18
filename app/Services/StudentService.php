<?php

namespace App\Services;
use App\Base\Interfaces\upload\ShouldHandleFileUpload;
use App\Enums\DiskPathEnum;
use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;
use App\Traits\UploadTrait;

class StudentService implements ShouldHandleFileUpload
{
    use UploadTrait;

    public function store(StoreRequest $storeRequest): array
    {
        $data = $storeRequest->validated();
        return [
            'name' => $data['name'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'image' => $this->upload(DiskPathEnum::STUDENT->value, $storeRequest->file('image')),
            'classroom_id' => $data['classroom_id'],
        ];
    }

    public function update(UpdateRequest $updateRequest, Student $student): array
    {
        $data = $updateRequest->validated();
        $old_image = $student->image;

        if ($updateRequest->hasFile('image')) {
            $this->remove($old_image);
            $old_image = $this->upload(DiskPathEnum::STUDENT->value, $updateRequest->file('image'));
        }

        return [
            'name' => $data['name'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'image' => $old_image,
            'classroom_id' => $data['classroom_id'],
        ];
    }
}
