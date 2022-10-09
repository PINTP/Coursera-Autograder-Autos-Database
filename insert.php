<?php
    require_once "pdo.php";
    
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['email']) ) {
        
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";

        echo "<pre>\n$sql\n</pre>\n";

        $statement = $pdo->prepare($sql);
        
        $statement->execute(array(
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':password' => $_POST['password']
        ));
    }
?>

<html>

<head>
    <title>Insert into users table</title>
</head>

<body>
    <form method="post">
        <p>Add a new user</p>
        <p>Name:
            <input type="text" name="name" id="name" required />
        </p>
        <p>Email:
            <input type="email" name="email" id="email" required />
        </p>
        <p>Password:
            <input type="password" name="password" id="password" required />
        </p>

        <button type="submit">Add new user</button>
    </form>

    <?php include_once "view_users.php" ?>

</body>

</html>