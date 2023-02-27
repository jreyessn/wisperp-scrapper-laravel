<?php

namespace Wisperp\ScrapperRouters\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static object updateCountry(string $modo)
 * @method static object updateCustom($body)
 * @method static object updateBridge($body)
 * @method static object getModo(string $modo)
 */
class Iptv extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'wsr.iptv';
    }

}
