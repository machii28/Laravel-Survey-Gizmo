<?php

namespace SurveyGizmo;

use Illuminate\Support\Facades\Facade;

class SurveyGizmoFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'surveygizmo';
	}
}