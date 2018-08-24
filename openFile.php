<!DOCTYPE html>
<html>
<body>
<?php 
    $file = fopen('test.txt', 'r');
    #$text = 'This is some text.';
    #fwrite($file, $text);
    while (!feof($file)) {
        echo fgets($file) . "<br>";
    }
    fclose($file);
    readfile('test.txt');
?>
</body>
</html>