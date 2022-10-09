<?php

    require "pdo.php";

    if (isset($_POST['id'])) {
        $sql = "DELETE FROM users WHERE user_id = :user_id";

        echo "<pre>\n$sql\n</pre>\n";

        $statement = $pdo->prepare($sql);

        $statement->execute(array(
            ":user_id" => $_POST['id']
        ));

    }

?>

<html>

<head>
    <title>Delete a user</title>
</head>

<body>
    <p>Delete a user: </p>
    <form method="POST">
        <p>Id:
            <input type="number" id="id" name="id" required />
        </p>

        <button type="submit">Delete user</button>
    </form>

    <hr />
    <div>
        <h2>Table with delete function</h2>
        <?php

            $statement = $pdo->query("SELECT user_id, name, email, password FROM users");

            echo "<table border='-1'>";
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<th>".$row['user_id']."</th>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['password']."</td>";
                echo "<td>";
                echo '<form method="POST">';
                echo '<input type="hidden" name="id" id="id" value="'.$row['user_id'].'" />';
                echo '<button type="submit">Delete</button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }
            echo "</table>";
        
        ?>

        <!-- <?php include_once "view_users.php" ?> -->

</body>

</html>