<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\SchoolInterface;
use App\Http\Requests\ClassroomRequests\StoreRequest;
use App\Models\Classroom;
use App\Services\ClassroomService;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

    private ClassroomService $service;
    private ClassroomInterface $classroom;
    private SchoolInterface $school;
    public function __construct(ClassroomService $classroomService, ClassroomInterface $classroomInterface, SchoolInterface $schoolInterface)
    {
        $this->school = $schoolInterface;
        $this->classroom = $classroomInterface;
        $this->service = $classroomService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->classroom->get();
        return view('classroom.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = $this->school->get();
        return view('classroom.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $this->service->create($request);
        $this->classroom->store($data);
        return redirect()->route('classroom.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        if (!$this->classroom->delete($classroom->id)) {
            return back()->with('error', 'Data masih digunakan');
        }
        return back()->with('success', 'Berhasil menghapus');
    }
}
