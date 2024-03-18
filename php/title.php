<?php         
    sleep(1);
    $status = shell_exec('mpc current');
    $song = shell_exec('mpc --format [%title%] | head -n 1');
    $song = htmlentities($song, ENT_QUOTES, 'UTF-8'); 
    $station = shell_exec('mpc --format "[%name%]" | head -n 1');
    $station = htmlentities($station, ENT_QUOTES, 'UTF-8');
    $nSong = strlen($song);
    $nStation = strlen($station);
    $one = 1;
    if ($nStation <= $one){
        $station = 'No Station Info &#128533;';
    }
    if ($nSong <= $one){
        $song = 'No Song Info &#128533;';
    }
    if ($status == ''){
        echo '<p id="spotify">The Webradio is now off and</p><p>»Spotify Connect« ready to use!</p>';
    } else {
        echo '<p id="station">' . $station . '</p><p id="song">' . $song . ' </p>';
    }  
?>