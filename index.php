<?php
# This function reads your DATABASE_URL configuration automatically set by Heroku
# the return value is a string that will work with pg_connect
function pg_connection_string() {
  // we will fill this out next
  return "dbname=da7knslcqsl8d2 host=ec2-54-83-5-43.compute-1.amazonaws.com port=5432 user=dvzajtrvwpucem password=rW5XArnUNGO_eBLauQ-ZscqqKC sslmode=require";
 
# Establish db connection
$db = pg_connect(pg_connection_string());
if (!$db) {
    echo "Database connection error."
    exit;
}

$result = pg_query($db, "SELECT * FROM locations");
?>
