<?php

/**
 * Use the DS to separate the directories in other defines
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

define('ROOT', dirname(__DIR__));

/**
 * The actual directory name for the "App".
 */
define('APP_DIR', 'app');

/**
 * Path to the application's directory.
 */
define('APP', ROOT . DS . APP_DIR);

define('APP_CONTROLLER', ROOT . DS . APP_DIR . DS . 'controller');

define('APP_HELPER', ROOT . DS . APP_DIR . DS . 'helper');

define('APP_MODEL', ROOT . DS . APP_DIR . DS . 'model');

define('APP_VIEW', ROOT . DS . APP_DIR . DS . 'view');

/**
 * Path to the config directory.
 */
define('CONFIG', ROOT . DS . 'config' . DS);

/**
 * File path to the webroot directory.
 */
define('WWW_ROOT', ROOT . DS . 'webroot' . DS);

/**
 * Path to the cake directory.
 */
define('CORE_PATH', ROOT . DS . 'core');