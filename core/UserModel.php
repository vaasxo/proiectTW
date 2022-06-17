<?php


namespace core;


abstract class UserModel extends DBModel
{
    abstract public function getEmail():string;
}