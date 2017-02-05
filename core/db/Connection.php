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
    /**
     * @var PDO
     */
    public $pdo;
    public $dsn;
    public $username;
    public $password;
    public $charset;

    /**
     * @var \PDOStatement
     */
    public $pdoStatement;

    public $params = [];

    public function createInstance() {
        try {
            if (!class_exists('PDO')) throw new \Exception("不支持:PDO");
            $this->pdo = new PDO($this->dsn, $this->username, $this->password, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . $this->charset]);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        } catch (PDOException $e) {
            die('Erro no banco de dados: ' . $e->getMessage());
        }
    }

    public function init() {
        if ($this->pdo !== null) {
            return;
        }
        $this->createInstance();
    }

    /**
     * 执行查询 主要针对 SELECT, SHOW 等指令
     * @access function
     * @param string $sql sql指令
     * @return mixed
     */
    public function query($sql = '') {
        $this->pdoStatement = $this->pdo->prepare($sql);
        $this->bindPdoParams();
        $bol = $this->pdoStatement->execute();
        //关闭游标
        $this->pdoStatement->closeCursor();

        // 有错误则抛出异常
//        self::haveErrorThrowException();
        return $bol;
    }

    /**
     * pdoStatement bind values
     */
    public function bindPdoParams() {
        foreach ($this->params as $name => $value) {
            $this->pdoStatement->bindValue($name, $value);
        }
        $this->params = [];
    }


    public function exec($sql) {
        return $this->db->query($sql);
    }

    public function free() {
        $this->pdoStatement = null;
    }

}