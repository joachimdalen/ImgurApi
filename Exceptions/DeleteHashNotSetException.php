<?php


class DeleteHashNotSetException extends Exception
{
    protected $message = "Deletehash can not be null to perform this operation on an anonymous item";
}