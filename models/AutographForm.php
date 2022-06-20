<?php


namespace models;

use core\Model;

class AutographForm extends Model
{
    public string $personality='';
    public string $field='';
    public string $context='';
    public string $location='';
    public string $object='';
    public string $tags0='';
    public string $price='';
    public string $image='';

    public function rules():array
    {
        return[
            'personality'=>[self::RULE_REQUIRED],
            'field'=>[self::RULE_REQUIRED],
            'context'=>[self::RULE_REQUIRED],
            'location'=>[self::RULE_REQUIRED],
            'object'=>[self::RULE_REQUIRED],
            'tags0'=>[self::RULE_REQUIRED],
            'price'=>[self::RULE_INT]
        ];
    }



}