<?php  
  header("Content-Type: text/plain");

  $host = "localhost";
  $username = "djt35";
  $password = "nevira1pine";
  $database = "wordpress";
  $string_to_replace  = 'localhost:90/dashboard/gieqs/assets/wp';
  $new_string = 'https://www.gieqs.com/assets/wp';




  // Connect to database server
  $con=mysqli_connect($host, $username, $password);

  if(!$con)
{
echo "could not connect" ;
}
else
{
echo "connected";
}

  // Select database
  mysqli_select_db($database);

  // List all tables in database
  $sql = "SHOW TABLES FROM ".$database;
  $tables_result = mysql_query($sql);

  if (!$tables_result) {
    echo "Database error, could not list tables\nMySQL error: " . mysql_error();
    exit;
  }

  echo "In these fields '$string_to_replace' have been replaced with '$new_string'\n\n";
  while ($table = mysql_fetch_row($tables_result)) {
    echo "Table: {$table[0]}\n";
    $fields_result = mysql_query("SHOW COLUMNS FROM ".$table[0]);
    if (!$fields_result) {
      echo 'Could not run query: ' . mysql_error();
      exit;
    }
    if (mysql_num_rows($fields_result) > 0) {
      while ($field = mysql_fetch_assoc($fields_result)) {
        if (stripos($field['Type'], "VARCHAR") !== false || stripos($field['Type'], "TEXT") !== false) {
          echo "  ".$field['Field']."\n";
          $sql = "UPDATE ".$table[0]." SET ".$field['Field']." = replace(".$field['Field'].", '$string_to_replace', '$new_string')";
          mysql_query($sql);
        }
      }
      echo "\n";
    }
  }

  mysql_free_result($tables_result);  
?>