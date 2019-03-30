<?php

namespace JoachimDalen\ImgurApi\Endpoints;

use JoachimDalen\ImgurApi\BaseApi;

class Gallery
{
    /**
     * @var BaseApi
     */
    private $api;

    /**
     * Gallery constructor.
     * @param BaseApi $api
     */
    public function __construct(BaseApi $api)
    {
        $this->api = $api;
    }
}