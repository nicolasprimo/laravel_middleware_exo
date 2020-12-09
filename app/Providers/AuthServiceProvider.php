<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();      
        
        Gate::define('delete-post', function(User $user,$post){
            return $user->id == $post->user_id;
        });
        Gate::define('delete-user',function(User $user,$theUser){
            return $user->id != $theUser->id && $user->role_id > $theUser->role_id;
        });
        Gate::define('edit-user',function(User $user,$theUser){        
            return $user->id == $theUser->id || $user->role_id > $theUser->role_id;
        });
        Gate::define('upgrade-role',function(User $user,$role){
            return $user->role->id > $role || $user->role->id == 4;
        });
    }
}
