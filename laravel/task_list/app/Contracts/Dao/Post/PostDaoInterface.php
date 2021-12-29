<?php

namespace App\Contracts\Dao\Post;

use App\Models\Task;
use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface PostDaoInterface
{
    /**
     * To get post list
     * @return $postList
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
