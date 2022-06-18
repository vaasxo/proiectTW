<?php


namespace core\form;


use core\Model;

class Field
{
    public const TYPE_TEXT='text';
    public const TYPE_PASSWORD='password';
    public string $type;
    public Model $model;
    public string $attribute;

    /**
     * Field constructor.
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->type=self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf('
        <section class="%s_input_container">
                    <label>
                        <input class="%s_input" type="%s" name="%s" placeholder="%s">
                    </label>
        </section>
        <div class="invalid-feedback" >
                    %s
                    </div>
        ',
        $this->attribute,
            $this->attribute,
            $this->type,
            $this->attribute,
            ($this->attribute==='email')?'Email Address':
                (($this->attribute==='password')?'Password':
                    (($this->attribute==='confirmPass')?'Confirm Password':'')),
            $this->model->getFirstError($this->attribute)
        );
    }
    public function passwordField(): Field
    {
        $this->type=self::TYPE_PASSWORD;
        return $this;
    }
}