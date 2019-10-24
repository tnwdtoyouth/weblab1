<?php
$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$email = trim($_POST['email']);
$pass = trim($_POST['pass']);

if (mb_strlen($pass) < 3 || mb_strlen($pass) > 20) {
    alert("password must be more than 2 symb and less than 20");
    
    header("Location: ../html/registration.html");
    exit();
    
}

function alert($msg)
{
    echo
    "<script type='text/javascript'>
        alert('$msg');
    </script>";
}

$selectOption = trim($_POST['taskOption']);   

    require "connection.php";
    $conn->query("INSERT INTO users1 (email, first_name, last_name, password, id_role) VALUES ('$email', '$firstname', '$lastname', '$pass', '$selectOption')");
    $conn->close();

    header("Location: ../html/login1.html");


?>
