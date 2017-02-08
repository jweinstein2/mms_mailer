<?php

// Adds X-Frame-Options to HTTP header, so that page can only be shown in an iframe of the same site.
header('X-Frame-Options: SAMEORIGIN'); // FF 3.6.9+ Chrome 4.1+ IE 8+ Safari 4+ Opera 10.5+

# This function reads your DATABASE_URL configuration automatically set by Heroku
# the return value is a string that will work with pg_connect
function pg_connection_string() {
  return "dbname=da7knslcqsl8d2 host=ec2-54-83-5-43.compute-1.amazonaws.com port=5432 user=dvzajtrvwpucem password=rW5XArnUNGO_eBLauQ-ZscqqKC sslmode=require";
}
 
# Establish db connection
$db = pg_connect(pg_connection_string());
if (!$db) {
    echo "Database connection error.";
    exit;
}
 
$result = pg_query($db, "SELECT * FROM locations");
if  (!$result) {
   echo "query did not execute";
  }
  if (pg_num_rows($result) == 0) {
   echo "0 records";
  }
  else {
    //echo json_encode($result);

    $myarray = array();
    while ($row = pg_fetch_assoc($result)) {
      $myarray[] = $row;
    }

    echo json_encode($myarray);
  }
?>
