<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class OmikujiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'omikuji';
    }
}
