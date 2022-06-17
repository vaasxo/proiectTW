<?php


namespace models;


use core\Model;
use core\WorkoutModel;

class WorkoutForm extends Model
{
    public string $activity='';
    public array $type=[];
    public string $duration='';
    public string $goal='';

    public function rules():array
    {
        return[
            'activity'=>[self::RULE_REQUIRED],
            'type'=>[self::RULE_REQUIRED],
            'duration'=>[self::RULE_REQUIRED],
            'goal'=>[self::RULE_REQUIRED]
        ];
    }



}