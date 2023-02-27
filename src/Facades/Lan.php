<?php

namespace Wisperp\ScrapperRouters\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static object update($body)
 */
class Lan extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'wsr.lan';
    }

}
