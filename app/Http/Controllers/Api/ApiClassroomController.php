<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequests\StoreRequest;
use App\Http\Requests\SchoolRequests\UpdateRequest;
use App\Http\Resources\ClassroomResource;
use App\Models\Classroom;
use App\Services\ClassroomService;
use Illuminate\Http\Request;

class ApiClassroomController extends Controller
{
    private ClassroomService $service;
    private ClassroomInterface $classroom;

    public function __construct(ClassroomInterface $classroomInterface, ClassroomService $classroomService)
    {
        $this->service = $classroomService;
        $this->classroom = $classroomInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->classroom->get();
        return ResponseHelper::success(ClassroomResource::collection($data), "Berhasil mengambil semua data classroom");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $this->service->create($request);
        if (!$this->classroom->store($data)) {
            return ResponseHelper::error(null, "Foreign key tidak valid");
        }
        return ResponseHelper::success(null, "Berhasil menambah data classroom");
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom_api)
    {
        $classroom_api = $classroom_api->with('school')->first();
        return ResponseHelper::success(ClassroomResource::make($classroom_api), 'Berhasil mengambil data classroom');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom_api)
    {
        if (!$this->classroom->delete($classroom_api->id)) {
            return ResponseHelper::error(null, "Data masih digunakan");
        }
        return ResponseHelper::success(null, "Berhasil menghapus data classroom");
    }
}
