<?php

namespace SurveyGizmo\Helper;

use SurveyGizmo\SurveyGizmoCore;
use GuzzleHttp\Client as Guzzle;

class Account extends SurveyGizmoCore
{
	public static function authenticate()
	{
		$client = new Guzzle();

		$accountUrl = $this->getUrl() . '/account';

		$result = $client->request('GET', $accountUrl, [
			'api_token' => $this->getToken()
		]);
	}
}