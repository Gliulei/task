<?php
/**
 *
 * @author liu.lei_1206 <liu.lei_1206@immomo.com>
 * @since  2017-01-18
 */
defined('BASE_DIR') || define('BASE_DIR', dirname(__FILE__));
$config = require BASE_DIR . '/config/config.php';

spl_autoload_register(
    function ($class) {
        $file = BASE_DIR . '/'. $class.'.php';
        $file = str_replace('\\','/',$file);
        if(file_exists($file)){
            require_once $file;
        }
    }
);
(new \core\base\App($config))->run();

