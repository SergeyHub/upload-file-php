<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP File Upload</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="contact" id="contact">
    <div class="title">
        <h2 class="contact__titleText"><span>U</span>pload File</h2>
    </div>
    <div class="contactForm">
        <form method="POST" action="upload.php" enctype="multipart/form-data">
            <div class="inputBox">
                <input type="file" name="uploadedFile" />
            </div>
            <div class="inputBox">
                <input class="upload_file" type="submit" name="uploadBtn" value="Upload" />
            </div>
        </form>
    </div>
</section>

<?php
if (isset($_SESSION['message']) && $_SESSION['message']) {
    $message = $_SESSION['message'];
    $newFileName =$_SESSION['newFileName'];
    $logical_message = $_SESSION['logical_message'];
    //
    //.... read file. gets the contents of a file into a string ..
    //
    $filename = $_SESSION['filename'];
    $handle = fopen($filename, "r");
    $content = fread($handle, filesize($filename));
    fclose($filename);
    //
    //.........  output control message  .........................
    //
    $array = [$newFileName . '   '. $message];
    if ($logical_message){
        $array = [$newFileName . '   '. $message];
        foreach($array as $v) { ?>
            <div>
                <textarea class="successMessage"><?=$v;?> </textarea>
            </div>
        <?php }
    }else{
        $array = [$newFileName . '   '. $message];
        foreach($array as $v) { ?>
            <div>
                <textarea class="errorMessage"><?=$v;?> </textarea>
            </div>
        <?php }
    }
    //
    //........ output file content ...............................
    $array = [$content];
    if ($logical_message) {
        foreach ($array as $v) { ?>
            <div>
                <textarea class="outputBox"><?= $v; ?></textarea>
            </div>
        <?php }
    }
    //
    echo '<br>' . '<br>';
    unset($_SESSION['message']);
    unset($_SESSION['filename']);
}
?>

</body>
</html>
