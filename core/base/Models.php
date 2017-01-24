<?php
/**
 *
 * @author liu.lei_1206 <liu.lei_1206@immomo.com>
 * @since  2017-01-23
 */
namespace core\base;
class Models extends Component {
    private $db;
    public function __construct($config = []) {
        parent::__construct($config);
        $this->db = App::$app->getDb();
        var_dump($this->db);
    }

    public function getOne() {

    }

    public function getList() {
    }
}