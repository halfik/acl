<?php namespace Netinteractive\Acl;

use Illuminate\Support\ServiceProvider;

class AclAdminServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishPublic();
        $this->publishConfigs();
        $this->publishViews();
        $this->setUpRouting();
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfigs();
    }

    /**
     * Routing
     */
    protected function setUpRouting()
    {
        $routePath = __DIR__.'/Http/routes.php';

        if (!$this->app->routesAreCached()) {
            require $routePath;
        }
    }


    /**
     * Publishes views
     */
    protected function publishConfigs()
    {
        $panelType = \Config::get('packages.netinteractive.admin.config.panel_type');

        $configFilePath = __DIR__.'/../../config/admin/'.$panelType.'/menu.php';
        if (file_exists($configFilePath)){
            $this->publishes([
                $configFilePath => config_path('/packages/netinteractive/acl/admin/'.$panelType.'/menu.php'),
            ], 'config');
        }
        $combinerFilePath = __DIR__.'/../../config/admin/'.$panelType.'/combiner.php';
        if (file_exists($combinerFilePath)){
            $this->publishes([
                $combinerFilePath => config_path('/packages/netinteractive/acl/admin/'.$panelType.'/combiner.php'),
            ], 'config');
        }
    }

    /**
     * Registers configs
     */
    protected function registerConfigs()
    {
        $panelType = \Config::get('packages.netinteractive.admin.config.panel_type');
        
        $configFilePath = __DIR__.'/../../config/admin/'.$panelType.'/menu.php';
        if (file_exists($configFilePath)){
            $this->mergeConfigFrom($configFilePath, 'packages.netinteractive.admin.'.$panelType.'.menu');
        }

        $combinerFilePath = __DIR__.'/../../config/admin/'.$panelType.'/combiner.php';
        if (file_exists($combinerFilePath)){
            $this->mergeRecursiveConfigFrom($combinerFilePath, 'packages.netinteractive.combiner.config');
        }
    }

    /**
     * Publishes views
     */
    protected function publishViews()
    {
        $panelType = \Config::get('packages.netinteractive.admin.config.panel_type');
        $this->loadViewsFrom(__DIR__.'/../../views', 'netinteractive.acl');
        $viewsPath = __DIR__ . '/../../views/'.$panelType.'/backend';

        if (is_dir($viewsPath)){
            $this->publishes([
                $viewsPath => 'resources/views/'.\View::getDefaultSkin().'/backend/acl',
            ], 'views');
        }
    }

    /**
     * Publishes public assets
     */
    protected function publishPublic()
    {
        $this->publishes([
            __DIR__ . '/../../assets/js' => public_path('packages/netinteractive/acl/')
        ], 'public');

    }

    /**
     * Merge the given configuration with the existing configuration.
     *
     * @param  string  $path
     * @param  string  $key
     * @return void
     */
    protected function mergeRecursiveConfigFrom($path, $key)
    {
        $config = $this->app['config']->get($key, []);
        $this->app['config']->set($key, array_merge_recursive(require $path, $config));
    }
}