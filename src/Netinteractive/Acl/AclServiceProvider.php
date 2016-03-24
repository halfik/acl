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
        $config = __DIR__.'/../../config/resources.php';

        $this->mergeConfigFrom(
            $config, 'resources'
        );

        $router->middleware('ni.acl', 'Netinteractive\Acl\Middleware\Route');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}
