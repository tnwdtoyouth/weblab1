<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyPage</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/mypage.css">
    <link href="../css/login1.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/menushka.css">

</head>
<body>
<div class="header">
            <div class="container">
            <div class="logo">
                <img src="../img/logo.png" height="80px">
            </div>
            <div class="mainmenu"> 
           
<ul class="menu js_menu">
                <li>
                    <a class=" text-light nav-link" href="homepage.php">Home</a>
                </li>
                <li>
                    <a class="nav-link text-light" href="Table.php">Users Table</a>
                </li>
                <li >
                    <a class="nav-link text-light" href="MyPage.php">My page</a>
                </li>
    
            </ul>
</div>
         </div>


</div>


<div class="maincont">
<div class="logEnt text-center">
<form action="../php/upload.php" method="post" enctype="multipart/form-data">
    Select image:
    <input type="file" class="filestyle" data-classButton="btn btn-dark " data-input="false" data-classIcon="icon-plus" data-buttonText="SelectImage" name="fileToUpload" id="fileToUpload" >
    <div class="text-center">
    <input type="submit" value="Upload Image" name="submit">
</div>
</form>
</div>
            <?php
            session_start();
            $email = $_SESSION["email"];
            $pass = $_SESSION['pass'];

            require "../php/connection.php";
            $sql = "SELECT images FROM users1 where email='$email' and password='$pass' ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo"<div class='ava'/>";
            echo "<img class='size-5 md-avatar img-thumbnail' src='../uploaded/$row[images]'  />";
            echo " </div>"
            ?>
       </div>

</body>
</html>