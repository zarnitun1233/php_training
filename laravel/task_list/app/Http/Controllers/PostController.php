<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Contracts\Services\Post\PostServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    private $postInterface;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostServiceInterface $postServiceInterface)
    {
        $this->postInterface = $postServiceInterface;
    }

    /**
     * To show task list
     */
    public function showPostList()
    {
        $tasks = $this->postInterface->getPostList();
        return view('tasks', compact('tasks'));
    }

    /**
     * To add new tasks
     */
    public function createPostList(Request $request)
    {
        return $this->postInterface->addPostList($request);
    }

    /**
     * To delete tasks
     */
    public function deletePostList(Task $task)
    {
        return $this->postInterface->deletePostList($task);
    }
}
