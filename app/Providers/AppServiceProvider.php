<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\Interfaces\ProductRepositoryInterface;
use App\Http\Repositories\Eloquent\ProductRepository;

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
        $interfacesPath = app_path('Http/Repositories/Interfaces');

        foreach (scandir($interfacesPath) as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) !== 'php') {
                continue;
            }

            $interface = "App\\Http\\Repositories\\Interfaces\\" . pathinfo($file, PATHINFO_FILENAME);
            $implementation = "App\\Http\\Repositories\\Eloquent\\" . str_replace('Interface', '', pathinfo($file, PATHINFO_FILENAME));

            if (interface_exists($interface) && class_exists($implementation)) {
                $this->app->bind($interface, $implementation);
            }
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
