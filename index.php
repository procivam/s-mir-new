<?php
    ini_set('display_errors', 'on'); // Display all errors on screen
    error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
    header("Cache-Control: public");
    header("Expires: " . date("r", time() + 3600));
    header('Content-Type: text/html; charset=UTF-8');
    ob_start();
    @session_start();

    define('HOST', dirname(__FILE__)); // Root path
    define('APPLICATION', ''); // Choose application - wezom or frontend. If frontend - set ""
    define('PROFILER', FALSE); // On/off profiler
    define('START_TIME', microtime(TRUE)); // For profiler. Don't touch!
    define('START_MEMORY', memory_get_usage()); // For profiler. Don't touch!

    require_once 'autoloader.php'; // Autoloader

    Core\Route::factory()->execute();
    Plugins\Profiler\Profiler::view();
