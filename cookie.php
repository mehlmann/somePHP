<?php setcookie('userCookie', 'Bruce', time()+86400*7, '/') ?>
<html>
<body>

<?php 
    if (isset($_COOKIE['userCookie'])) echo 'Welcome back, ' . $_COOKIE['userCookie'] . '.';
?>

</body>
</html>