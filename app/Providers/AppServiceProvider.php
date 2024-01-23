<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Admin;
use App\Models\Sidebar;
use App\Models\User;

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
    public function boot()
    {
        // Share the $admin variable with all views that use the 'layouts.navbars.auth.sidebar' view
        View::composer('layouts.navbars.auth.sidebar', function ($view) {
            $admin = Admin::where(["id" => 1])->first();
            $user = auth()->user();
            $sidebarItem = Sidebar::all();
            // $view->with('admin', $admin);

            // Share both $admin and $sidebarItem variables with the view
            $view->with([
                'admin' => $admin,
                'sidebarItem' => $sidebarItem,
                'user' => $user,
            ]);
        });
    }
}
