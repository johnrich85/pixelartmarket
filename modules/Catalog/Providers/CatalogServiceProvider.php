<?php namespace Modules\Catalog\Providers;

use Illuminate\Support\ServiceProvider;

class CatalogServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->bindInterfaces();

		$this->registerConfig();
	}

	/**
	 * Ties an interface to an implementation for
	 * the purpose of the IoC Container.
	 */
	protected function bindInterfaces() {
		$this->app->bind(
			'Modules\Catalog\Repositories\Contract\ProductRepositoryInterface',
			'Modules\Catalog\Repositories\ProductRepository'
		);
	}

	/**
	 * Register config.
	 * 
	 * @return void
	 */
	protected function registerConfig()
	{
		$this->publishes([
		    __DIR__.'/../Config/config.php' => config_path('catalog.php'),
		]);
		$this->mergeConfigFrom(
		    __DIR__.'/../Config/config.php', 'catalog'
		);
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
