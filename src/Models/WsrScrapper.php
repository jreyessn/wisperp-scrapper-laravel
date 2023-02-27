<?php

namespace Wisperp\ScrapperRouters\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WsrScrapper extends Model
{
    use SoftDeletes;

    protected $table = "wsr_scrappers";

    protected $fillable = [
        "api_url",
        "description",
        "shared_key",
    ];

    // ========================================================
    // RELATIONS
    // ========================================================

    public function routers_clients(){
        return $this->hasMany(WsrRoutersClient::class, "wsr_scrapper_id");
    }

}
