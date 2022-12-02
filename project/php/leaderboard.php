<?php

class Leaderboard {
    // public $pkey;
    public $username;
    public $totalgames;
    public $wins;
    public $losses;
    public $timeplayed;

    public function __construct($username,$totalgames,$wins,$losses,$timeplayed) {

        // $this->pkey = $pkey;
        $this->username = $username;
        $this->totalgames = $totalgames;
        $this->wins = $wins;
        $this->losses = $losses;
        $this->timeplayed = $timeplayed;
    }

}
?>