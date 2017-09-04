<?php

namespace Zjango\Verify\Providers;

use Illuminate\Support\ServiceProvider,
	Zjango\Verify\Auth\VerifyGuard;

class VerifyServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->publishes([
			__DIR__ . '/../../config/verify.php' => config_path('verify.php')
		], 'config');

		$this->mergeConfigFrom(__DIR__ . '/../../config/verify.php', 'verify');

		$this->publishes([
			__DIR__.'/../../database/migrations/' => base_path('database/migrations')
		], 'migrations');

		$this->publishes([
			__DIR__.'/../../database/seeds/' => base_path('database/seeds')
		], 'seeds');

		\Auth::extend('verify', function($app)
		{
			return new VerifyGuard(
				new VerifyUserProvider(
					$app['hash'],
					$app['config']['auth.model']
				),
				$app['session.store']
			);

		});
	}

	public function register()
	{
		$this->commands([
			'Zjango\Verify\Commands\AddPermission',
			'Zjango\Verify\Commands\AddCrudPermissions',
			'Zjango\Verify\Commands\AddRole'
		]);
	}
}