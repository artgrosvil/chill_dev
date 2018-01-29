<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('exec_curl')) {

	/**
	 * @param $parse_par
	 * @return mixed
	 */
	function exec_curl($parse_par)
	{
		$parse_url = 'https://api.parse.com/1/push/';
		$header_parse = [
			"Content-Type: application/json",
			"X-Parse-Application-Id: vlSSbINvhblgGlipWpUWR6iJum3Q2xd7GthrDVUI",
			"X-Parse-REST-API-Key: kIw91AWjXcGtqkBJ2tj5LjbwvhbZUgPahKTBUeho"
		];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $parse_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header_parse);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($parse_par));
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		$data_ch = json_decode(curl_exec($ch));
		curl_close($ch);
		return $data_ch;
	}
}