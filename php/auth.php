<?php
$email = trim($_POST['email']);
$pass = trim($_POST['pass']);

require "connection.php";
session_start();

    $res = mysqli_query($conn, "select * from users1 where email='$email' and password='$pass' ");
    $row = mysqli_fetch_array($res);
    if (is_array($row)) {
        $_SESSION["name"] = $row['first_name'];
        $_SESSION["lastname"] = $row['last_name'];
        $_SESSION["role"] =  $row['id_role'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["pass"] = $row['password'];
    } else {
        echo "wrong";  
    }

    $conn->close();

header("Location: ../html/Table.php");
?>
