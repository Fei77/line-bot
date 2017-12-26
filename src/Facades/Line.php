<?php

namespace Fei77\LineBot\Facades;

use Illuminate\Support\Facades\Facade;

class Line extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Line';
    }
}

