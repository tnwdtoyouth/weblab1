<?php
//session_start();

if(isset($_GET['do'])) {
    if($_GET['do'] == 'logout'){
        session_destroy();
        header("Location: ../html/login1.html");
    }
}

?>
