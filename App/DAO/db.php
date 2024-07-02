<?php
Class connDB{
  
    private $server = "mysql:host=localhost;dbname=testingdb";
    private $username = "root";
    private $password = "";
    private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $connDB;
     
    public function open(){
        try{
            $this->connDB = new PDO($this->server, $this->username, $this->password, $this->options);
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