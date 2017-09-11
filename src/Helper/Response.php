<?php

namespace SurveyGizmo\Helper;

use SurveyGizmo\SurveyGizmoCore;
use SurveyGizmo\SurveyGizmoException;
use GuzzleHttp\Client;

/**
 * Rsponse - For submitting response
 *
 * @category   Laravel SurveyGizmo
 * @version    1.0.0
 * @package    machii/laravel-surveygizmo
 * @copyright  Copyright (c) 2017
 * @author     Mark Cornelio <markcornelio28@gmail.com>
 * @license    MIT
 */
class Response extends SurveyGizmoCore
{
	/**
	 * Send a response to SurveyGizmo
	 * @param  array $answer
	 * @return object
	 */
	public function send($answer)
	{
		if ($this->isAssoc($answer)) {
			$parsedAnswer = $this->parseAssocAnswer($answer);
		} else {
			$parsedAnswer = $this->parseAnswer($answer);
		}

		$responseUrl = '/survey/' . $this->getSurveyId() . '/surveyresponse/';

		$query = [
			'_method' => 'PUT'
		];

		foreach($parsedAnswer as $parsedKey => $parsedValue) {
			if (is_array($parsedValue)) {
				foreach($parsedValue as $key => $value) {
					$query[$key] = $value;
				}
			} else {
				$query[$parsedKey] = $parsedValue;
			}
		}

		$response = $this->sendRequest($responseUrl, $query);

		return $response;
	}

	/**
	 * Parse associative answer
	 * @param  array $answers
	 * @return array
	 */
	private function parseAssocAnswer($answers)
	{
		$parsedAnswer = [];

		foreach($answers as $answer) {
			if (is_array($answer)) {
				foreach($answer as $value) {
					$answer = $this->parseAnswer($value);
					array_push($parsedAnswer, $answer);
				}
			} else {
				$answer = $this->parseAnswer($answer);
				array_push($parsedAnswer, $answer);
			}
		}

		return $parsedAnswer;
	}

	/**
	 * Parse answer
	 * @param  arrray $answer
	 * @return array
	 */
	private function parseAnswer($answer)
	{
		if (isset($answer['question_id']) == false) {
			throw new SurveyGizmoException('Question id is not existing in the current array of answer', 1);
		}

		if (isset($answer['option_id']) == false) {
			throw new SurveyGizmoException("Option id is not existing in the current array of answer", 1);
		}

		if (isset($answer['value']) == false) {
			throw new SurveyGizmoException("Value is not existing in the current array of answer", 1);
		}

		$answer = [
			'data['. $answer['question_id'] .']['. $answer['option_id'] .']' => $answer['value']
		];

		return $answer;
	}

	/**
	 * checks if an array is an associative array
	 * @param  array   $array
	 * @return boolean
	 */
	private function isAssoc($array)
	{
		foreach($array as $key => $value) {
			if (is_array($value)) return true;
		}

		return false;
	}
}