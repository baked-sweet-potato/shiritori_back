<?php

namespace App\Services;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostService
{
    /**
    * @param  string  $content
    * @return boolean
    */
    private function latestPosts($content): bool
    {
        $postModel = new Post();
        $latestPost = $postModel->lastetOne();

        if (!$latestPost) {
            return true;
        }

        return Post::create(['content' => $content]);
    }

    /**
     *
     * @param  string  $content
     * @return App\Models\Post
     *
     * @throws \RuntimeException
     */
    public function createNewPost($content)
    {
        if (!$this->canPost($content)) {
            throw new Exception('can not post');
        }

        return Post::create(['content' => $content]);
    }

    /**
    * @param  string  $content
    * @return boolean
    */
    private function canPost($content): bool
    {
        $postModel = new Post();
        $latestPost = $postModel->lastetOne();

        if (!$latestPost) {
            return true;
        }

        return substr($content, 0, 1) === substr($latestPost->content, -1, 1);
    }
}
