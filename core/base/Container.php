<?php
/**
 *
 * @author liu.lei_1206 <liu.lei_1206@immomo.com>
 * @since  2017-01-23
 */
namespace core\base;

use ReflectionClass;

class Container extends Component {
    /**
     * @var array singleton objects indexed by their types
     */
    private $_singletons = [];
    /**
     * @var array object definitions indexed by their types
     */
    private $_definitions = [];

    public function get($class, $params = [], $config = []) {
        if (isset($this->_singletons[$class])) {
            return $this->_singletons[$class];
        }

        return $this->build($class, $params, $config);
    }

    /**
     * Creates an instance of the specified class.
     * This method will resolve dependencies of the specified class, instantiate them, and inject
     * them into the new instance of the specified class.
     * @param string $class the class name
     * @param array $params constructor parameters
     * @param array $config configurations to be applied to the new instance
     * @return object the newly created instance of the specified class
     */
    public function build($class, $params = [], $config = []) {
        $refection = new ReflectionClass($class);
        $object = $refection->newInstanceArgs($params);
        foreach ($config as $name => $value) {
            $object->$name = $value;
        }

        return $object;
    }
}