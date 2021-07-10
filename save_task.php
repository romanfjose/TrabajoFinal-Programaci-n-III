<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $Año = $_POST['Año'];
  $Budget = $_POST['Budget'];
  $BoxOffice = $_POST['BoxOffice'];
  $query = "INSERT INTO task(title, description, Año, Budget, BoxOffice) VALUES ('$title', '$description', '$Año', '$Budget', '$BoxOffice')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
