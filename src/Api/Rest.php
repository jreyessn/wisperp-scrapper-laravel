<?php

namespace Wisperp\ScrapperRouters\Api;

use Illuminate\Support\Facades\Cache;

class Rest
{
    /**
     * Total de tiempo que se ejecutó un Request
     */
    protected $total_time = 0;

    /**
     * Obtener configuración por defecto
     */
    protected function config(){
        $config_api             = config("wsr.rest_api");
        $config_api["base_uri"] = config("wsr.client")["api_url"];

        return $config_api;
    }

    /**
     * Configuración para autenticar la App
     */
    protected function configWithAuth(){
        $config_api = $this->config();
        $config_api["headers"]["X-API-KEY"] = trim(config("wsr.client")["shared_key"]);

        return $config_api;
    }
    
    /**
     * Configuración para autenticar con JWT
     */
    protected function configWithToken(){
        $config_api = $this->config();
        $config_api["headers"]["Authorization"] = "Bearer " . $this->getToken();

        return $config_api;
    }
    
    /**
     * Obtener JWT
     * 
     * @param int $client_id ID del cliente autenticado
     */
    public function getToken(){
        $client_id = config("wsr.client.client_id");
        return Cache::get("wsr_client_{$client_id}");
    }

    /**
     * Asignar JWT
     * 
     * @param int $client_id ID del cliente autenticado
     * @param string $jwt
     */
    protected function setToken($jwt){
        $client_id = config("wsr.client.client_id");

        Cache::delete("wsr_client_{$client_id}");
        Cache::add("wsr_client_{$client_id}", $jwt, config("wsr.token_time"));
    }

    /**
     * Mapear la respuesta de la API a un Array
     * 
     * @param ResponseInterface $response Respuesta Guzzle HTTP 
     */
    protected function response($response){                    
        $responseJson = json_decode($response->getBody()->getContents(), true);
        $responseJson["code"] = $response->getStatusCode(); 
        $responseJson["total_time"] = $this->total_time;

        return $responseJson;
    }    
    
    /**
     * Manejar las excepciones para obtener una respuesta
     * 
     * @param Exception $exception Exception 
     */
    protected function exceptionHandler($exception){                    
        report($exception);

        if($exception instanceof \GuzzleHttp\Exception\ClientException){
            $response = json_decode($exception->getResponse()->getBody()->getContents(), true);
            $response["code"] = $exception->getResponse()->getStatusCode();
            $response["total_time"] = $this->total_time;

            return $response;
        }       
        
        if($exception instanceof \GuzzleHttp\Exception\ServerException){
            $response = json_decode($exception->getResponse()->getBody()->getContents(), true);
            $response["code"] = $exception->getResponse()->getStatusCode();
            $response["total_time"] = $this->total_time;

            return $response;
        }

        if($exception instanceof \GuzzleHttp\Exception\ConnectException){
            return [
                "code"    => 400,
                "message" => "Ha habido un problema al realizar la conexión. Es posible que no te hayas autenticado a un cliente.",
            ];
        }
    }

    /**
     * Almacenar metadatos de la petición ejecutada
     */
    protected function handlerStats(\GuzzleHttp\TransferStats $stats){
        $this->total_time = $stats->getHandlerStat("total_time");
    }

}
