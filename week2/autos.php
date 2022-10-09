<html>

<head>
    <title>Alan Anand Dsilva</title>
</head>

<body>
    <?php

        require_once "pdo.php";

        if (isset($_GET['name'])) {
            echo "<h1>Tracking Autos for ".$_GET['name']."</h1>";
        } else {
            die("Name parameter missing");
        }

        if(isset($_POST['logout'])) {
            header('Location: index.php');
        } else {
         
            if(isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage'])) {

                if ($_POST['make'] == "") {
                    echo "<p style='color: red'>Make is required</p>";
                } elseif (is_numeric($_POST['year']) && is_numeric($_POST['mileage'])) {
                        $stmt = $pdo->prepare('INSERT INTO autos
                            (make, year, mileage) VALUES ( :mk, :yr, :mi)');
                            
                        $stmt->execute(array(
                            ':mk' => $_POST['make'],
                            ':yr' => $_POST['year'],
                            ':mi' => $_POST['mileage'])
                        );

                        echo "<p style='color: green'>Record inserted</p>";
                } else {
                    echo "<p style='color: red'>Mileage and year must be numeric</p>";   
                }
                
            }   
        }

    ?>

    <form method="post">
        <p>Make:
            <input name="make">
        </p>
        <p>Year:
            <input size="40" name="year">
        </p>
        <p>Mileage:
            <input size="40" name="mileage">
        </p>
        <p>
            <input type="submit" value="Add" name="Add" />
            <input type="submit" value="logout" name="logout" />
        </p>
    </form>

    <h2>Automobiles</h2>
    <ul>
        <?php
            
            $statement = $pdo->query("SELECT auto_id, make, year, mileage FROM autos");
            
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo "<li> ";
                echo $row['year']." ";
                echo htmlentities($row['make'])." / ";
                echo $row['mileage'];
                echo "</li>";
            }
        ?>
    </ul>
</body>

</html>