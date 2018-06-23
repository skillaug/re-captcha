<?php

namespace skillaug;

class reCaptcha {

	private $secret;
	private $_url = 'https://www.google.com/recaptcha/api/siteverify';

	/**
	 * reCaptcha constructor.
	 *
	 * @param $secret
	 */
	public function __construct( $secret ) {
		$this->secret = $secret;
	}

	/**
	 * @param $response
	 * @param int $time_out timeout in seconds
	 *
	 * @return mixed
	 */
	public function verifyResponse( $response, $time_out = 4 ) {
		$data = array(
			'secret'   => $this->secret,
			'response' => $response
		);

		$ch = curl_init();

		// set url
		curl_setopt( $ch, CURLOPT_URL, $this->_url );

		//return the transfer as a string
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_POST, count( $data ) );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );
		curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 0 );
		curl_setopt( $ch, CURLOPT_TIMEOUT, $time_out );
		// $output contains the output string
		$output = curl_exec( $ch );

		// close curl resource to free up system resources
		curl_close( $ch );

		return json_decode( $output );
	}
}