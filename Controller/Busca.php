<?php
    include_once(__DIR__ . '/../DAO/db.php');
    
    use App\DAO\connDB;
    
    $output = array('error' => false);
 
    $database = new connDB();
    $db = $database->open();
 
    try{
        $id = $_POST['id'];
        $stmt = $db->prepare("SELECT * FROM cliente WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $output['data'] = $stmt->fetch();
    }
    catch(PDOException $e){
        $output['error'] = true;
        $output['message'] = $e->getMessage();
    }
 
    $database->close();
 
    echo json_encode($output);
?>