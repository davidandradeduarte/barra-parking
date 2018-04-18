<?php
    $db_connection = pg_connect("host=localhost dbname=myapp user=myapp password=dbpass");
    $result = pg_query($db_connection, "SELECT test_column FROM test_table");

    if (!$result) {
      echo "An error occurred.\n";
      exit;
    }
    
    while ($row = pg_fetch_row($result)) {
      echo "Quem e o maior? $row[0]";
      echo "<br />\n";
    }


