<?php

namespace App\Http\Controllers\Student;

use App\Contracts\Services\Post\PostServiceInterface;
use App\Models\Student;
use App\Models\Major;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * PostInterface
     */
    private $postInterface;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(PostServiceInterface $postServiceInterface)
    {
        $this->postInterface = $postServiceInterface;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->postInterface->index();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = $this->postInterface->create();
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
        $this->postInterface->store($request);
        return redirect('/')->with('success', 'Student created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Student $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $id)
    {
        $majors = $this->postInterface->edit($id);
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
        $this->postInterface->update($request, $id);
        return redirect('/')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param Student $id
     * @return \Illuminate\Http\Response
     */
    public function destory(Student $id)
    {
        $this->postInterface->destory($id);
        return redirect("/")->with('success', 'Student deleted successfully');
    }
}
