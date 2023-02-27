<?php

namespace Wisperp\ScrapperRouters\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WsrRoutersInterface extends Model
{
    use SoftDeletes;

    protected $table = "wsr_routers_interfaces";

    protected $fillable = [
        "slug",
        "description",
    ];

    // ========================================================
    // RELATIONS
    // ========================================================

    public function routers_clients(){
        return $this->hasMany(WsrRoutersClient::class, "wsr_scrapper_id");
    }

}
