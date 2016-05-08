<?php

	define('API_KEY', '61067f81f8cf7e4a1f673cd230216112');
	define('SITE_URL', 'http://test.localfeedbackloop.com/api');

	//----- CURL FUNCTIONS -----\\

	function get_api_call($cmd, $token, $req_arg = null)
	{
		$url = SITE_URL.$cmd.'?apiKey='.$token . '&'.$req_arg;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);
		$result=curl_exec($ch);
		curl_close($ch);

		return $result;
	}

	function post_api_call($cmd, $req_args, $token)
	{
		$url = SITE_URL.$cmd.'?apiKey='.$token;

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($req_args));
		
		$response = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		return array(
			'http_code' => $httpcode,
			'response' => $response
		);
	}

	function put_api_call($cmd, $req_args, $token)
	{
		$url = SITE_URL.$cmd.'?apiKey='.$token;

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($req_args));
		
		$response = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		return array(
			'http_code' => $httpcode,
			'response' => $response
		);
	}