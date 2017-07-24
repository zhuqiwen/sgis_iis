#!/bin/bash

echo -e "\nThank you for choosing GeoWorldMap. This script builds the configuration file"
echo -e "geoworldmap.ini and then executes the maintenance script - install_update.sh "
echo -e "\nPlease note that the information you provide is stored in plain text and can"
echo -e "be changed later by editing geoworldmap.ini.  This installation script should"
echo -e "only be run from a secure directory, and definitely not from a web accessible "
echo -e "directory, as your MySql access credentials will be stored in clear text. It "
echo -e "is also recommended that you create a limited access user within your MySql "
echo -e "database, specifically for this purpose.\n"

echo -n "Please enter the MySql database name:"
read dbname

echo -n "Please enter the MySql database username:"
read dbusername

echo -n "Please enter the MySql database password:"
read dbpassword

echo "databaseusername="$dbusername >> geoworldmap.ini
echo "databasepassword="$dbpassword >> geoworldmap.ini
echo "databasename="$dbname >> geoworldmap.ini

crontab -l > cron.job 2>/dev/null
echo "0 0 * * 0 "`pwd`/install_update.sh >> cron.job
crontab cron.job 2>/dev/null

if [ "$?" = 0 ]
then echo "Cron added successfully"
else  echo "Can not access Crontab. Please create cronjob entry manually"
fi

./install_update.sh
