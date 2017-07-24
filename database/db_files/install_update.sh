. ./geoworldmap.ini

curl -s http://geobytes.com/downloads/version.txt > geo_version.txt
geo_version=`grep Cities geo_version.txt |cut -d"\"" -f4`

old_version=`echo "select Version from Version where Component =\"Cities\" and Version=\"$geo_version\"" | mysql  --skip-column-names -u$databaseusername -p$databasepassword $databasename 2>/dev/null`
if [ "$geo_version" = "$old_version" ] ; then  
	echo no need for download
else
	echo going to download geoworldmap.zip!! 
	curl  http://geobytes.com/downloads/GeoWorldMap.zip > geoworldmap.zip
	./p7zip_9.04/bin/7za x -y geoworldmap.zip
	mysql --local-infile --skip-column-names -u$databaseusername -p$databasepassword $databasename < import_all.sql

fi 

