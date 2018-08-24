<?php session_start() ?>
<html>
<body>
<?php 
    include 'menu.php';
    $_SESSION["time"] = Date("d.m.Y - H:i:s");
    #want to end session?
    #session_unset();
    #session_destroy();
?>
</body>
</html>