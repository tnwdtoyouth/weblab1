
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Table</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/login1.css">  
    <link rel="stylesheet" href="../css/menushka.css">
    
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


<div class="container mt-4">
<?php
//session_start();
if(isset($_SESSION["name"]) && !$_SESSION["name"]==NULL){
    
    echo "<h1><p class='display-4 loginText1 text-center'>OPEN YOUR PAGE      ";
    echo "<a href='MyPage.php'><b>$_SESSION[name]</b></a></p></h1>";
}else{
    echo"<script language='javascript'>

    alert('Something Wrong. Authorization Fail');
    </script>
    ";
    echo "<h1 class='loginText1 text-center' >";
    echo "<a href='login1.html' >SIGN IN        </a>";
    $_SESSION["role"]=1; //make as a user
    echo "<a href='registration.html' >SIGN UP</a></h1>";
}
?>
</div>

<table class="table table-striped table-dark">
    <thead>
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    <?php
//    session_start();
    require "../php/connection.php";
    $sql = "SELECT id, email, first_name, last_name FROM users1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
     $role=$_SESSION["role"];


        switch ($role) {
            case 1: //user
                while ($row = $result->fetch_assoc()) {
                    $id=$row["id"];
                    echo "<tr><form action='infoabout.php' method='post'>
                    <td>" . $id . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["first_name"] . " " . $row["last_name"] . "</td>
                   <td>" . '<button type="submit" name="id" class="btn btn-outline-light" value='.$id. ';>info</button>' . "</td>
                  </form></tr>";
                }
                break;
            case 2: //admin
                while ($row = $result->fetch_assoc()) {
                    $id2=$row["id"];
                    echo "<tr><form action='../php/deleteuser.php' method='post'>
                    <td>" . $id2 . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["first_name"] . " " . $row["last_name"] . "</td>
                   <td>" . '<button type="submit" name="idd" class="btn btn-outline-light" value='.$id2. '>delete</button>' . "</td>
                  </tr>";
                }
                break;

        }

    }
    ?>
</div>
    </tbody>
</table>

</body>
</html>