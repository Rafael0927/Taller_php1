<?php
include '../conexion.php';

try {  
    $id = $_GET["id"];  
    $statement=$mbd->prepare("SELECT * from estudiante WHERE id = ?");

    $statement->bindParam(1, $id);

    $statement->execute();

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $mbd = null;

    header('Content-type:application/json;charset=utf-8');
    echo json_encode($results);

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
