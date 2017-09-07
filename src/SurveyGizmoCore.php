<?php

namespace SurveyGizmo;

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
	 * SurveyGizmoCore constructor
	 */
	protected function __construct()
	{
		$this->setUrl();
		$this->setToken();
		$this->setKey();
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
}