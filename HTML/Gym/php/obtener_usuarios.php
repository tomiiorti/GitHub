<?php
include 'php/conexion_be.php';

if (isset($_POST['searchTerm'])) {
  $searchTerm = $_POST['searchTerm'];
  $sql = "SELECT ID, Nombre FROM usuario WHERE Nombre LIKE '%$searchTerm%'";
  $result = $conexion->query($sql);
  $usuarios = array();

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $usuarios[] = $row;
    }
  }

  echo json_encode($usuarios);
}

$conexion->close();
?>
