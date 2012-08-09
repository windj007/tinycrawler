<?php

define('TC_ROOT', __DIR__);
define('DS', '/');

require_once (TC_ROOT.DS.'common'.DS.'Config.php');
#require_once (TC_ROOT.DS.'common'.DS.'Log.php');
#require_once (TC_ROOT.DS.'common'.DS.'ActionLoader.php');
#require_once (TC_ROOT.DS.'common'.DS.'Crawler.php');

# load config
$config = Config::Load(TC_ROOT.DS.'config.yaml');

var_export($config);

exit(0);

Log::init($config->getLog());





$actions = ActionLoader::Load($config->getActions());
$crawler = new Crawler($config->getCrawlerSettings(), $actions, $config->getUserState());

$crawler->Run();
