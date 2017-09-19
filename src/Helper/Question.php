<?php

namespace SurveyGizmo\Helper;

use SurveyGizmo\SurveyGizmoCore;
use \Exception;

/**
 * Question - Getting the survey and list of question
 *
 * @category   Laravel SurveyGizmo
 * @version    1.0.0
 * @package    machii/laravel-surveygizmo
 * @copyright  Copyright (c) 2017
 * @author     Mark Cornelio <markcornelio28@gmail.com>
 * @license    MIT
 */
class Question extends SurveyGizmoCore
{
	/**
	 * Custom Survey Id
	 * @var string
	 */
	protected $surveyId;

	/**
	 * Response constructor
	 * @param string $surveyId Custom survey id
	 */
	public function __construct($surveyId = null)
	{
		parent::__construct();

		if (is_null($surveyId) == false) {
			$this->surveyId = $surveyId;
		} else {
			$this->surveyId = $this->getSurveyId();
		}
	}

	/**
	 * Getting the survey
	 * @return object
	 */
	public function survey()
	{
		$surveyUrl = '/survey/' . $this->surveyId;

		$response = $this->sendRequest($surveyUrl);

		if (is_null($response)) {
			throw new Exception("Error getting survey", 1);
		}

		return $response;
	}

	/**
	 * Getting an specific question
	 * @param  integer $questionId
	 * @return object
	 */
	public function question($questionId)
	{
		$questionUrl = '/survey/' . $this->surveyId . '/surveyquestion/' . $questionId;

		$response = $this->sendRequest($questionUrl);

		if (is_null($response)) {
			throw new Exception("Error getting question", 1);
		}

		return $response;
	}
}