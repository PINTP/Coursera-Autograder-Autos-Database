<?php 
    require_once "pdo.php";
    
    $statement = $pdo->query("SELECT * FROM users");

    while ( $row = $statement->fetch(PDO::FETCH_ASSOC)) {
        print_r($row);
    }

?>