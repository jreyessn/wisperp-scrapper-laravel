<?php

namespace Wisperp\ScrapperRouters\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static object metadata()
 */
class Router extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'wsr.router';
    }

    /**
     * Conectarse a un cliente
     * 
     * @param int $client_id ID del cliente
     */
    public static function connect(int $client_id){
        $routerService = app("wsr.router");
        $routerService->connect($client_id);
        return $routerService;
    }
}
