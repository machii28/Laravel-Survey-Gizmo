<?php

namespace SurveyGizmo\Helper;

use SurveyGizmo\SurveyGizmoCore;
use \Exception;

/**
 * Account
 *
 * @category   Laravel SurveyGizmo
 * @version    1.0.0
 * @package    machii/laravel-surveygizmo
 * @copyright  Copyright (c) 2017
 * @author     Mark Cornelio <markcornelio28@gmail.com>
 * @license    MIT
 */
class Account extends SurveyGizmoCore
{
	/**
	 * Authenticates user to user the SurveyGizmo API
	 * @return object
	 */
	public function authenticate()
	{
		$accountUrl = '/account';

		$response = $this->sendRequest($accountUrl);

		if (is_null($response)) {
			throw new Exception("Error Authenticating Request", 1);
		}

		return $response;
	}
}