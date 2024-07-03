<?php
namespace App\DAO;

use PDO;
use PDOException;
require_once __DIR__ . '/../../bootstrap.php';

class connDB {
    private $connDB;

    public function open(){
        $host = getenv('DB_HOST');
        $dbname = getenv('DB_NAME');
        $username = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');

        $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);

        $dsn = "mysql:host=$host;dbname=$dbname";
        
        try{
            $this->connDB = new PDO($dsn, $username, $password, $options);
            return $this->connDB;
        }
        catch (PDOException $e){
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }
  
    public function close(){
        $this->connDB = null;
    }
}

?>