<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
 use  App\Models\role;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        foreach(config('abilities') as $key=>$value){

             Gate::define($key,function($user) use($key){

        $roles= Role::whereRaw('roles.id IN (SELECT role_id FROM role_user WHERE user_id=? )'
            ,[$user->id, ])->get();

           foreach($roles as $role){
                if(in_array($key, $role->abilities ) ){
                    return true;
                }
             }

             return false;



        });


        }


    }




}
