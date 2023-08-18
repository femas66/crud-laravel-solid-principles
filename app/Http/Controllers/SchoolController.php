<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SchoolInterface;
use App\Http\Requests\SchoolRequests\StoreRequest;
use App\Http\Requests\SchoolRequests\UpdateRequest;
use App\Models\School;
use App\Services\SchoolService;
use Illuminate\Http\Request;

class SchoolController extends Controller
{

    private SchoolInterface $school;
    private SchoolService $service;
    public function __construct(SchoolInterface $schoolInterface, SchoolService $schoolService)
    {
        $this->service = $schoolService;
        $this->school = $schoolInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->school->get();
        return view('school.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('school.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $this->service->create($request);
        $this->school->store($data);
        return redirect()->route('school.index')->with('success', 'Berhasil menambah sekolah');
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        $data = $school;
        return view('school.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, School $school)
    {
        $data = $this->service->update($school, $request);
        $this->school->update($school->id, $data);
        return redirect()->route('school.index')->with('success', 'Berhasil mengedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        if (!$this->school->delete($school->id)) {
            return back()->with('error', 'Data masih digunakan');
        }
        $this->service->remove($school->image);
        return to_route('school.index')->with('success', 'Berhasil menghapus');
    }
}
