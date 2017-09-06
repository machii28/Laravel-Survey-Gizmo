<?php

namespace Machii\SurveyGizmo;

use Machii\SurveyGizmo\SurveyGizmo;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\Container;

class SurveyGizmoProvider
{
	public function register()
	{
		$this->app->singleton(SurveyGizmo::class, function(Container $app) {
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

	private function packagePath($pat)
	{
		return __DIR__."/../$path";
	}
}