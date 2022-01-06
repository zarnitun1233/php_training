<?php

namespace App\Dao\Student;

use App\Models\Student;
use App\Models\Major;
use App\Models\Task;
use App\Models\Post;
use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * Data accessing object for post
 */
class StudentDao implements StudentDaoInterface
{
    /**
     * Home Page Function to show data
     * Search Function
     * @param Request
     */
    public function index(Request $request)
    {
        $students = DB::table('students')
            ->join('majors', 'majors.id', '=', 'students.major_id')
            ->select('students.*', 'majors.major')
            ->orderBy('id');

        $name = $request->name;
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        if ($name) {
            $students->where('students.name', 'LIKE', '%' . $name . '%');
        }
        if ($startDate) {
            $students->where('students.created_at', '>=', $startDate);
        }
        if ($endDate) {
            $students->where('students.created_at', '<=', $endDate);
        }
        return $students->get();
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Major::orderBy('created_at', 'asc')->get();
    }

    /**
     * Show the form for editing the specified resource.
     * @param Student $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $id)
    {
        return Major::orderBy('created_at', 'asc')->get();
    }

    /**
     * Destory Function
     * @param Student $student
     */
    public function destory(Student $student)
    {
        $student->delete();
    }

    /**
     * Store Function
     * @param Request $request
     */
    public function store(Request $request)
    {
        Student::create($request->all());
    }

    /**
     * Update Function
     * @param Request $request, @param Student $student
     */
    public function update(Request $request, Student $id)
    {
        $id->update($request->all());
    }
}
