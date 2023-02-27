<?php

namespace Wisperp\ScrapperRouters\Services;

use Wisperp\ScrapperRouters\Api\IptvRest;

class IptvService
{

    protected $iptv_api;

    public function __construct()
    {
        $this->iptv_api = new IptvRest();
    }
    
    /**
     * Actualizar Modo Pais
     *
     * @param string $modo Modo
     */
    public function updateCountry(string $modo = ""){
        return $this->iptv_api->updateCountry($modo);
    }  

    /**
     * Actualizar Modo Personalizado
     *
     * @param array $body  
     */
    public function updateCustom(array $body){
        return $this->iptv_api->updateCustom($body);
    }  

    /**
     * Actualizar Modo Puente
     *
     * @param array $body  
     */
    public function updateBridge(array $body){
        return $this->iptv_api->updateBridge($body);
    }   
     
    /**
     * Obtener Modo
     *
     * @param string $modo Modo
     */
    public function getModo(string $modo){
        return $this->iptv_api->getModo($modo);
    }   
     
     
}
