<?php

namespace SurveyGizmo;

use SurveyGizmo\Helper\Account;

class SurveyGizmo
{
	protected $app;

	public function __construct($app)
	{
		$this->app = $app;
	}

	public function auth()
	{
		return Account::authenticate();
	}
}