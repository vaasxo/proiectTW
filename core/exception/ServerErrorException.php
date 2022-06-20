<?php


namespace core\exception;


class ServerErrorException extends \Exception
{
    protected $code = 500;
    protected $message = 'Internal Server Error';
}