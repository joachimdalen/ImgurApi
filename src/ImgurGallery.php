<?php

namespace JoachimDalen\ImgurApi;

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