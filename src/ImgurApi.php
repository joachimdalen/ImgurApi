<?php

namespace JoachimDalen\ImgurApi;

use InvalidAuthCredentialsException;

/**
 * Class ImgurApi
 * @package JoachimDalen\ImgurApi
 */
class ImgurApi
{

    /**
     * Laravel application
     *
     * @var \Illuminate\Foundation\Application
     */
    public $app;

    /**
     * @var BaseApi
     */
    public $api;

    /**
     * @var string
     */
    private $accessToken;

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
     * @return ImgurAlbum
     */
    public function album($albumHash = null)
    {
        return new ImgurAlbum($this->api, $albumHash);
    }

    public function gallery()
    {
        return new ImgurGallery($this->api);
    }

    public function setAccessToken($token)
    {
        $this->accessToken = $token;
    }
}