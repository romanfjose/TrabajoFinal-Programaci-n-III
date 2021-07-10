<?php

include("db.php");



  $query = "DROP TABLE task";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Table removed';
  $_SESSION['message_type'] = 'error :(';
  header('Location: index.php');

  $query = "CREATE TABLE task(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  Año INT,
  Budget INT,
  BoxOffice INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  )";

  
$result = mysqli_query($conn, $query);


$file = "C:/xampp/htdocs/info.csv";

	// Name of table
	$table = "task";

	// Load CSV file into a table named and ignore the first line in file
	$query = <<<eof
                LOAD DATA INFILE '$file'
                INTO TABLE $table
                FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
                LINES TERMINATED BY '\n'
                IGNORE 1 LINES
                (title, description,Año,Budget,BoxOffice)
                eof;

	// Perform a query on the connected database
    $result = mysqli_query($conn, $query);
    header('Location: index.php');
	
?>
