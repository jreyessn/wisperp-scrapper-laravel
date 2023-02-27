<?php

namespace Wisperp\ScrapperRouters\Api;

use GuzzleHttp\Client;

class AdminRest extends Rest
{
    /**
     * Prefix API
     */
    private $prefix = "router/admin";

    /**
     * Gestión Remota y Local
     *
     * @param array $body  
     */
    public function updateManagmentRemote(array $body){
        $client = new Client($this->configWithToken());

        try {
            $response = $client->put($this->prefix . '/management_remote_local', [
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
     * Actualizar contraseña
     *
     * @param array $body  
     */
    public function changePassword(array $body){
        $client = new Client($this->configWithToken());

        try {
            $response = $client->put($this->prefix . '/change_password', [
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
     * Reiniciar Router
     */
    public function restartRouter(){
        $client = new Client($this->configWithToken());

        try {
            $response = $client->put($this->prefix . '/restart', [
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
     * Obtener metadatos actuales del router
     * 
     * @param array $only Seleccionar propiedades especificas de la estructura de datos
     */
    public function metadata($only = []){
        $client    = new Client($this->configWithToken());
        $queryOnly = collect($only)->implode(",");

        try {
            $response = $client->get("router", [
                'query'    => [
                    "only" => $queryOnly
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
