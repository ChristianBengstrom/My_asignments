<?php
/*
 * This is a CONTROLLER
 */
require_once './inc/TelevisionI.inc.php';
require_once './inc/Television.inc.php';

class TelevisionRC {
    private $model;

    public function __construct(Television $model) {
        $this->model = $model;
    }

    public function action($p) {
        if (isset($p['on'])) {
            $this->model->tvOnOff();
        } elseif (isset($p['chup'])) {
            $this->model->chUp();
        } elseif (isset($p['chdown'])) {
            $this->model->chDown();
        } elseif (isset($p['volup'])) {
            $this->model->volUp();
        } elseif (isset($p['voldown'])) {
            $this->model->volDown();
        } elseif (isset($p['mute'])) {
            $this->model->mute();
        } else {
          return;
        }
    }
}
