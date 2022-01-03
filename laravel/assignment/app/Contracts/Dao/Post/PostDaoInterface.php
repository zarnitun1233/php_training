<?php

namespace App\Contracts\Dao\Post;

use App\Models\Student;
use App\Models\Task;
use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface PostDaoInterface
{
    /**
     * Home Page Function to show data
     */
    public function index();

    /**
     * Show the form for creating a new resource.
     */
    public function create();

    /**
     * Show the form for editing the specified resource.
     * @param Student $id
     */
    public function edit(Student $id);

    /**
     * Delete Function
     * @param Student $student
     */
    public function destory(Student $student);

    /**
     * Store Function
     * @param Request $request
     */
    public function store(Request $request);

    /**
     * Update Function
     * @param Request $request, @param Student $id
     */
    public function update(Request $request, Student $id);
}
