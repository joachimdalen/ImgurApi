<?php

namespace JoachimDalen\ImgurApi\Facades;


use Illuminate\Support\Facades\Facade;

class ImgurApi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ImgurApi';
    }
}