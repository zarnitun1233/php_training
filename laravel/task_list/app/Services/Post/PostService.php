<?php

namespace App\Services\Post;

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
     * @return
     */
    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }

    /**
     * To get post list
     * @return array $postList Post list
     */
    public function getPostList()
    {
        return $this->postDao->getPostList();
    }

    /**
     * To add new tasks
     * @param Request
     */
    public function addPostList(Request $request)
    {
        return $this->postDao->addPostList($request);
    }

    /**
     * To delete tasks
     * @param Task
     */
    public function deletePostList(Task $task)
    {
        return $this->postDao->deletePostList($task);
    }
}
