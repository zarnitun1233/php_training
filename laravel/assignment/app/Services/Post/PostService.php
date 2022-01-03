<?php

namespace App\Services\Post;

use App\Models\Student;
use App\Models\Task;
use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Service class for post.
 */
class PostService implements PostServiceInterface
{
    /**
     * post dao
     */
    private $postDao;

    /**
     * Class Constructor
     * @param PostDaoInterface
     */
    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }

    /**
     * Home Page Function to show data
     */
    public function index()
    {
        return $this->postDao->index();
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->postDao->create();
    }

    /**
     * Show the form for editing the specified resource.
     * @param Student $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $id)
    {
        return $this->postDao->edit($id);
    }

    /**
     * Delete Function
     * @param Student $student
     */
    public function destory(Student $student)
    {
        return $this->postDao->destory($student);
    }

    /**
     * Delete Function
     * @param Request $request
     */
    public function store(Request $request)
    {
        return $this->postDao->store($request);
    }

    /**
     * Update Function
     * @param Request $request, @param Student $student
     */
    public function update(Request $request, Student $id)
    {
        return $this->postDao->update($request, $id);
    }
}
