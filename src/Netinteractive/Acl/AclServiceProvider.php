<?php namespace Netinteractive\Acl;

use Illuminate\Support\ServiceProvider;

class AclServiceProvider extends ServiceProvider
{

    protected $commands = [
        'Netinteractive\Acl\Commands\Grant',
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        $this->publishes([
            __DIR__.'/../../config/resources.php' => config_path('/packages/netinteractive/acl/resources.php'),
        ], 'config');

        $router->middleware('ni.acl', 'Netinteractive\Acl\Middleware\Route');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $config = realpath(__DIR__.'/../../config/resources.php');;

        $this->mergeConfigFrom($config, 'netinteractive.acl');

        $this->commands($this->commands);
    }
}