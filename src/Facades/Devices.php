<?php

namespace Wisperp\ScrapperRouters\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static object block($devicesMacs)
 * @method static object unlock($devicesMacs)
 */
class Devices extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'wsr.devices';
    }

}
