<?php

namespace Wisperp\ScrapperRouters\Api;

use GuzzleHttp\Client;

class DhcpRest extends Rest
{
    /**
     * Prefix API
     */
    private $prefix = "router/dhcp";

    /**
     * Actualizar DHCP
     *
     * @param array $body  
     */
    public function update(array $body){
        $client = new Client($this->configWithToken());

        try {
            $response = $client->put($this->prefix . '/dhcp', [
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
