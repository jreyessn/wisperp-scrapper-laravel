<?php

namespace Wisperp\ScrapperRouters\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static object getTypeConnection()
 * @method static object updateStaticIp()
 * @method static object updateDynamicIp()
 * @method static object updatePPPoE()
 * @method static object renewIp()
 */
class Wan extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'wsr.wan';
    }

}
