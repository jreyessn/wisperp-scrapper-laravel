<?php

namespace Wisperp\ScrapperRouters\Services;

use Wisperp\ScrapperRouters\Api\LanRest;

class LanService
{

    protected $lan_api;

    public function __construct()
    {
        $this->lan_api = new LanRest();
    }

    /**
     * Actualizar LAN
     * 
     * @param array $body
     */
    public function update(array $body)
    {
        return $this->lan_api->update($body);
    }
}
