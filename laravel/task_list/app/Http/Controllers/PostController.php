<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * To show task list
     */
    public function showList()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return view('tasks', compact('tasks'));
    }
    /**
     * To create task
     */
    public function createTask(Request $request) 
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
     * To delete task
     */
    public function deleteTask(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
}
