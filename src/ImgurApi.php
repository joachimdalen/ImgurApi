<?php

namespace JoachimDalen\ImgurApi;

use Illuminate\Foundation\Application;
use InvalidAuthCredentialsException;
use JoachimDalen\ImgurApi\Endpoints\Album;
use JoachimDalen\ImgurApi\Endpoints\Gallery;

/**
 * Class ImgurApi
 * @package JoachimDalen\ImgurApi
 */
class ImgurApi
{

    /**
     * Laravel application
     *
     * @var Application
     */
    public $app;

    /**
     * @var BaseApi
     */
    public $api;



    /**
     * ImgurApi constructor.
     * @param $app
     * @throws InvalidAuthCredentialsException
     */
    public function __construct($app)
    {
        $this->app = $app;
        $clientId = $this->app->config->get('imgur.client_id');
        $clientSecret = $this->app->config->get('imgur.client_secret');

        if (is_null($clientId) || is_null($clientSecret)) {
            throw new InvalidAuthCredentialsException;
        }
        $this->api = new BaseApi($clientId, $clientSecret);
    }

    /**
     * @param null|string $albumHash The hash of the album to manage
     * @return Album
     */
    public function album($albumHash = null)
    {
        return new Album($this->api, $albumHash);
    }

    /**
     * @return Gallery
     */
    public function gallery()
    {
        return new Gallery($this->api);
    }
}