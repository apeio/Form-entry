<?php
global $config;

$config = require __DIR__ . '/app.php';

require __DIR__ . '/paths.php';

require CORE_PATH . DS . 'autoload.php';

date_default_timezone_set('Asia/Singapore');

define("BASE_URL", "http://localhost/myphp");

define("LEFTW", 180);
