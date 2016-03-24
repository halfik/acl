<?php namespace Netinteractive\Acl;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Netinteractive\Acl\User\Record as User;
use Netinteractive\Acl\Role\Record as Role;
use Netinteractive\Acl\Permission\Record as Permission;


class AclServiceProvider extends ServiceProvider
{

    protected $commands = [
        'Netinteractive\Acl\Commands\Grant',
    ];

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {

        $config     = realpath(__DIR__.'/../../config/resources.php');

        //$this->mergeConfigFrom($config, 'netinteractive.acl');

       /* $this->publishes([
            __DIR__.'/../../config/resources.php' => config_path('/packages/netinteractive/acl/resources.php'),
        ], 'config');*/



        $router->middleware('ni.acl', 'Netinteractive\Acl\Middleware\Route');
    }


    /**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->commands($this->commands);
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
