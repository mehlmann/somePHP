<!DOCTYPE html>
<html>
<body>
<?php 
    include "menu.php";
    $YEAR_SEC = 31449600;
    $WEEK_SEC = 604800;
    $DAY_SEC = 86400;
    $HOUR_SEC = 3600;
    $MIN_SEC = 60;
    $timestamp = time();

    $years = floor($timestamp / $YEAR_SEC);
    $rest = $timestamp % $YEAR_SEC;

    $weeks = floor($rest / $WEEK_SEC);
    $rest = $rest % $WEEK_SEC;

    $days = floor($rest / $DAY_SEC);
    $rest = $rest % $DAY_SEC;

    $hours = floor($rest / $HOUR_SEC);
    $rest = $rest % $HOUR_SEC;

    $minutes = floor($rest / $MIN_SEC);
    $rest = $rest % $MIN_SEC;

    echo "Heute ist der " . date("d.m.Y - H:i:s") . "<br>";
    echo "Seit 01.01.1970 sind " . $timestamp . " Sekunden vergangen.<br>";
    echo "Dies sind " . $years . " Jahre, " . $weeks . " Wochen, " . $days . " Tage, " . 
            $hours . " Stunden, " . $minutes . " Minuten und " . $rest . " Sekunden."
?>
</body>
</html>