<!doctype html>
<html lang="de">
<head>
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
    <meta name="description" content="Pi Zero Webradio">
    <meta name="author" content="Otto">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="alternate icon" type="image/png" sizes="32x32"
        href="favicon/favicon-32x32.png">
    <link rel="alternate icon" type="image/png" sizes="512x512"
        href="favicon/android-chrome-512x512.png">
    <link rel="alternate icon" type="image/png" sizes="192x192"
        href="favicon/android-chrome-192x192.png">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#000000">
    <link rel="icon" type="image/svg+xml" href="favicon/favicon.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" type="text/css" media="all" href="css/style.min.css">

    <!-- title-->
    <title>Radiolog – #34SoundPi</title>
</head>
<body id="top">
    <div id="content-wrapper">
        <header>
            <div class="infobox logwidth">
                <h1>What’s Up?</h1>
                <div id="load-title">
                    <p>loading ...</p>
                </div>
            </div>
        </header>
        <main>
            <div class="controller logwidth" >
                <h1>Radiolog:</h1>
                <div id="radiolog"></div>
                <div id="back">
                    <a class="button" href="index.php">back</a>
                </div>
            </div>
        </main>
    </div>
    <script src="js/jquery.min.js?v371" ></script>
    <!--     
    https://stackoverflow.com/questions/3121285/auto-load-and-refresh-div-every-10-seconds-with-jquery
    https://aiocollective.com/blog/refresh-content-automatically-after-some-period-time-jquery/ 
    -->
   <script>
        var autoLoad = setInterval(
        function ()
        {
           $('#radiolog').load('php/radiolog.php').fadeIn("slow");
           $('#load-title').load('php/title.php').fadeIn("slow");
        }, 2000); // refresh page every 2 seconds
    </script>
</body>
</html>
