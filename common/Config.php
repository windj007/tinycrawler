<?php

require_once (__DIR__.DS.'LogConfig.php');
require_once (__DIR__.DS.'CrawlerSettings.php');

class Config {
    public static function Load($file_path) {
        $loaded_array = yaml_parse_file($file_path);
        var_export($loaded_array);
        return new Config(
              $loaded_array['actions']
            , $loaded_array['crawlerSettings']
            , $loaded_array['userState']
            , new LogConfig($loaded_array['log']['file'], $loaded_array['log']['level']) );
    }

    public function __construct($actions, $crawlerSettings, $userState, $log) {
        $this->actions = $actions;
        $this->crawlerSettings = $crawlerSettings;
        $this->userState = $userState;
        $this->log = $log;
    }

    public function getActions() {
        return $this->actions;
    }

    public function getCrawlerSettings() {
        return $this->crawlerSettings;
    }

    public function getUserState() {
        return $this->userState;
    }

    public function getLog() {
        return $this->log;
    }

    private $actions = array();
    private $crawlerSettings = null; // new CrawlerSettings();
    private $userState = null;
    private $log = null; // new LogConfig();
    
}