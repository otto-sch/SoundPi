#!/bin/bash

spotify="Spotify Connect"
spotifynothing=""
oldcurrent="nix"
nothing=""
datestart=$(date)
sleep 5
mpc play
sleep 1
mpc volume 15

printf "<p class="systemd"> $datestart : Datalogging begins now. </p>\n" >> /var/www/html/log/"radiolog-"`date +"%Y-%m-%d.txt"`

while true
do
    current=$(mpc --format [%title%] | head -n 1)
    currentmpc=$(mpc current)
    song=$(mpc --format [%title%] | head -n 1)
    station=$(mpc --format [%name%] | head -n 1)
    datenow=$(date)

    if [ "$current" != "$oldcurrent" ] && [ "$currentmpc" != "$nothing" ]
    then
    printf "<p> $datenow : $station : $song </p>\n" >> /var/www/html/log/"radiolog-"`date +"%Y-%m-%d.txt"`
        spotifynothing=""
        else
        if [ "$currentmpc" = "$spotifynothing" ]
        then
            printf "<p> $datenow : $spotify </p>\n" >> /var/www/html/log/"radiolog-"`date +"%Y-%m-%d.txt"`
            spotifynothing="boom"
        fi
        fi
        oldcurrent="$current"
        sleep 10
done
