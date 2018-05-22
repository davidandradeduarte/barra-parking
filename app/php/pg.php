<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $db_connection = pg_connect("host=localhost dbname=spatial_barra_parking user=root password=root");
    $result = pg_query($db_connection, "SELECT * FROM parking_places");

    if (!$result) {
      echo "An error occurred.\n";
      exit;
    }
    
    while ($row = pg_fetch_row($result)) {
      echo "Is the db working? $row[0]";
      echo "<br />\n";
    }

    $arr = pg_fetch_all($result);

    print_r($arr);


