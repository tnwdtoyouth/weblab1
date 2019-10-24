<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Info</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/noBluredLoginStyle.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/login1.css">
    <link rel="stylesheet" href="../css/menushka.css">
    <link rel="stylesheet" href="../css/ava.css">


</head>
<body>
<div class="header" height="200px">
            <div class="container">
            <div class="logo">
                <img src="../img/logo.png" height="80px">
            </div>
            
    <div class="mainmenu">
                                    <ul class="menu js_menu">
                                        <li class="active"><a href="Table.php">Table</a></li>
                                        <li><a href="homepage.php">Home</a></li>
                                        <?php
                                    session_start();
                                    if((isset($_SESSION["name"])) && !$_SESSION["name"]==NULL){
                                        echo " <li>";
                                        require "../php/logout.php";
                                        echo " <a href='Table.php?do=logout'>Logout</a></li>";     }
                                    
                                         ?>
                                    </ul>
                                
     </div>
     </div>

  
         </div>
    </div>
   
    
<div class="maincont">
    <div class="inner">
        <div class="m-4 text-center">
            <?php
            $id = $_POST['id'];
            require "../php/connection.php";
            $sql = "SELECT id, email, first_name, last_name, images FROM users1 where id='$id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo "
             <p class='display-3 userInfo'>" . $row["first_name"] . " " . $row["last_name"] . "</p><br>
             <div class='text-center'>
                    <form class='tex'>
                        <div class='ava'>
                              <img class='size-5 md-avatar img-thumbnail '  src='../uploaded/$row[images]'  />
                        </div>
                        <div class=' display-4 userInfo col'>
                               <p >" . $row["email"] . "</p><br>
                        </div>

                    </form>
            </div>

        </div>
    </div>
</div>";
?>


</body>
</html>








