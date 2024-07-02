<?php
include_once(__DIR__ . '/../DAO/db.php');

use App\DAO\connDB;

$database = new connDB();
$db = $database->open();

if ($db) {
    try {
        $sql = 'SELECT * FROM cliente';
        foreach ($db->query($sql) as $row) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                <td><?php echo htmlspecialchars($row['address']); ?></td>
                <td>
                    <button class="btn btn-success btn-sm edit" data-id="<?php echo htmlspecialchars($row['id']); ?>"><span class="glyphicon glyphicon-edit"></span> Editar</button>
                    <button class="btn btn-danger btn-sm delete" data-id="<?php echo htmlspecialchars($row['id']); ?>"><span class="glyphicon glyphicon-trash"></span> Excluir</button>
                </td>
            </tr>
            <?php 
        }
    } catch (\PDOException $e) {
        echo "There is some problem with the query: " . htmlspecialchars($e->getMessage());
        error_log("Query error: " . $e->getMessage(), 3, 'errors.log'); // Log de erro
    }

    $database->close();
} else {
    echo "Failed to connect to the database.";
}
?>
