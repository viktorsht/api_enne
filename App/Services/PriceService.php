<?php

namespace App\Services;
use App\Connection\Connection;
use App\Models\Price;

class PriceService
{
    public function get($id){
        return Price::getPrice($id);
    }
}