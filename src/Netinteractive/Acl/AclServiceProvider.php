<?php namespace Netinteractive\Acl;

use Illuminate\Support\ServiceProvider;



class AclServiceProvide2r extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


   /* protected $commands = [
        'Netinteractive\Acl\Commands\Grant',
    ];*/

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        /*$config = __DIR__.'/../../config/resources.php';

        $this->mergeConfigFrom(
            $config, 'resources'
        );


        $this->publishes([
            __DIR__.'/../../migrations/' => base_path('/database/migrations')
        ], 'migrations');


        $router->middleware('ni.acl', 'Netinteractive\Acl\Middleware\Route');*/
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
       // $this->commands($this->commands);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}
