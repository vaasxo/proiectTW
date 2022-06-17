<?php


namespace core\exception;


class NotFoundException extends \Exception
{
    protected $code = 404;
    protected $message = "page not found";
}