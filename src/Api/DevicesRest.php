<?php

namespace Wisperp\ScrapperRouters\Api;

use GuzzleHttp\Client;

class DevicesRest extends Rest
{
    /**
     * Prefix API
     */
    private $prefix = "router/devices";

    /**
     * Bloquear dispositivos
     *
     * @param array $devicesMacs Macs de los dispositivos
     */
    public function block(array $devicesMacs = []){
        $client = new Client($this->configWithToken());

        try {
            $response = $client->put($this->prefix . '/block', [
                "json" => [
                    "devices" => collect($devicesMacs)->map(function($deviceMac){
                        return ["mac" => $deviceMac];
                    })->toArray()
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
     * Desbloquear dispositivos
     *
     * @param array $devicesMacs Macs de los dispositivos
     */
    public function unlock(array $devicesMacs = []){
        $client = new Client($this->configWithToken());

        try {
            $response = $client->put($this->prefix . '/unlock', [
                "json" => [
                    "devices" => collect($devicesMacs)->map(function($deviceMac){
                        return ["mac" => $deviceMac];
                    })->toArray()
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
