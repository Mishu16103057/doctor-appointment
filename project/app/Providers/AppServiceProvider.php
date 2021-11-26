<?php

namespace App\Providers;

use App\Admin;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Generalsetting;
use App\Blog;
use App\Sociallink;
use App\Seotool;
use App\Pagesetting;

use App\Advertise;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('*',function($settings){
            $settings->with('gs', Generalsetting::find(1));
            $settings->with('as', Admin::find(1));
            $settings->with('sl', Sociallink::find(1));
            $settings->with('seo', Seotool::find(1));
            $settings->with('ps', Pagesetting::find(1));
          
            $settings->with('lblogs', Blog::orderBy('created_at', 'desc')->limit(4)->get());
            $settings->with('ad728x90', Advertise::inRandomOrder()->where('size','728x90')->where('status',1)->first());
            $settings->with('ad300x250', Advertise::inRandomOrder()->where('size','300x250')->where('status',1)->first());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
