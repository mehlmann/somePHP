<!DOCTYPE html>
<html>
<body>
<?php 

    $safe = true;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "db1";
        $connection = new mySQLi($servername, $username, $password, $database);
        if ($connection->connect_error) echo "Connection Error: " . $connection->connect_error;
        if ($safe) {
            #prepare sql statement, send variables there after
            $sql = $connection->prepare("SELECT Name, Password FROM user WHERE Name=? AND Password=?");
            $sql->bind_param("ss", $_POST["username"], $_POST["password"]); # why no hash?!
            $sql->execute();
            $sql->bind_result($result_user, $result_password);
            while($sql->fetch()) {
                echo $result_user . " - " . $result_password;
            }
            $sql->close();
        } else {
            $sql = "SELECT Name, Password FROM user WHERE Name='" . $_POST["username"] . "' AND Password='" . $_POST["password"] . "'";
            $result = $connection->query($sql);
            if ($result == false) echo "Error: " . $connection->error;
            while ($result != false && $row = $result->fetch_assoc()) {
                echo $row["Name"] . " - " . $row["Password"];
            }
            $connection->close();
        }
        
    }
?>

<form action="sql_injection.php" method="POST">
    Username: <input type="text" name="username"/>
    Password: <input type="text" name="password"/>
    <input type="submit" value="Login" name="submit"/>
</form>

</body>
</html>