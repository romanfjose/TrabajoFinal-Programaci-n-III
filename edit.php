<?php
include("db.php");
$title = '';
$description= '';
$Año= '';
$Budget= '';
$BoxOffice= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $description = $row['description'];
    $Año = $row['Año'];
    $Budget = $row['Budget'];
    $BoxOffice = $row['BoxOffice'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title= $_POST['title'];
  $description = $_POST['description'];
  $Año = $_POST['Año'];
  $Budget = $_POST['Budget'];
  $BoxOffice = $_POST['BoxOffice'];

  $query = "UPDATE task set title = '$title', description = '$description', Año = '$Año', Budget = '$Budget', BoxOffice = '$BoxOffice' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="title" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $description;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="Año" class="form-control" cols="30" rows="10"><?php echo $Año;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="Budget" class="form-control" cols="30" rows="10"><?php echo $Budget;?></textarea>
        </div>
        <div class="form-group">        
        <textarea name="BoxOffice" class="form-control" cols="30" rows="10"><?php echo $BoxOffice;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
