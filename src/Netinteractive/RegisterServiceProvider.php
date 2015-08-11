<?php namespace Netinteractive\Acl;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Netinteractive\Acl\Providers\Auth\Basic;

class RegisterServiceProvider extends ServiceProvider {

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

    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bind('ni.acl.register.provider', function () {
            return new Basic();
        });

        $this->app->booting(function()
        {
            AliasLoader::getInstance()->alias('RegisterProvider','Netinteractive\Combiner\Facades\RegisterFacade');
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
