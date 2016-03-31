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
        ], 'netinteractive.acl');


        $router->middleware('ni.acl', 'Netinteractive\Acl\Middleware\Route');
    }

    /**
     * Returns path to resources config. Use $dotNotnation true for \Config::get()
     * and false for config_path()
     * @param bool $dotNotation
     * @return string
     */
    public static function resourcesConfig($dotNotation=true)
    {
        $response = self::$RESOURCES_CONFIG;

        if (!$dotNotation){
            $response = '/'.str_replace('.', '/', $response).'.php';
        }

        return $response;
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $config = realpath(__DIR__.'/../../config/resources.php');;

        $this->mergeConfigFrom($config, 'packages.netinteractive.acl');

        $this->commands($this->commands);
    }
}