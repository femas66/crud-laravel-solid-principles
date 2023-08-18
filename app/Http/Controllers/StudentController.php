<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    private StudentInterface $student;
    private ClassroomInterface $classroom;
    private StudentService $service;
    public function __construct(StudentInterface $studentInterface, ClassroomInterface $classroomInterface, StudentService $studentService)
    {
        $this->service = $studentService;
        $this->student = $studentInterface;
        $this->classroom = $classroomInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->student->get();
        return view('student.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = $this->classroom->get();
        return view('student.create', compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $this->service->store($request);
        $this->student->store($data);
        return redirect()->route('student.index')->with('success', 'Berhasil menambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $classrooms = $this->classroom->get();
        return view('student.edit', compact('student', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Student $student)
    {
        $data = $this->service->update($request, $student);
        $this->student->update($student->id,$data);
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $this->student->delete($student->id);
        return back()->with('success', 'Berhasil menghapus');
    }
}
