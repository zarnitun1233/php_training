<?php

namespace App\Services\Student;

use App\Models\Student;
use App\Models\Task;
use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Service class for post.
 */
class StudentService implements StudentServiceInterface
{
    /**
     * post dao
     */
    private $studentDao;

    /**
     * Class Constructor
     * @param PostDaoInterface
     */
    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    /**
     * Home Page Function to show data
     * @param Request
     */
    public function index(Request $request)
    {
        return $this->studentDao->index($request);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->studentDao->create();
    }

    /**
     * Show the form for editing the specified resource.
     * @param Student $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $id)
    {
        return $this->studentDao->edit($id);
    }

    /**
     * Delete Function
     * @param Student $student
     */
    public function destory($id)
    {
        return $this->studentDao->destory($id);
    }

    /**
     * Delete Function
     * @param Request $request
     */
    public function store(Request $request)
    {
        return $this->studentDao->store($request);
    }

    /**
     * Update Function
     * @param Request $request, @param Student $student
     */
    public function update(Request $request, Student $id)
    {
        return $this->studentDao->update($request, $id);
    }
}
