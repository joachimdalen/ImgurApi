<?php
class InvalidAuthCredentialsException extends Exception
{
    protected $message = "The authentication credentials are invalid.";
}