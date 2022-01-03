<?php

namespace App\Dao\Post;

use App\Models\Student;
use App\Models\Major;
use App\Models\Task;
use App\Models\Post;
use App\Contracts\Dao\Post\PostDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * Data accessing object for post
 */
class PostDao implements PostDaoInterface
{
    /**
     * Home Page Function to show data
     */
    public function index()
    {
        return Student::orderBy('created_at', 'asc')->get();
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
