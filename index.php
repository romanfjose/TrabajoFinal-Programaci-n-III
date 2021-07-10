<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Title" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Description"></textarea>
          </div>
          
          <!-- Numero-->
          <div class="form-group">
            <textarea name="Año" rows="2" class="form-control" placeholder="Año"></textarea>
          </div>
          <div class="form-group">
            <textarea name="Budget" rows="2" class="form-control" placeholder="Budget"></textarea>
          </div>
          <div class="form-group">
            <textarea name="BoxOffice" rows="2" class="form-control" placeholder="BoxOffice"></textarea>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
          

        </form>

        <form method="GET" action="">
        <label for="">Ordenar Asc = 0 / Desc = 1</label>
        <input type="number" name="numero">
        <input type="submit" value="Enviar">
    </form>
    <a href="export.php" class="btn btn-success btn-block">Exportar Datos</a>
      </div>
      
      <form action="reset_task.php" method="POST">
         <input type="submit" name="reset_task" class="btn btn-success btn-block" value="Resetear Valores">
        </form>
      


       
 

            <form class="form-horizontal" action="" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
                <div class="input-row">
                    <label class="col-md-4 control-label">Choose CSV
                        File</label> <input type="file" name="file"
                        id="file" accept=".csv">
                    <button type="submit" id="submit" name="import"
                        class="btn-submit">Import</button>
                    <br />

                </div>

            </form>

            
            

           
           
    </div>

   
       
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Action</th>
            <th>Año</th>
            <th>Budget(M)</th>
            <th>BoxOffice</th>
          </tr>
        </thead>

    
        <tbody>
        
          <?php
          //logica orden
          

          $numero = $_GET['numero'] ?? "";
          
          if($numero == 0){
            $by = "asc";
          }else{
            $by = "desc";
          }
          
          
          //Mostrar Tabla
          
          $query = "SELECT * FROM task ORDER BY BoxOffice $by";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
              <td><?php echo $row['Año']; ?></td>
              <td><?php echo $row['Budget']; ?></td>
              <td><?php echo $row['BoxOffice']; ?></td>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>

