<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM clientes WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $direccion = $row['direccion'];
    $ciudad = $row['ciudad'];
    $estado = $row['estado'];
    $cp = $row['cp'];
    $correo = $row['correo'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $direccion= $_POST['direccion'];
  $ciudad = $_POST['ciudad'];
  $estado= $_POST['estado'];
  $cp = $_POST['cp'];
  $correo= $_POST['correo'];
 

  $query = "UPDATE clientes set nombre = '$nombre', apellido = '$apellido',direccion = '$direccion', ciudad = '$ciudad',estado = '$estado', cp = '$cp', correo = '$correo' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado con Exito';
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
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <textarea name="apellido" class="form-control" cols="30" rows="10"><?php echo $apellido;?></textarea>
        </div>
        <div class="form-group">
          <input name="direccion" type="text" class="form-control" value="<?php echo $direccion; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <textarea name="ciudad" class="form-control" cols="30" rows="10"><?php echo $ciudad;?></textarea>
        </div>
        <div class="form-group">
          <input name="estado" type="text" class="form-control" value="<?php echo $estado; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <textarea name="cp" class="form-control" cols="30" rows="10"><?php echo $cp;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="correo" class="form-control" cols="30" rows="10"><?php echo $correo;?></textarea>
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