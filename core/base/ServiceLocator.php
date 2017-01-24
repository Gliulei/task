<?php
/**
 * 服务装载容器
 * @author liu.lei_1206 <liu.lei_1206@immomo.com>
 * @since  2017-01-24
 */
namespace core\base;
class ServiceLocator extends Component {

    /**
     * @var array shared component instances indexed by their IDs
     */
    private $_components = [];
    /**
     * @var array component definitions indexed by their IDs
     */
    private $_definitions = [];

    public function get($id) {
        if (isset($this->_components[$id])) {
            return $this->_components[$id];
        }
        if (isset($this->_definitions[$id])) {
            $definition = $this->_definitions[$id];
            return $this->_components[$id] = App::createObject($definition);
        } else {
            throw new \Exception("Unknown component ID: $id");
        }
    }

    public function __get($name) {
        if ($this->has($name)) {
            return $this->get($name);
        } else {
            return parent::__get($name);
        }
    }

    public function has($id) {
        return isset($this->_definitions[$id]);
    }

    public function __set($id, $definition) {
        if ($definition === null) {
            unset($this->_definitions[$id], $this->_components[$id]);
            return;
        }
        $this->_definitions[$id] = $definition;
    }

}