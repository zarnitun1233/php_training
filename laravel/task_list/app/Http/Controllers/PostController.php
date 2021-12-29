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
     * @param Request
     */
    public function createPostList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2'
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $this->postInterface->addPostList($request);
        return redirect('/');
    }

    /**
     * To delete tasks
     * @param Task
     */
    public function deletePostList(Task $task)
    {
        $this->postInterface->deletePostList($task);
        return redirect("/");
    }
}
