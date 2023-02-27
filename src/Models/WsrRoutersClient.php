<?php

namespace Wisperp\ScrapperRouters\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WsrRoutersClient extends Model
{
    use SoftDeletes;

    protected $table = "wsr_routers_clients";

    protected $fillable = [
        "ip",
        "port",
        "user",
        "password",
        "wsr_scrapper_id",
        "wsr_routers_interface_id",
    ];

    // ========================================================
    // RELATIONS
    // ========================================================

    public function scrapper(){
        return $this->belongsTo(WsrScrapper::class, "wsr_scrapper_id");
    }

    public function interface(){
        return $this->belongsTo(WsrRoutersInterface::class, "wsr_routers_interface_id");
    }

}
