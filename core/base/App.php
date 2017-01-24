<?php
/**
 *
 * @author liu.lei_1206 <liu.lei_1206@immomo.com>
 * @since  2017-01-23
 */
namespace core\base;

class App extends ServiceLocator {
    public static $app;

    public function __construct(array $config) {
        parent::__construct($config);
        static::$app = $this;
    }

    public function run() {
        echo 'test';
    }

    public function getDb() {
        return $this->get('db');
    }

    public static function createObject($type, $params = []) {
        if (is_array($type) && isset($type['class'])) {
            $class = $type['class'];
            unset($type['class']);
            return (new Container())->get($class, $params, $type);
        } else if (is_string($type)) {
            return (new Container())->get($type, $params);
        } else {
            throw new InvalidConfigException('Unsupported configuration type: ' . gettype($type));
        }
    }
}