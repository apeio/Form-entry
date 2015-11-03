<?php

require dirname(__DIR__) . '/config/bootstrap.php';

// Set our defaults
$controller = $config['default_controller'];
$action = 'index';
$url = '';

$_SERVER['PHP_SELF'] = str_replace('/webroot', '', $_SERVER['PHP_SELF']);

// Get request url and script url
$request_url = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';

$query = strpos($request_url, '?', 1);

if ($query) $request_url = substr($request_url, 0, $query);

$script_url = (isset($_SERVER['PHP_SELF'])) ? $_SERVER['PHP_SELF'] : '';

// Get our url path and trim the / of the left and the right
if ($request_url != $script_url) $url = trim(preg_replace('/' . str_replace('/', '\/', str_replace('index.php', '', $script_url)) . '/', '', $request_url, 1), '/');

// Split the url into segments
$segments = explode('/', $url);

// Do our default checks
if (isset($segments[0]) && $segments[0] != '') $controller = $segments[0];
if (isset($segments[1]) && $segments[1] != '') $action = $segments[1];

// Get our controller file
$path = APP_CONTROLLER . DS . $controller . '.php';

if (file_exists($path)) {
    require_once($path);
} else {
    $controller = $config['error_controller'];
    require_once(APP_CONTROLLER . DS . $controller . '.php');
}

// Check the action exists
if (!method_exists($controller, $action)) {
    $controller = $config['error_controller'];
    require_once(APP_CONTROLLER . DS . $controller . '.php');
    $action = 'index';
}

// Create object and call method
$obj = new $controller;

die(call_user_func_array(array($obj, $action), array_slice($segments, 2)));
