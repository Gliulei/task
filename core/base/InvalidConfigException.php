<?php
/**
 *
 * @author liu.lei_1206 <liu.lei_1206@immomo.com>
 * @since  2017-01-24
 */
namespace core\base;
class InvalidConfigException extends \Exception {
    public function getName() {
        return 'Invalid Configuration';
    }
}