<?php

namespace SurveyGizmo;

use SurveyGizmo\Helper\Account;
use SurveyGizmo\Helper\Question;
use SurveyGizmo\Helper\Response;
use SurveyGizmo\SurveyGizmoException;

/**
 * SurveyGizmo
 *
 * @category   Laravel SurveyGizmo
 * @version    1.0.0
 * @package    machii/laravel-surveygizmo
 * @copyright  Copyright (c) 2017
 * @author     Mark Cornelio <markcornelio28@gmail.com>
 * @license    MIT
 */
class SurveyGizmo
{
	/**
	 * App instance
	 * @var object
	 */
	protected $app;

	/**
	 * SurveyGizmo constructor
	 * @param object $app
	 */
	public function __construct($app)
	{
		$this->app = $app;
	}

	/**
	 * Authenticates the app
	 * @return Object
	 */
	public function auth()
	{
		$account = new Account();
		return $account->authenticate();
	}

	/**
	 * Get the survey
	 * @return object
	 */
	public function survey($surveyId = null)
	{
		$question = new Question($surveyId);
		return $question->survey();
	}

	/**
	 * Get the specific Question
	 * @param  integer $id
	 * @return object
	 */
	public function question($id = null, $surveyId = null)
	{
		$question = new Question($surveyId);

		if (is_null($id)) {
			throw new SurveyGizmoException('Question id should be defined', 1);
		}

		return $question->question($id);
	}

	public function answer($answer, $surveyId = null)
	{
		$response = new Response($surveyId);
		return $response->send($answer);
	}
}