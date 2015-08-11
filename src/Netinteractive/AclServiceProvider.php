<?php namespace Netinteractive\Acl;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class AclServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;


    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../resources.php' => config_path('/packages/netinteractive/acl/resources.php'),
        ], 'config');

    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->singleton('acl', function () {
            return new Acl();
        });

        $this->app->booting(function()
        {
            AliasLoader::getInstance()->alias('Acl','Netinteractive\Combiner\Facades\AclFacade');
        });
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
