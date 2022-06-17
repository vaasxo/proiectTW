<?php


namespace core\form;


use core\Model;

class Section
{
    public static function begin($class, $method): Section
    {
        echo sprintf('<form class="%s" method="%s">', $class, $method);
        return new Section;
    }

    public static function end()
    {
        echo '</form>';
    }
    public function field(Model $model, $attribute): Field
    {
        return new Field($model, $attribute);
    }
    public function fieldset(Model $model,string $class,string $question,string $type,$attributes=[]):Fieldset
    {
        return new Fieldset($model,$class,$question,$type,$attributes);
    }
    public function workoutField($id,$title,$duration,$image):WorkoutField
    {
        return new WorkoutField($id,$title,$duration,$image);
    }
    public function workoutPage(int $id,string $title,string $type,string $duration,string $difficulty,string $calMin,string $calMax,string $calAvg,string $video){
        return new WorkoutPage($id,$title,$type,$duration,$difficulty,$calMin,$calMax,$calAvg,$video);
    }
}