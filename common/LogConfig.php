 <?php

class LogConfig {
    public function __construct($log_file = "tinycrawler.log", $level = 10) {
        $this->log_file = $log_file;
        $this->level = $level;
    }

    public function getLogFile() {
        return $this->log_file;
    }

    public function getLevel() {
        return $this->level;
    }

    private $log_file = null;
    private $level = 0;
}