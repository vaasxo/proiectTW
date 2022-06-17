<?php


namespace core\form;


use core\Model;

class Fieldset
{
    public Model $model;
    public string $class;
    public string $type;
    public string $question;
    public array $attributes=[];
    /**
     * Field constructor.
     * @param Model $model
     * @param string $class
     * @param string $type
     * @param string $question
     * @param array $attributes
     */
    public function __construct(Model $model, string $class, string $question, string $type, array $attributes=[])
    {
        $this->model=$model;
        $this->class=$class;
        $this->type=$type;
        $this->question=$question;
        $this->attributes=$attributes;

    }
    public function __toString(){
        $fieldset=sprintf('<fieldset class="%s">
                            <legend><br>%s</legend>',
            $this->class,$this->question);
        foreach ($this->attributes as $attribute){
            $fieldset .= sprintf('<label class="%s">
                                        %s
                                        <input type="%s" name="%s" value="%s">
                                        <span class="%s">
                                        </span> </label>',
            $this->type==='radio'?'radio-container':'checkbox-container',
                    ucfirst($attribute),
                    $this->type,
                    ($this->type==='checkbox')?$this->class . '[]':$this->class,
                    $attribute,
                    $this->type==='radio'?'radio-checkmark':'checkbox-checkmark'
            );
        }
        $fieldset .=sprintf('</fieldset>
                        <div class="invalid-feedback" >
                        %s
                        </div>',
                        $this->model->getFirstError($this->class));
        return $fieldset;
    }
}