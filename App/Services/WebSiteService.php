<?php

namespace App\Services;
use App\Connection\Connection;
use App\Models\WebSite;

class WebSiteService
{
    public function get(){

        $result = WebSite::getWebSite();

        return $result;
    }
}