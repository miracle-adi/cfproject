<?php

namespace App\Http\View\Composers;

use App\Models\User;
use App\User as AppUser;
use Illuminate\View\View;

class UserComposer
{
    public function compose(View $view)
    {
        $view->with('users', AppUser::all());
    }
}