<?php


namespace core\form;


use core\Model;

class Section
{
    public static function begin($class, $method): Section
    {
        echo sprintf('<form id="%s" class="%s" method="%s" enctype="multipart/form-data">',$class, $class, $method);
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
    public function input(Model $model, string $class,string $type, string $script, string $name, string $accept, string $onchange, bool $required): Input
    {
        return new Input($model, $class,$type, $script, $name, $accept,$onchange, $required);
    }
    public function image(Model $model, string $class,string $src, string $alt): Image
    {
        return new Image($model, $class,$src, $alt);
    }
}