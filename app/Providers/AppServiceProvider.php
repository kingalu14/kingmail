<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Repository\Contacts\ContactRepository;
use App\Repository\Contacts\EloquentContact;

use App\Repository\Templates\TemplatesRepository;
use App\Repository\Templates\EloquentTemplates;

use App\Repository\Users\UsersRepository;
use App\Repository\Users\EloquentUsers;

use App\Repository\Bulks\BulkRepository;
use App\Repository\Bulks\EloquentBulk;

use App\Repository\Profiles\ProfileRepository;
use App\Repository\Profiles\EloquentProfile;

use App\Repository\Sents\SentRepository;
use App\Repository\Sents\EloquentSent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ContactRepository::class,EloquentContact::class); 
        $this->app->singleton(TemplatesRepository::class,EloquentTemplates::class); 
        $this->app->singleton(UsersRepository::class,EloquentUsers::class); 
        $this->app->singleton(BulkRepository::class,EloquentBulk::class); 
        $this->app->singleton(ProfileRepository::class,EloquentProfile::class); 
        $this->app->singleton(SentRepository::class,EloquentSent::class); 
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
