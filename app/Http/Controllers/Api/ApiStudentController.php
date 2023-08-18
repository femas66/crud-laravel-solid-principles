<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\StudentInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Http\Request;

class ApiStudentController extends Controller
{

    private StudentService $service;
    private StudentInterface $student;
    public function __construct(StudentService $studentService, StudentInterface $studentInterface)
    {
        $this->service = $studentService;
        $this->student = $studentInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return ResponseHelper::success(StudentResource::collection($this->student->get()), "Berhasil mengambil semua data");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $this->service->store($request);
        if (!$this->student->store($data)) {
            return ResponseHelper::error(null, "Foreign key tidak valid");
        }
        return ResponseHelper::success(null, "Berhasil menambah data");
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student_api)
    {
        return ResponseHelper::success(StudentResource::make($student_api), "Berhasil mengambil data student");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Student $student_api)
    {
        $data = $this->service->update($request, $student_api);
        if (!$this->student->update($student_api->id, $data)) {
            return ResponseHelper::error(null, "Foreign key tidak valid");
        }
        return ResponseHelper::success(null, "Berhasil menyimpan data student");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student_api)
    {
        if (!$this->student->delete($student_api->id)) {
            return ResponseHelper::error(null, "Data masih digunakan");
        }
        return ResponseHelper::success(null, "Berhasil menghapus data student");
    }
}
