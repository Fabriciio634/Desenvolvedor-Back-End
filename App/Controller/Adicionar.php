<?php
    include_once(__DIR__ . '/../DAO/db.php');
    $output = array('error' => false);
    
    use App\DAO\connDB;
    
    $database = new connDB();
    $db = $database->open();
    try{
        $stmt = $db->prepare("INSERT INTO client (firstname, lastname, address) VALUES (:firstname, :lastname, :address)");

        if ($stmt->execute(array(':firstname' => $_POST['firstname'] , ':lastname' => $_POST['lastname'] , ':address' => $_POST['address'])) ){
            $output['message'] = 'Cliente adicionado com sucesso.';
        }
        else{
            $output['error'] = true;
            $output['message'] = 'Algo deu errado. Cliente não pode ser adicionado.';
        } 
            
    }
    catch(PDOException $e){
        $output['error'] = true;
        $output['message'] = $e->getMessage();
    }
 
    $database->close();
 
    echo json_encode($output);
?>