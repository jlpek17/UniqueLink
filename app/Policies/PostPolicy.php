<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{

    /**
     * Determine whether the user is admin & can update the model.
     */
    public function before(User $user)
    {
        if ($user->role_id == 2) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        if ($user->id == $post->user_id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        if ($user->id == $post->user_id || $user->id == $post->user_id) {
            return true;
        } else {
            return false;
        }
    }

}
