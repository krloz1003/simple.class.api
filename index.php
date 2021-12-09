<?php
require_once 'app/Curl.php';

/**
 * Parametros API Easybroker
 */
$url = "https://api.stagingeb.com/v1/properties";
$headers = (array(
    'X-Authorization: l7u502p8v46ba3ppgvj5y2aad50lb9'
));

/**
 * Instancia a la clase CURL para realizar peticiones
 * en la API de EasyBroker
 */

$api = new Curl();
$api->setData($url, $headers);
$res = $api->response();

/**
 * Si RES contiene información y trae el key CONTENT
 * filtra los datos de la columna title,
 * Si contiene un key ERROR, retornamos el array de error
 * Si RES es null  mostramos un arreglo vacío.
 */
$filter = ($res && array_key_exists('content', $res) 
            ? array_column($res['content'], 'title') 
            : (array_key_exists('error', $res)) )
                ? $res
                : [] ;

var_dump($filter);