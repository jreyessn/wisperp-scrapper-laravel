<?php

namespace Wisperp\ScrapperRouters\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static object updateManagmentRemote($body)
 * @method static object changePassword($body)
 * @method static object restartRouter($body)
 */
class Admin extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'wsr.admin';
    }

}
