<?php

namespace App\Http\Controllers\Student;

use App\Contracts\Services\Student\StudentServiceInterface;
use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\SendMailDataRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * studentInterface
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
    public function index()
    {
        $students = $this->studentInterface->index();
        return view('students.index')->with('students', $students);
    }

    /**
     * Search Function
     * @param Request $request
     */
    public function search(Request $request)
    {
        $students = $this->studentInterface->search($request);
        return view('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = $this->studentInterface->create();
        return view('students.create')->with('majors', $majors);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $this->studentInterface->store($request);
        $this->studentInterface->sendMail();
        return redirect('/')->with('success', 'Student created and Send Mail successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Student $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $id)
    {
        $majors = $this->studentInterface->edit($id);
        return view('students.edit')->with('student', $id)->with('majors', $majors);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request, @param Student $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        $this->studentInterface->update($request, $id);
        return redirect('/')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param Student $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id)
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
        return $this->studentInterface->export();
    }

    /**
     * Import Function
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        $this->studentInterface->import();
        return redirect("/")->with('success', 'Import Completed');
    }

    /**
     * Send Student Data to email
     * @param Request $request
     */
    public function sendMailData(SendMailDataRequest $request)
    {
        $this->studentInterface->sendMailData($request);
        return redirect("/")->with('success', 'Student Data Sent to email Successfully');
    }

    /**
     * Show Mail Form View Template
     */
    public function sendMailForm()
    {
        return view('students.sendMail');
    }
}
