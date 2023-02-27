<?php

namespace Wisperp\ScrapperRouters\Services;

use Wisperp\ScrapperRouters\Api\DevicesRest;

class DevicesService
{

    protected $devices_api;

    public function __construct()
    {
        $this->devices_api = new DevicesRest();
    }
    
    /**
     * Bloquear dispositivos
     *
     * @param array $devicesMacs Macs de los dispositivos
     */
    public function block(array $devicesMacs = []){
        return $this->devices_api->block($devicesMacs);
    }   
     
    /**
     * Desbloquear dispositivos
     *
     * @param array $devicesMacs Macs de los dispositivos
     */
    public function unlock(array $devicesMacs = []){
        return $this->devices_api->unlock($devicesMacs);
    }   
}
