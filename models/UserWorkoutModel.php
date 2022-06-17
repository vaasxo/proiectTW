<?php


namespace models;


use core\DBModel;

class UserWorkoutModel extends DBModel
{
    public int $id_user=0;
    public int $id_workout=0;


    public function getTableName(): string
    {
        return 'user_workouts';
    }

    public function getPrimaryKey(): string
    {
        return '';
    }

    public function getAttributes(): array
    {
        return ['id_user', 'id_workout'];
    }

    public function rules(): array
    {
        return [];
    }

}