<?php
/**
 *
 * @author liu.lei_1206 <liu.lei_1206@immomo.com>
 * @since  2017-01-19
 */
namespace core\base;

class Component {

    public function __construct($config = []) {
        foreach ($config as $name => $value) {
            $this->$name = $value;
        }
        $this->init();
    }

    public function init() {

    }

    public function __get($name) {
        return 'not exists';
    }
}