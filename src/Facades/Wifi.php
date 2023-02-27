<?php

namespace Wisperp\ScrapperRouters\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static object updateRedhost($body)
 * @method static object updateGuesthost($body)
 */
class Wifi extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'wsr.wifi';
    }

}
