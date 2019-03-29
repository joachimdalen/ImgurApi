<?php

namespace JoachimDalen\ImgurApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class BaseApi
{
    private $clientId;
    private $clientSecret;
    protected $baseUri = 'https://api.imgur.com/3/';
    protected $params = [];

    public function __construct($clientId, $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * @param string $endpoint
     * @param string $method
     * @param bool $anonymous
     * @param array $content
     * @return mixed
     * @throws GuzzleException
     */
    public function request(string $endpoint, string $method, bool $anonymous = true, array $content = [])
    {
        try {
            $client = new Client([
                'base_uri' => $this->baseUri,
                'headers' => [
                    'authorization' => $anonymous ? 'Client-ID ' . $this->clientId : 'Bearer ' . $this->clientId,
                    /*  'content-type' => 'application/x-www-form-urlencoded',*/
                ]
            ]);

            $response = $client->request($method, $endpoint);
            return json_decode($response->getBody()->getContents());
        } catch (\Exception $exception) {
            dd($exception);
        }
    }
}