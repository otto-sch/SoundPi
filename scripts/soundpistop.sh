#!/bin/bash

datestop=$(date)
printf "<p class="systemd"> $datestop : Datalogging stopped by shutdown or reboot system. </p>\n" >> /var/www/html/log/"radiolog-"`date +"%Y-%m-%d.txt"`
