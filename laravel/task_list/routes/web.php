<?php

use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Show all tasks
 */
Route::get('/', function() {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('tasks', compact('tasks'));
});
/**
 * Add new tasks
 */
Route::post('/task', function(Request $request) {
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
});
/**
 * Delete the task
 */
Route::delete('/task/{task}', function(Task $task) {
    $task->delete();
    return redirect('/');
});