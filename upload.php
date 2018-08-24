<!DOCTYPE html>
<html>
<body>
<?php 
    include('menu.php');
    if (!isset($_POST['submit'])) {
        $dest = 'uploads/';
        $destFile = $dest . basename($_FILES['UploadFile']['name']);
        $error = 0;
        $errorMsg = '';
        $imageSize = getimagesize($_FILES['UploadFile']['tmp_name']);
        if ($imageSize === false) { 
            $error = 1;
            $errorMsg = 'Invalid Imagesize.';
        }
        $suffix = pathinfo($destFile, PATHINFO_EXTENSION);
        if ($suffix != 'jpg' && $suffix != 'jpeg' && $suffix != 'png' && $suffix != 'bmp') {
            $error = 1;
            $errorMsg = 'Unsupported filetype.';
        }
        if (file_exists($destFile)) {
            $error = 1;
            $errorMsg = 'File already exists.';
        }
        if ($_FILES['UploadFile']['size'] > 2097152) {
            $error = 1;
            $errorMsg = 'Invalid filesize.';
        }

        if ($error == 0) {
            if (move_uploaded_file($_FILES['UploadFile']['tmp_name'], $destFile)) {
                echo '<br>File uploaded.';
            } else {
                echo '<br>Upload failed.';
            }
        } else {
            echo '<br>Upload failed with error: ' . $errorMsg;
        }
    }
?>
</body>
</html>