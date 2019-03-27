<?php

namespace JoachimDalen\ImgurApi;


use AlbumHashNotSetException;

class ImgurAlbum
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
     * ImgurAlbum constructor.
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
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
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
     * @param array $data
     * @param bool $authed
     */
    public function create(array $data, bool $authed = false)
    {

    }

    /**
     * @param array $data
     * @param bool $authed
     * @param string|null $deleteHash
     * @throws \Exception
     */
    public function update(array $data, bool $authed = false, string $deleteHash = null)
    {
        if (!$authed && is_null($deleteHash))
            throw new \Exception("When updating anonymous albums deleteHash must be present");


    }

    public function delete()
    {

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