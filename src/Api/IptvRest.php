<?php

namespace Wisperp\ScrapperRouters\Api;

use GuzzleHttp\Client;

class IptvRest extends Rest
{
    /**
     * Prefix API
     */
    private $prefix = "router/iptv";

    /**
     * Actualizar Modo Pais
     *
     * @param string $modo Modo
     */
    public function updateCountry(string $modo = ""){
        $client = new Client($this->configWithToken());

        try {
            $response = $client->put($this->prefix . "/country", [
                "json" => [
                    "modo" => $modo
                ],
                'on_stats' => function (\GuzzleHttp\TransferStats $stats){
                    $this->handlerStats($stats);
                 }
            ]);
            
            return $this->response($response);
        } catch (\Throwable $th) {
            return $this->exceptionHandler($th);
        }
    }  

    /**
     * Actualizar Modo Personalizado
     *
     * @param array $body  
     */
    public function updateCustom(array $body){
        $client = new Client($this->configWithToken());

        try {
            $response = $client->put($this->prefix . "/custom", [
                "json" => $body,
                'on_stats' => function (\GuzzleHttp\TransferStats $stats){
                    $this->handlerStats($stats);
                 }
            ]);
            
            return $this->response($response);
        } catch (\Throwable $th) {
            return $this->exceptionHandler($th);
        }
    }  

    /**
     * Actualizar Modo Puente
     *
     * @param array $body  
     */
    public function updateBridge(array $body){
        $client = new Client($this->configWithToken());

        try {
            $response = $client->put($this->prefix . "/bridge", [
                "json" => $body,
                'on_stats' => function (\GuzzleHttp\TransferStats $stats){
                    $this->handlerStats($stats);
                 }
            ]);
            
            return $this->response($response);
        } catch (\Throwable $th) {
            return $this->exceptionHandler($th);
        }
    }   
     
    /**
     * Obtener Modo
     *
     * @param string $modo Modo
     */
    public function getModo(string $modo){
        $client = new Client($this->configWithToken());

        try {
            $response = $client->get($this->prefix, [
                "query" => [
                    "modo" => $modo
                ],
                'on_stats' => function (\GuzzleHttp\TransferStats $stats){
                    $this->handlerStats($stats);
                 }
            ]);
            
            return $this->response($response);
        } catch (\Throwable $th) {
            return $this->exceptionHandler($th);
        }
    }   
     
}
