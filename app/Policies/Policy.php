<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class Policy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function before($user, $ability)
	{
        //如果用戶擁有管理內容的權限的話,就通過
        if ($user->can('manage_contents')) {
            return true;
        }
	}
}
