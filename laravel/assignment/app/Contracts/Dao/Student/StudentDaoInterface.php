<?php

namespace App\Contracts\Dao\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\SendMailDataRequest;

/**
 * Interface for Data Accessing Object of Post
 */
interface StudentDaoInterface
{
    /**
     * Home Page Function to show data
     * @param Request
     */
    public function index();

    /**
     * Display the specified student.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id);

    /**
     * Search Function
     * @param Request $request
     */
    public function search(Request $request);

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
    public function destory($id);

    /**
     * Store Function
     * @param Request $request
     */
    public function store(Request $request);

    /**
     * Update Function
     * @param Request $request, @param Student $id
     */
    public function update(Request $request, $id);

    /**
     * Send Student Data to email
     */
    public function sendMailData(SendMailDataRequest $request);

    /**
     * Get Major Model
     * @return data with json
     */
    public function getMajor();

    /**
     * Get Major By Id
     * @param $id
     */
    public function getMajorById($id);
}
