<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    public function create(array $data)
    {
        $comment = new Comment;
        $comment->fill($data)->save();
        return $comment;
    }
}
