<?php

namespace Wisperp\ScrapperRouters\Services;

use Wisperp\ScrapperRouters\Api\WanRest;

class WanService
{

    protected $wan_api;

    public function __construct()
    {
        $this->wan_api = new WanRest();
    }

    /**
     * Obtener tipo de conexión WAN
     * 
     * @param array $params Query
     * @param array $params[tipo_conexion] Tipo de conexión que desea obtener 
     */
    public function getTypeConnection(array $params)
    {
        return $this->wan_api->getTypeConnection($params);
    }

    /**
     * Actualizar IP Estática
     *
     * @param array $body  
     */
    public function updateStaticIp(array $body)
    {
        return $this->wan_api->updateStaticIp($body);
    }

    /**
     * Actualizar IP dinámica
     *
     * @param array $body  
     */
    public function updateDynamicIp(array $body)
    {
        return $this->wan_api->updateDynamicIp($body);
    } 
    
    /**
     * Actualizar PPPoE
     *
     * @param array $body  
     */
    public function updatePPPoE(array $body)
    {
        return $this->wan_api->updatePPPoE($body);
    }    
    
    /**
     * Renovar IP dinámica
     *
     */
    public function renewIp()
    {
        return $this->wan_api->renewIp();
    }
}
