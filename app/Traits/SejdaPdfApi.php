<?php

namespace App\Traits;
use GuzzleHttp\Client;



trait SejdaPdfApi
{

	protected $host;
	private $key;
	protected $headers;

    public function __construct()
    {
        $this->host = 'https://api.sejda.com/v2/html-pdf';
        $this->key  = 'api_1B78C2C6F806445A8FD0193AD0FD173F';
        $this->headers = [

        	'Content-Type'  => 'application/json',
        	'Authorization' => 'Token: '.$this->key,
        
        ];
	}
        public function call($uri, $params){

        	$client = new Client([
        		'headers' => $this->headers
        	]);

			$response = $client->post($uri, 
			['body' => $params]
			);

        	dd(json_decode($response->getBody(), true));

        	return $response;

        }

        public function getPdf($html){

        	$params = json_encode(array('htmlCode' => $html));
        	$res = $this->call($this->host, $params);
        	return $res;
        }

    
}