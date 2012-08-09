<?php

define(TC_ROOT, __DIR__)
define(DS, '/')

require_once (TC_ROOT.DS.'Common'.DS.'Config.php');
require_once (TC_ROOT.DS.'Common'.DS.'Log.php');
require_once (TC_ROOT.DS.'Common'.DS.'ActionLoader.php');
require_once (TC_ROOT.DS.'Common'.DS.'Crawler.php');

# load config
$config = Config::Load('config.js');

Log::init($config->getLog());

$actions = ActionLoader::Load($config->getActions());
$crawler = new Crawler($config->getCrawlerSettings(), $actions, $config->getUserState());

$crawler->Run();
