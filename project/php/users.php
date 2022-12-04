<?php

class Usergames{
    public $gamesID;
    public $result;
    public $timeplayed;

    public function __construct($gamesID,$result,$timeplayed) {
        $this->gamesID = $gamesID;
        $this->result = $result;
        $this->timeplayed = $timeplayed;
    }

}
?>