<?php
    include_once(__DIR__ . '/../DAO/db.php');
    
    use App\DAO\connDB;
    
    $output = array('error' => false);
 
    $database = new connDB();
    $db = $database->open();
    try{
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
 
        $sql = "UPDATE cliente SET firstname = '$firstname', lastname = '$lastname', address = '$address' WHERE id = '$id'";
        if($db->exec($sql)){
            $output['message'] = 'Cliente atualizado com sucesso!';
        } 
        else{
            $output['error'] = true;
            $output['message'] = 'Algo deu errado. Cliente não foi atualizado.';
        }
 
    }
    catch(PDOException $e){
        $output['error'] = true;
        $output['message'] = $e->getMessage();
    }
 
    $database->close();
 
    echo json_encode($output);
?>