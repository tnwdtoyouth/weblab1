<?php
$id = $_POST['idd'];
//  echo "id to delete = ". $id;
require "connection.php";
$sql = "DELETE FROM users1 where id='$id' ";
$result = $conn->query($sql);
$conn->close();
header("Location: ../html/Table.php");

?>


