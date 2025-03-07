<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        //  Định nghĩa quyền admin
        Gate::define('admin', function (User $user) {
            return $user->role === 'admin';
        });

        //  Định nghĩa quyền student
        Gate::define('student', function (User $user) {
            return $user->role === 'student';
        });
    }
}
