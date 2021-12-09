<?php

class Curl {

	private $url;
	private $headers;
	private $responses;

	/**
     * Set url y cabeceras
     */
    public function setData(string $url, array $headers)
	{
		$this->url 		= $url;
		$this->headers 	= $headers;
	}

    /**
     * Solicitar respuesta mediante curl a la api
     */

	public function exec() {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);
        $this->responses = curl_exec($curl);
        curl_close($curl);
	}

    /**
     * Retornamos los datos y decodificamos el json.
     */
    public function response() {
        $this->exec();
        return json_decode($this->responses, true);
    }

}