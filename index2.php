<!DOCTYPE html>
<html>
<body>

<?php 
    $servername = "localhost";
    $user = "root";
    $pw = "";
    $db = "db1";

    $connection = new mySQLi($servername, $user, $pw, $db);
    if ($connection->connect_error) die("Connection Error: ".$connection->connect_error);
    #$sql = "INSERT INTO user (Name, Password) VALUES ('Bruce Wayne', 'verysecret')";
    $sql = "SELECT * FROM user";
    $ret = $connection->query($sql);
    /*
    if ($connection->query($sql) === TRUE) {
        echo "SQL-Query accepted.";
    } else {
        echo "SQL-Query declined. Error: ". $con->error;
    }*/
    if ($ret->num_rows > 0) {
        while ($i = $ret->fetch_assoc()) {
            echo "ID: " . $i["ID"] . ". Name: " . $i["Name"];
        }
    }


    $connection->close();
?>

</body>
</html>