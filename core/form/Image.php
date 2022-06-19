<?php


namespace core\form;


use core\Model;

class Image
{
    public Model $model;
    public string $class;
    public string $src;
    public string $alt;

    /**
     * Input constructor.
     * @param Model $model
     * @param string $class
     * @param string $type
     * @param string $script
     */
    public function __construct(Model $model, string $class,string $src, string $alt)
    {
        $this->model=$model;
        $this->class=$class;
        $this->src=$src;
        $this->alt=$alt;

    }
    public function __toString(){
        $input_field=sprintf('<img id="%s" class="%s" src="%s" alt="%s"> ',
            $this->class,
            $this->class,
            $this->src,
            $this->alt);

        return $input_field;
    }
}