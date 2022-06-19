<?php


namespace core\form;


use core\Model;

class Input
{
    public Model $model;
    public string $class;
    public string $type;
    public string $script;
    public string $name;
    public string $accept;
    public string $onchange;

    /**
     * Input constructor.
     * @param Model $model
     * @param string $class
     * @param string $type
     * @param string $script
     */
    public function __construct(Model $model, string $class,string $type, string $script, string $name, string $accept, string $onchange)
    {
        $this->model=$model;
        $this->class=$class;
        $this->type=$type;
        $this->script=$script;
        $this->name=$name;
        $this->accept=$accept;
        $this->onchange=$onchange;

    }
    public function __toString(){
        $input_field=sprintf('<input class="%s" id="%s" type="%s" name="%s" ',
            $this->class,
            $this->class,
            $this->type,
            $this->class);
        if ($this->script!='none'){
            $input_field.= sprintf('onclick="%s()"', $this->script);
        }
        if ($this->name!='none'){
            $input_field.= sprintf('name="%s"', $this->name);
        }
        if ($this->accept!='none'){
            $input_field.= sprintf('accept="%s"', $this->accept);
        }
        if ($this->onchange!='none'){
            $input_field.= sprintf('onchange="%s"', $this->onchange);
        }


        $input_field.=sprintf('><div class="invalid-feedback" >
                    %s
                    </div>',$this->model->getFirstError($this->class));
        return $input_field;
    }
}