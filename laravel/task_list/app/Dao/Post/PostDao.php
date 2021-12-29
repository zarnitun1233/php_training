<?php

namespace App\Dao\Post;

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
     * To get post list
     * @return array $postList Post list
     */
    public function getPostList()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return $tasks;
    }

    /**
     * To add new tasks
     */
    public function addPostList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2'
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        Task::create(['name' => $request->name]);
        return redirect('/');
    }

    /**
     * To delete tasks
     */
    public function deletePostList(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
}
