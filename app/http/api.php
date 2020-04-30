<?php
namespace App\http;

use GuzzleHttp\Client;

use GuzzleHttp\Exception\RequestException;

use GuzzleHttp\Psr7\Request;

use Guzzle\Http\Exception\ClientErrorResponseException; 

class Api{

	public $url = 'https://www.anapioficeandfire.com/api/';

	public function baseUri(){
		return new Client(['base_uri' => $this->url]);
	}

	/**
		get all books
	*/
	public function getBooks(){
		try {
			$response = $this->baseUri()->get('books/');
			$response = $response->getBody();
			$data = json_decode($response, true);
			return $data;
		} catch (ClientErrorResponseException $ex) {
			return $ex->getResponse()->getBody(true);
		}
	}

	/**
		get character list
	*/

	public function getCharacterList(){
		try {
			$response = $this->baseUri()->get('characters/');
			$response = $response->getBody();
			$data = json_decode($response, true);
			return $data;
		} catch (ClientErrorResponseException $ex) {
			return $ex->getResponse()->getBody(true);
		}
	}

}

?>