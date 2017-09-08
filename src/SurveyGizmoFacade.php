<?php

namespace SurveyGizmo;

use Illuminate\Support\Facades\Facade;

/**
 * SurveyGizmoFacade
 *
 * @category   Laravel SurveyGizmo
 * @version    1.0.0
 * @package    machii/laravel-surveygizmo
 * @copyright  Copyright (c) 2017
 * @author     Mark Cornelio <markcornelio28@gmail.com>
 * @license    MIT
 */
class SurveyGizmoFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'surveygizmo';
	}
}