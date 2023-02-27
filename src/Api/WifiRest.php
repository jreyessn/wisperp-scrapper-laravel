<?php

namespace Wisperp\ScrapperRouters\Api;

use GuzzleHttp\Client;

class WifiRest extends Rest
{
    /**
     * Prefix API
     */
    private $prefix = "router/wifi";

    /**
     * Actualizar Red Host
     *
     * @param array $body  
     */
    public function updateRedhost(array $body){
        $client = new Client($this->configWithToken());

        try {
            $response = $client->put($this->prefix . "/host", [
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
     * Actualizar Red Invitados
     *
     * @param array $body  
     */
    public function updateGuesthost(array $body){
        $client = new Client($this->configWithToken());

        try {
            $response = $client->put($this->prefix . "/guest", [
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
     
}
