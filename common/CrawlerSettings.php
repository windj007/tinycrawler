<?php

require_once (__DIR__.DS.'LogConfig.php');

class CrawlerSettings {
    public function __construct($seeds) {
        $this->seeds = $seeds;
    }
    public function getSeeds() {
        return $this->seeds;
    }

    private $seeds = array();
}