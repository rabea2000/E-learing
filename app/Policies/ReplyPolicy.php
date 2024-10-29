<?php

namespace App\Policies;

use App\Models\Reply;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReplyPolicy
{

    public function delete(User $user, Reply $reply): bool
    {
        return $reply->user_id === $user->id  || $reply->comment->user_id == $user->id   ; 
    }

 


}
