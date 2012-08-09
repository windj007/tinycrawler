 <?php

require_once (__DIR__.DS.'LogConfig.php');

class Log {
    public static function init($config) {
        if (!isset($config))
            $config = new LogConfig();
        self::$instance = new Log($config);
    }

    public static function &cur() {
        if (!isset(self::$instance))
            self::init();
        return self::$instance;
    }

    public function __construct($conf) {
        $this->config = $conf;
        $this->out_file = fopen($this->config->getLogFile());
        
    }

    public function error($message) {
        if ($this->config->getLevel() >= 1)
            $this->message('Error', $message);
    }

    public function error($info) {
        if ($this->config->getLevel() >= 2)
        $this->message('Info', $message);
    }

    private function message($type, $msg) {
        if (!isset($this->out_file))
            return;

        fprintf($this->out_file, "%10s - %10d : %s\n", date('d.m.Y H:i:s:u'), $type, $msg);
    }

    private static $instance = null;

    private $config = null;
    private $out_file = null;
}