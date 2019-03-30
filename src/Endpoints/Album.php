<?php

namespace JoachimDalen\ImgurApi\Endpoints;


use AlbumHashNotSetException;
use DeleteHashNotSetException;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use JoachimDalen\ImgurApi\BaseApi;

class Album
{
    /**
     * @var BaseApi
     */
    private $api;
    /**
     * @var string
     */
    private $albumHash;

    private $endpoint = 'album/';

    /**
     * Album constructor.
     * @param BaseApi $api
     * @param string $albumHash
     */
    public function __construct(BaseApi $api, string $albumHash)
    {
        $this->api = $api;

        $this->albumHash = $albumHash;
    }

    /**
     * Get additional information about an album.
     *
     * @see https://api.imgur.com/models/album
     * @return Imgur/Album
     * @throws GuzzleException
     * @throws AlbumHashNotSetException
     */
    public function details()
    {
        if (!isset($this->albumHash)) throw new AlbumHashNotSetException;
        return $this->api->request(
            $this->endpoint . $this->albumHash,
            'GET'
        );
    }

    /**
     * Return all of the images in the album.
     *
     * @see https://api.imgur.com/models/image
     * @return Imgur/Image
     * @throws GuzzleException
     * @throws AlbumHashNotSetException
     */
    public function images()
    {
        if (!isset($this->albumHash)) throw new AlbumHashNotSetException;
        return $this->api->request(
            $this->endpoint . $this->albumHash . '/images',
            'GET'
        );
    }


    /**
     * Get information about an image in an album, any additional actions found in Image Endpoint will also work.
     * @param string $imageHash Hash id of the image
     * @return mixed
     * @throws GuzzleException
     * @throws Exception
     */
    public function image(string $imageHash)
    {
        if (!isset($this->albumHash)) throw new AlbumHashNotSetException;
        return $this->api->request(
            $this->endpoint . $this->albumHash . '/image/' . $imageHash,
            'GET'
        );
    }

    /**
     * Create a new album.
     *
     * @param array $data
     * @param bool $authed
     * @return mixed
     * @throws GuzzleException
     */
    public function create(array $data, bool $authed = false)
    {
        return $this->api->request(
            $this->endpoint,
            'POST',
            $authed,
            $data
        );
    }

    /**
     * Update the information of an album. For anonymous albums, albumHash must be set.
     *
     * @param array $data
     * @param bool $authed
     * @param string|null $deleteHash
     * @return mixed
     * @throws Exception
     * @throws GuzzleException
     */
    public function update(array $data, bool $authed = false, string $deleteHash = null)
    {
        if (!$authed && is_null($deleteHash)) throw new DeleteHashNotSetException;
        if ($authed && is_null($this->albumHash)) throw new AlbumHashNotSetException;
        return $this->api->request(
            $this->endpoint . '/' . $authed ? $this->albumHash : $deleteHash,
            'PUT',
            $authed,
            $data
        );
    }

    /**
     * Delete an album.
     *
     * @param bool $authed
     * @param string|null $deleteHash
     * @return mixed
     * @throws GuzzleException
     * @throws Exception
     */
    public function delete(bool $authed = false, string $deleteHash = null)
    {
        if (!$authed && is_null($deleteHash)) throw new DeleteHashNotSetException;
        if ($authed && is_null($this->albumHash)) throw new AlbumHashNotSetException;
        return $this->api->request(
            $this->endpoint . '/' . $authed ? $this->albumHash : $deleteHash,
            'DELETE',
            $authed
        );
    }

    public function favorite()
    {

    }

    public function setImages()
    {

    }

    public function addImage()
    {

    }

    public function removeImage()
    {

    }
}