<?php namespace Mazedlx\Calendar;

use Illuminate\Support\ServiceProvider;

class CalendarServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
    
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/lang', 'calendar');
        
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['calendar'] = $this->app->share(function($app)
		{
			$request = $app['request'];
			return new CalendarGenerator($request);
		});
	}

}