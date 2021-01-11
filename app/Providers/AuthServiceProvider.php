<?php

namespace App\Providers;
use App\Models\Post;
use App\Models\User;

use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
//        Gate::define('update-post', function (User $user, Post $post) {
//            return $user->id === $post->user_id;
//        });
//        Gate::define('isAllowed',[App\Gates\PostGate::class, 'allowed']);
//        Gate::define('isAllow', function ($user, $post){
//
//
//
//
//            $roles = $user->roles->pluck('name')->toArray();
//
//            return array_intersect($post->all(), $roles);
////            return $user->id === $post;
//
//        });
//        Gate::define('allow-action', function ($user, $post){
//            $roles = $user->roles->pluck('name')->toArray();
//
//            return $user->id === $post || in_array('admin', $roles) ? Response::allow() : Response::deny('You are not authorized');
//
//        });
//        Gate::define('edit-settings', function (User $user) {
//            $roles = $user->roles->pluck('name')->toArray();
//            return in_array('admin', $roles)
//                ? Response::allow()
//                : Response::deny('You must be an administrator.');
//        });
//        Gate::define('isadmin', function ($user){
//
//            $roles = $user->roles->pluck('name')->toArray();
//            return in_array('admin', $roles);
//
//        });
        Gate::define('isAllow', function ($user, $post){


            return $user->id === $post;

        });


//        Gate::define('isAllow', function ($user, $allowed){
////            $allowed = explode(":",$allowed);
//
//
//
//            $roles = $user->roles->pluck('name')->toArray();
//
//            return array_intersect($allowed->all(), $roles);
//
//        });




        //
    }
}
