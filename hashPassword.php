<html>
<body>

<?php
    include 'menu.php';
    $salt = true;
    $error = '';
    echo '<br>Type in the password you want to hash (SHA512)...<br>';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $input = htmlspecialchars(stripslashes(trim($_POST['password'])));
        if (empty($input)) $error = 'Provide a password.';
        
    }
?>

<form action='hashPassword.php' method='post'> 
    Password:<input type= 'text' name='password'><br>
    <input type='submit' name='HashPassword'>
    <?php 
        if ($error == '') {
            if ($salt) {
                $saltedHash = password_hash($input, PASSWORD_DEFAULT);
                echo '<br>' . $saltedHash;
                echo '<br>' . password_verify($input, $saltedHash);
            } else {
                echo '<br>' . hash('sha512', $input);
            }
            
        } else { 
            echo '<br>' . $error;
        }
    ?>
</form>

</body>
</html>