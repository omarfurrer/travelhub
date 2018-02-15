<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Contracts\Repositories\BaseRepository::class, \App\Repositories\Eloquent\BaseRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\UsersRepository::class, \App\Repositories\Eloquent\UsersRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\AgenciesRepository::class, \App\Repositories\Eloquent\AgenciesRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\DestinationsRepository::class, \App\Repositories\Eloquent\DestinationsRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\DestinationMediaRepository::class, \App\Repositories\Eloquent\DestinationMediaRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\TripItemsRepository::class, \App\Repositories\Eloquent\TripItemsRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\TripsRepository::class, \App\Repositories\Eloquent\TripsRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\TripMediaRepository::class, \App\Repositories\Eloquent\TripMediaRepositoryEloquent::class);
    }

}
