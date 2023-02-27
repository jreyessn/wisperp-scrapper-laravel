<?php

namespace Wisperp\ScrapperRouters\Api;

use GuzzleHttp\Client;

class WanRest extends Rest
{
    /**
     * Prefix API
     */
    private $prefix = "router/wan";

    /**
     * Obtener tipo de conexión WAN
     * 
     * @param array $params Query
     * @param array $params[tipo_conexion] Tipo de conexión que desea obtener 
     */
    public function getTypeConnection(array $params){
        $client = new Client($this->configWithToken());

        try {
            $response = $client->get($this->prefix . "/type_connection", [
                "query" => $params,
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
     * Actualizar IP Estática
     *
     * @param array $body  
     */
    public function updateStaticIp(array $body){
        $client = new Client($this->configWithToken());

        try {
            $response = $client->put($this->prefix . "/update_static_ip", [
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
     * Actualizar IP dinámica
     *
     * @param array $body  
     */
    public function updateDynamicIp(array $body){
        $client = new Client($this->configWithToken());

        try {
            $response = $client->put($this->prefix . "/update_dynamic_ip", [
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
     * Actualizar PPPoE
     *
     * @param array $body  
     */
    public function updatePPPoE(array $body){
        $client = new Client($this->configWithToken());

        try {
            $response = $client->put($this->prefix . "/update_pppoe", [
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
     * Actualizar PPPoE
     *
     */
    public function renewIp(){
        $client = new Client($this->configWithToken());

        try {
            $response = $client->put($this->prefix . "/renew_dynamic_ip", [
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
