<hr />
<h2>List of all users</h2>
<?php

    $statement = $pdo->query("SELECT user_id, name, email, password FROM users");

    echo "<table border='-1'>";
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<th>".$row['user_id']."</th>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['password']."</td>";
        echo "</tr>";
    }
    echo "</table>";
    
?>