<!doctype html>
<html lang="de">
<?php
  $target_dir = "../playlist/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $message = '';
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  }
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    $message = "Your file is too large.<br>";
    $uploadOk = 0;
  }
  // Allow only »txt« file format
  if($imageFileType != "txt" ) {
    $message = "Only »txt« files are allowed.<br>";
    $uploadOk = 0;
  }
  // Check if »$uploadOk« is set to 0 by an error
  if ($uploadOk == 0) {
    $message .= "Sorry, your file was not uploaded. &#128543;";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $message = "The stationlist ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      $message = "Ohhh dear, that didn't work :(";
    }
  }
?>
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
    <meta name="description" content="Pi Zero Webradio">
    <meta name="author" content="Otto">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="alternate icon" type="image/png" sizes="32x32"
        href="../favicon/favicon-32x32.png">
    <link rel="alternate icon" type="image/png" sizes="512x512"
        href="../favicon/android-chrome-512x512.png">
    <link rel="alternate icon" type="image/png" sizes="192x192"
        href="../favicon/android-chrome-192x192.png">
    <link rel="mask-icon" href="../favicon/safari-pinned-tab.svg" color="#000000">
    <link rel="icon" type="image/svg+xml" href="../favicon/favicon.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="../favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" type="text/css" media="all" href="../css/style.min.css">
    <title>Stationlist – #34SoundPi</title>
</head>
<body id="top">
    <div id="content-wrapper">
        <header>
            <div class="infobox">
              <div id="infobox">
                <h1 class="attention">Atenttion</h1>
                <p><?php echo $message ?></p>
              </div>
            </div>
        </header>
        <main>
            <div class="controller" >
                <div id="back">
                  <a class="button" href="../index.php">back</a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>