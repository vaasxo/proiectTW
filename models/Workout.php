<?php

namespace models;


use core\WorkoutModel;

class Workout extends WorkoutModel
{
    public string $title='';
    public string $duration='';
    public string $type='';
    public string $difficulty='';
    public string $calorie_min='';
    public string $calorie_avg='';
    public string $calorie_max='';
    public string $image='';
    public string $video='';


    public function getTableName(): string
    {
        return 'workouts';
    }

    public function getPrimaryKey(): string
    {
        return 'id';
    }

    public function getAttributes(): array
    {
        return ['title', 'duration', 'type', 'difficulty', 'calorie_min', 'calorie_avg', 'calorie_max', 'image', 'video'];
    }

    public function rules(): array
    {
        return [];
    }
}