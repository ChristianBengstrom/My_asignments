<?php
/*
 * This is a VIEW
 */
require_once './inc/TelevisionI.inc.php';
require_once './inc/Television.inc.php';

class TelevisionV1 {
    private $model;

    public function __construct(Television $model) {
        $this->model = $model;
    }

    public function remote() {
        $s = sprintf("<form action='%s' method='post'>\n
                        <div class='remote'>\n
                          <p>\n
                            <button type='submit' name='on'>On/Off</button>\n
                          </p>\n
                          <p>\n
                            <div class='up'>\n
                              <button type='submit' name='volup'>Volume Up</button>\n
                              <button type='submit' name='chup'>Channel Up</button>\n
                            </div>\n
                          </p>\n
                          <p>\n
                            <div class='down'>\n
                              <button type='submit' name='voldown'>Volume Down</button>\n
                              <button type='submit' name='chdown'>Channel Down</button>\n
                            </div>\n
                          </p>\n
                          <p>\n
                            <button type='submit' name='mute'>Mute</button>\n
                          </p>\n
                        </div>\n
                      </form>\n"
                    , $_SERVER['PHP_SELF']);
        return $s;
    }

    public function osd() {
        $ooState = $this->model->getTvOnOff() ? 'On' : 'Off';
        $muted = $this->model->getMute() ? 'True' : 'False';
        $s = sprintf("<div class='state'>
                        <p>On/Off: %s
                          <br/>Channel: %s
                          <br/>Volume: %s
                          <br/>Muted: %s
                        </p>
                      </div>\n"
                   , $ooState
                   , $this->model->getChannel()
                   , $this->model->getVolume()
                   , $muted);
        return $s;
    }

    private function mainElm() {

        foreach ($this->model->getMedia() as $medio) {

          $mimeType = $medio->getMimeType();
          $explodedMime = explode('/', $mimeType);

          if ( $explodedMime[0] == 'video' ) {
              $s = "<video controls>\n";
          } else {
              $s = "<audio controls>\n";
          }


            $s .= sprintf("    <source src='./media/%s' type='%s'/>\n"
                      , $medio->getUrl(), $medio->getMimeType());

          }
          if ( $explodedMime[0] == 'video' ) {
              $s .= "</video>\n";
          } else {
              $s .= "</audio>\n";
          }
        return $s;
    }

    public function display() {
        printf("<nav class='nav'>\n%s\n%s\n</nav>\n"
          , $this->osd(), $this->remote());
        printf("<main class='main'>\n%s\n</main>\n"
          , $this->mainElm());
    }
}
