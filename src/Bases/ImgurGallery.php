<?php

namespace JoachimDalen\ImgurApi\Bases;

use JoachimDalen\ImgurApi\BaseApi;

class ImgurGallery
{
    /**
     * @var BaseApi
     */
    private $api;

    /**
     * ImgurGallery constructor.
     * @param BaseApi $api
     */
    public function __construct(BaseApi $api)
    {
        $this->api = $api;
    }
}