<?php


namespace models;


use core\Model;

class AutographForm extends Model
{
    public string $item_input='';
    public array $type=[];
    public string $duration='';
    public string $goal='';

    public function rules():array
    {
        return[
            'personality'=>[self::RULE_REQUIRED]
        ];
    }



}