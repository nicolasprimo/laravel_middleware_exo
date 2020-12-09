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
        Gate::define('delete-user',function(User $user,$role_id){
            return Auth::user()->role_id == 4 && Auth::user()->role_id != $role_id;
        });
        Gate::define('edit-user',function(User $user,$theUser){        
            if(($user->role_id == 4 && $user->role_id != $theUser->role_id) || ($user->role_id == 3 && $user->role_id != $theUser->role_id && $theUser->role_id < 4)){
                return true;
            }else if($user->id == $theUser->id){
                return true;
            }
        });
    }
}
