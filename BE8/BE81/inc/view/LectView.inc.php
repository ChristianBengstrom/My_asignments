<?php
/**
 * Description of LiveLecture view
 *
 * @author nml
 */
class LiveLectureView extends Product {
    protected $duration;
    protected $lecturer;
    protected $topic;

    public function __construct($title, $duration
            , $lecturer, $topic) {
        $this->title = $title;
        $this->duration = $duration;
        $this->lecturer = $lecturer;
        $this->topic = $topic;
        $this->type = 'LiveLecture';
    }

    public function getDuration() {
        return $this->duration;
    }

    public function display() {
        printf("<p>Lecture: %s (%s), %s speaks about %s\n"
                , $this->getTitle()
                , $this->getDuration()
                , $this->lecturer
                , $this->topic);
    }

}
