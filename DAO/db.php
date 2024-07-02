<?php
namespace App\DAO;

class connDB {
    private $server = "mysql:host=ctgplw90pifdso61.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306
;dbname=n7isy27hinhr1pq9";
    private $username = "vitgobeli75tqeje";
    private $password = "c490grxjwj30nvtl";
    private $options = array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC);
    protected $connDB;

    public function open() {
        try {
            $this->connDB = new \PDO($this->server, $this->username, $this->password, $this->options);
            return $this->connDB;
        } catch (\PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
            return null;
        }
    }

    public function close() {
        $this->connDB = null;
    }
}
?>
