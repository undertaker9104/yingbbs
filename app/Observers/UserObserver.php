<?php

namespace App\Observers;

use App\Models\User;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class UserObserver
{
    public function creating(User $user)
    {
        //
    }

    public function updating(User $user)
    {
        //
    }

    public function saving(User $user)
    {
        // 这样写扩展性更高，只有空的时候才指定默认头像
        if (empty($user->avatar)) {
            $user->avatar = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc1Z2vOTPibp9e_yArsMoakTx6bwopjn1egD1QqJ9QBgbSIqgvRw';
        }
    }
}