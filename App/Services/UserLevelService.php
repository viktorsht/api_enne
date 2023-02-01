<?php

namespace App\Services;
#use App\Models\User;
use App\Connection\Connection;
use App\Models\UserLevel;



class UserLevelService
{
    public function get(){

        $result  = UserLevel::getUserLevel();

        return $result;
    }
}