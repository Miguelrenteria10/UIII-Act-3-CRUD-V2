<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD clientes FORM -->
      <div class="card card-body">
        <form action="saveclientes.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
          </div>
          <div class="form-group">
            <textarea name="apellido" rows="2" class="form-control" placeholder="apellido"></textarea>
          </div>
          <div class="form-group">
            <input type="text" name="direccion" class="form-control" placeholder="direccion" autofocus>
          </div>
          <div class="form-group">
            <textarea name="ciudad" rows="2" class="form-control" placeholder="ciudad"></textarea>
          </div>
          <div class="form-group">
            <input type="text" name="estado" class="form-control" placeholder="estado" autofocus>
          </div>
          <div class="form-group">
            <textarea name="cp" rows="2" class="form-control" placeholder="cp"></textarea>
          </div>
          <div class="form-group">
            <input type="text" name="correo" class="form-control" placeholder="Correo" autofocus>
          </div>
          
          <input type="submit" name="saveclientes" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id_cliente</th>
            <th>Nombre</th>
            <th>apellido</th>
            <th>Dirección</th>
            <th>ciudad</th>
            <th>estado</th>
            <th>cp</th>
            <th>Correo</th>
            
            
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM clientes";
          $result_clientess = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_clientess)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td><?php echo $row['ciudad']; ?></td>
            <td><?php echo $row['estado']; ?></td>
            <td><?php echo $row['cp']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="deleteclientes.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>