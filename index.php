<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
    <meta name="description" content="Pi Zero Webradio">
    <meta name="author" content="Otto">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <title>#34SoundPi</title>
</head>
<body id="top">
    <div id="content-wrapper">
        <header>
            <div class="infobox">
                <h1>What’s Up?</h1>
                <div id="load-title">
                    <p>loading ...</p>
                </div>
            </div>
        </header>
        <main>
            <div class="controller" >
                <h2>Radio Control</h2>
                <a class="button" href="php/play.php">Play</a><a class="button" href="php/stop.php">Stop</a><br>
                <span id="volume" >
                    <?php
                        $currentVolume = shell_exec('mpc volume');
                        $currentVolumeParts = explode(' ',$currentVolume,2);
                        echo 'Volume: ' . $currentVolumeParts[1];
                    ?>    
                </span><br>
                <a class="button" href="php/quieter.php">Quieter</a><a class="button" href="php/louder.php">Louder</a>
            </div>
            <div class="controller" >
                <h2>RPi Control</h2>
                <a class="button" href="php/reboot.php">Reboot</a> <a class="button" href="php/poweroff.php">Poweroff</a>
            </div>
            <div class="controller" >
                <h2>Stations</h2>
                <?php
                $stationlist = file_get_contents('playlist/stationlist.txt');
                $both = explode(';', $stationlist);
                $nStations = count($both) - 1;
                
                for ($i = 1; $i < $nStations; $i++) {
                    list($stationName[$i], $stationURL[$i]) = explode(',', $both[$i]);
                    $stationURL[$i] .= "\r\n";
                    file_put_contents('playlist/station.m3u', $stationURL);
                    echo '<a class="button" href="php/playstation.php?station=' . $i . '">' . $stationName[$i] . '</a>';
                }
                ?>
            </div>
            <div class="controller" >
                <h2>Download List</h2>
                <a class="button" href="playlist/stationlist.txt">Download Station List</a>
            </div>
            <div class="controller" >
                <h2>Choose & Add List</h2>
                <div>
                    <form action="php/upload.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="fileToUpload" id="fileToUpload" hidden>
                        <label for="fileToUpload">Choose List</label>
                        <input type="submit" value="Add Station List" id="submit" name="submit" hidden>
                        <label for="submit">Add List</label>
                    </form>
                </div>
            </div>
            <div class="controller" >
                <h2>Refresh List</h2>
                <a class="button" href="php/loadstation.php">Refresh Station List</a>
            </div>
            <div class="controller" >
                <h2>Radiolog</h2>
                <a class="button" href="log.php" target="_blank">Radiolog</a>
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
        function (){
            $('#load-title').load('php/title.php').fadeIn("slow");
        }, 2000); // refresh page every 2 seconds
    </script>
</body>
</html>