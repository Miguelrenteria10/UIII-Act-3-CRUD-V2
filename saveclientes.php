<?php

include('db.php');

if (isset($_POST['saveclientes'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $direccion = $_POST['direccion'];
  $ciudad = $_POST['ciudad'];
  $estado = $_POST['estado'];
  $cp = $_POST['cp'];
  $correo = $_POST['correo'];

  $query = "INSERT INTO clientes(nombre, apellido, direccion, ciudad, estado, cp, correo) VALUES ('$nombre', '$apellido','$direccion', '$ciudad','$estado', '$cp','$correo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Guardado Correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>