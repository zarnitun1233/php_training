<?php

namespace App\Contracts\Services\Post;

use App\Models\Task;
use Illuminate\Http\Request;

/**
 * Interface for post service
 */
interface PostServiceInterface
{
    /**
     * To get post list
     * @return array $postList Post list
     */
    public function getPostList();

    /**
     * To add new tasks
     * @param Request
     */
    public function addPostList(Request $request);

    /**
     * To delete tasks
     * @param Task
     */
    public function deletePostList(Task $task);
}
