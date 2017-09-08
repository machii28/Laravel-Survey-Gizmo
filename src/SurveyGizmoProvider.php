<?php

namespace SurveyGizmo;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use SurveyGizmo\SurveyGizmo;

/**
 * SurveyGizmoProvider
 *
 * @category   Laravel SurveyGizmo
 * @version    1.0.0
 * @package    machii/laravel-surveygizmo
 * @copyright  Copyright (c) 2017
 * @author     Mark Cornelio <markcornelio28@gmail.com>
 * @license    MIT
 */
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