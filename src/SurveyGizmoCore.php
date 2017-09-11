<?php

namespace SurveyGizmo;

use GuzzleHttp\Client;
/**
 * SurveyGizmoCore
 *
 * @category   Laravel SurveyGizmo
 * @version    1.0.0
 * @package    machii/laravel-surveygizmo
 * @copyright  Copyright (c) 2017
 * @author     Mark Cornelio <markcornelio28@gmail.com>
 * @license    MIT
 */
abstract class SurveyGizmoCore
{
	/**
	 * API url instance
	 * @var string
	 */
	protected $apiUrl;

	/**
	 * API token instance
	 * @var string
	 */
	protected $apiKey;

	/**
	 * API token instance
	 * @var string
	 */
	protected $apiToken;

	/**
	 * Survey Id instance
	 * @var string
	 */
	protected $surveyId;

	/**
	 * SurveyGizmoCore constructor
	 */
	public function __construct()
	{
		$this->setUrl();
		$this->setToken();
		$this->setKey();
		$this->setSurveyId();
	}

	/**
	 * Set SurveyGizmo API Url
	 * @param string $apiUrl
	 */
	protected function setUrl($apiUrl = null)
	{
		$this->apiUrl = $apiUrl;

		if (is_null($apiUrl)) {
			$this->apiUrl = config('surveygizmo.api_url');
		}
	}

	/**
	 * Get SurveyGizmo API Url
	 * @return string
	 */
	protected function getUrl()
	{
		return $this->apiUrl;
	}

	/**
	 * Set SurveyGizmo API token
	 * @param string $apiToken
	 */
	protected function setToken($apiToken = null)
	{
		$this->apiToken = $apiToken;

		if (is_null($apiToken)) {
			$this->apiToken = config('surveygizmo.api_secret_token');
		}
	}

	/**
	 * Get SurveyGizmo API token
	 * @return [type] [description]
	 */
	protected function getToken()
	{
		return $this->apiToken;
	}

	/**
	 * Set SurveyGizmo API Key
	 * @param string $apiKey
	 */
	protected function setKey($apiKey = null)
	{
		$this->apiKey = $apiKey;

		if (is_null($apiKey)) {
			$this->apiKey = config('surveygizmo.api_key');
		}
	}

	/**
	 * Get SurveyGizmo API Key
	 * @return string
	 */
	protected function getKey()
	{
		return $this->apiKey;
	}

	/**
	 * Set Survey Id
	 * @param string $surveyId
	 */
	protected function setSurveyId($surveyId = null)
	{
		$this->surveyId = $surveyId;

		if (is_null($surveyId)) {
			$this->surveyId = config('surveygizmo.survey_id');
		}
	}

	/**
	 * Get the Survey Id
	 * @return string
	 */
	protected function getSurveyId()
	{
		return $this->surveyId;
	}

	/**
	 * Send Request to SurveyGizmo API
	 * @param  string $url
	 * @param  array  $query
	 * @return object
	 */
	protected function sendRequest($url, $query = null, $method = 'GET')
	{
		$client = new Client();
		$query['api_token'] = $this->getToken();

		$request = $client->request($method, $this->getUrl() . $url, [
			'query' => $query
		]);

		$body = $request->getBody();
		$response = json_decode($body->getContents());

		return $response;
	}
}