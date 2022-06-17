<?php


namespace core\form;


use core\Model;

class WorkoutField
{
    public int $id;
    public string $title;
    public string $duration;
    public string $image;

    public function __construct(int $id,string $title,string $duration,string $image)
    {
        $this->id=$id;
        $this->title= $title;
        $this->duration=$duration;
        $this->image=$image;
    }

    public function __toString()
    {
        return sprintf('
        <section class="image-name-duration">
        <a href="/workout?id=%s">
            <img src="%s" alt="1">
            <p class="title">%s</p>
            <p>%s minutes</p>
        </a>
    </section>
        ',
            $this->id,$this->image,$this->title,$this->duration);
    }
}