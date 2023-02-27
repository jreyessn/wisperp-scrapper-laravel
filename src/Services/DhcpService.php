<?php

namespace Wisperp\ScrapperRouters\Services;

use Wisperp\ScrapperRouters\Api\DhcpRest;

class DhcpService
{

    protected $dhcp_api;

    public function __construct()
    {
        $this->dhcp_api = new DhcpRest();
    }
    
    /**
     * Actualizar DHCP
     *
     * @param array $body  
     */
    public function update(array $body){
        return $this->dhcp_api->update($body);
    }   
     
}
