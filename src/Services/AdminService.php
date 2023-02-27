<?php

namespace Wisperp\ScrapperRouters\Services;

use Wisperp\ScrapperRouters\Api\AdminRest;

class AdminService
{

    protected $admin_api;

    public function __construct()
    {
        $this->admin_api = new AdminRest();
    }

    /**
     * Gestión Remota y Local
     *
     * @param array $body  
     */
    public function updateManagmentRemote(array $body)
    {
        return $this->admin_api->updateManagmentRemote($body);
    }

    /**
     * Actualizar contraseña
     *
     * @param array $body  
     */
    public function changePassword(array $body){
        return $this->admin_api->changePassword($body);
    }  

    /**
     * Reiniciar Router
     */
    public function restartRouter(){
        return $this->admin_api->restartRouter();
    }   
}
