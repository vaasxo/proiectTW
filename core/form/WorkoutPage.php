<?php


namespace core\form;


use core\Model;

class WorkoutPage
{
    public int $id;
    public string $title;
    public string $duration;
    public string $difficulty;
    public string $calMin;
    public string $calMax;
    public string $calAvg;
    public string $video;
    public string $type;

    public function __construct(int $id,string $title,string $type,string $duration,string $difficulty,string $calMin,string $calMax,string $calAvg,string $video)
    {
        $this->id=$id;
        $this->title= $title;
        $this->duration=$duration;
        $this->difficulty=$difficulty;
        $this->calAvg=$calAvg;
        $this->calMax=$calMax;
        $this->calMin=$calMin;
        $this->video=$video;
        $this->type=$type;
    }

    public function __toString()
    {
        return sprintf('
        <ol class="exercise-list">
            <li class="exercise">
            <section class="exercise-text">
                <span class="exercise-number">1</span>
                <section class="exercise-about">
                    <span class="exercise-title">%s</span>
                    <ul>
                        <li>Duration: %s minutes</li>
                        <li>Difficulty: %s</li>
                        <li>Workout type: %s</li>
                        <li>Average calories burned: %s kcal</li>
                        <li>Minimum calories burned: %s kcal</li>
                        <li>Maximum calories burned: %s kcal</li>
                    </ul>
                </section>
            </section>
            <section class="video-container">
                <iframe class="video" src="https://www.youtube.com/embed/%s?rel=0&amp;origin=https://www.fitnessblender.com&amp;autoplay=0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" frameborder="0" allowfullscreen="1"></iframe>
            </section>
            </li>
            </ol>
        ',
            $this->title,$this->duration,
            ($this->difficulty==='1' || $this->difficulty==='2')?'easy':(($this->difficulty==='3'||$this->difficulty==='4')?'medium':'hard'),
            $this->type,$this->calAvg,$this->calMin,$this->calMax,
            substr($this->video,strpos($this->video,'v=')+2));
    }
}