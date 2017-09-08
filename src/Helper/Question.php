<?php

namespace SurveyGizmo\Helper;

use SurveyGizmo\SurveyGizmoCore;
use GuzzleHttp\Client;
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
	 * Getting the survey
	 * @return object
	 */
	public function survey()
	{
		$surveyUrl = '/survey/' . $this->getSurveyId();

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
		$questionUrl = '/survey/' . $this->getSurveyId() . '/surveyquestion/' . $questionId;

		$response = $this->sendRequest($questionUrl);

		if (is_null($response)) {
			throw new Exception("Error getting question", 1);
		}

		return $response;
	}
}