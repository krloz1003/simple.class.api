<?php
require_once 'app/Curl.php';

class PropertieTest extends \PHPUnit\Framework\TestCase {

	/**
	 * @test 
	 */ 
	public function probamos_api_easybroker_contenga_key_content(){
		$url = "https://api.stagingeb.com/v1/properties";
		$headers = (array(
		    'X-Authorization: l7u502p8v46ba3ppgvj5y2aad50lb9'
		));
		$api = new Curl();
		$api->setData($url, $headers);
		$data = $api->response();

		$this->assertArrayHasKey('content', $data);
	}
	
	/**
	 * @test 
	 */ 
	public function probamos_api_easybroker_con_api_key_incorrecta(){
		$url = "https://api.stagingeb.com/v1/properties";
		$headers = (array(
		    'X-Authorization: 999999999999999999999999'
		));
		$api = new Curl($url, $headers);		
		$api->setData($url, $headers);
		$data = $api->response();

		$this->assertArrayHasKey('error', $data);
	}
}