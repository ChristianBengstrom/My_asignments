<?php

/**
 * Description of LiveLecture
 *
 * @author nml
 */
class LiveLecture extends Product {
    protected $lecturer;
    protected $duration;
    protected $topic;

    public function __construct($title, $lecturer, $duration, $topic) {
        $this->title = $title;
        $this->lecturer = $lecturer;
        $this->duration = $duration;
        $this->topic = $topic;
        $this->type = 'LiveLecture';
    }

    public function getLecturer() {
        return $this->lecturer;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function getTopic() {
        return $this->topic;
    }

    public function display() {
        printf("<p>%s:, %s, %s, %s, %s\n"
                , $this->getProductType()
                , $this->getTitle()
                , $this->getLecturer()
                , $this->getDuration()
                , $this->getTopic());
    }
}
