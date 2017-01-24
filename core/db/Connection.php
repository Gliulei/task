<?php

/**
 * 统一对外数据库连接类
 * @author liu.lei_1206 <liu.lei_1206@immomo.com>
 * @since  2017-01-17
 */
namespace core\db;

use core\base\Component;
use PDO;
use PDOException;

class Connection extends Component {
    public $pdo;
    public $dsn;
    public $username;
    public $password;
    public $charset;

    public function createInstance() {
        try {
            $this->pdo = new PDO($this->dsn, $this->username, $this->password, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . $this->charset]);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        } catch (PDOException $e) {
            die('Erro no banco de dados: ' . $e->getMessage());
        }
    }
}