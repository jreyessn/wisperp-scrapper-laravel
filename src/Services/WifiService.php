<?php

namespace Wisperp\ScrapperRouters\Services;

use Wisperp\ScrapperRouters\Api\WifiRest;

class WifiService
{

    protected $wifi_api;

    public function __construct()
    {
        $this->wifi_api = new WifiRest();
    }
    
    /**
     * Actualizar Red Host
     *
     * @param array $body  
     */
    public function updateRedhost(array $body){
       return $this->wifi_api->updateRedhost($body);
    }

    /**
     * Actualizar Red Invitados
     *
     * @param array $body  
     */
    public function updateGuesthost(array $body){
        return $this->wifi_api->updateGuesthost($body);
    }
     
}
