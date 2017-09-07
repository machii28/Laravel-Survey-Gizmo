<?php

namespace SurveyGizmo;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use SurveyGizmo\SurveyGizmo;

class SurveyGizmoProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind('surveygizmo', function(Container $app) {
			return new SurveyGizmo($app);
		});
	}

	public function boot(Repository $config)
	{
		$this->publishConfig();
	}

	private function publishConfig()
	{
		$configPath = $this->packagePath('config/surveygizmo.php');

		$this->publishes([
			$configPath => config_path('surveygizmo.php')
		], 'config');

		$this->mergeConfigFrom($configPath, 'surveygizmo');
	}

	private function packagePath($path)
	{
		return __DIR__."/../$path";
	}
}