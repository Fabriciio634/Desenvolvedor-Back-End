<?php
    include_once(__DIR__ . '/../DAO/db.php');    
    use App\DAO\connDB;
    
    $output = array('error' => false);
 
    $database = new connDB();
    $db = $database->open();
    try{
        $sql = "DELETE FROM cliente WHERE id = '".$_POST['id']."'";
        if($db->exec($sql)){
            $output['message'] = 'Cliente excluido com sucesso!';
        }
        else{
            $output['error'] = true;
            $output['message'] = 'Algo deu errado. Cliente não pode ser excluido.';
        } 
    }
    catch(PDOException $e){
        $output['error'] = true;
        $output['message'] = $e->getMessage();;
    }
 
    $database->close();
 
    echo json_encode($output);
?>
