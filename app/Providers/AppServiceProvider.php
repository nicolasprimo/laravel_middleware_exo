<?php

namespace App\Providers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            if(Auth::user()->role_id == 2){
                $post = Post::where('user_id',Auth::id())->count();
                $user = '';
            }else{
                $post = Post::count();
                $user = User::count();
            }
            // Add some items to the menu...
            $event->menu->add([            
                'text'    => 'Articles',
                'icon'    => 'far fa-fw fa-file',
                'label' => $post ,
                'label_color' => 'dark',
                'submenu' => [
                    [
                        'text' => 'Voir',
                        'url'  => 'admin/posts',
                        'icon'    => 'far fa-eye',
                    ],
                    [
                        'text' => 'Créer',
                        'url'  => 'admin/posts/create',
                        'icon'    => 'far fa-plus-square',
                    ],
                ],
            ],
            [            
                'text'    => 'Users',
                'icon'    => 'far fa-fw fa-user',
                'label' => $user ,
                'label_color' => 'dark',
                'submenu' => [
                    [
                        'text' => 'Voir',
                        'url'  => 'admin/users',
                        'icon'    => 'far fa-eye',
                    ],
                    [
                        'text' => 'Créer',
                        'url'  => 'admin/users/create',
                        'icon'    => 'far fa-plus-square',
                    ],
                ],
            ],
          );
        });
    }
}
