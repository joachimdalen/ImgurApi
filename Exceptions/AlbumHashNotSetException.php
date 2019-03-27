<?php
class AlbumHashNotSetException extends Exception
{
    protected $message = "Album hash can not be null to perform this operation";
}