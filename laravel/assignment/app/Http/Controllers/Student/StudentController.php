<?php

namespace App\Http\Controllers\Student;

use App\Contracts\Services\Student\StudentServiceInterface;
use App\Models\Student;
use App\Models\Major;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * PostInterface
     */
    private $studentInterface;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }

    /**
     * Display a listing of the resource.
     * @param Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $students = $this->studentInterface->index($request);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = $this->studentInterface->create();
        return view('students.create', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'major_id' => 'required',
        ]);
        $this->studentInterface->store($request);
        return redirect('/')->with('success', 'Student created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Student $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $id)
    {
        $majors = $this->studentInterface->edit($id);
        return view('students.edit', [
            'student' => $id,
            'majors' => $majors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request, @param Student $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'major_id' => 'required',
        ]);
        $this->studentInterface->update($request, $id);
        return redirect('/')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param Student $id
     * @return \Illuminate\Http\Response
     */
    public function destory(Student $id)
    {
        $this->studentInterface->destory($id);
        return redirect("/")->with('success', 'Student deleted successfully');
    }

    /**
     * Import / Export Template View
     * @return \Illuminate\Support\Collection
     */
    public function importExportView()
    {
        return view('students.import');
    }

    /**
     * Export Function
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new StudentsExport, 'students.csv');
    }

    /**
     * Import Function
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        Excel::import(new StudentsImport, request()->file('file'));
        return back()->with('success', 'Import Completed');;
    }
}
