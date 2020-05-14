<?php
session_start();
include "include/connection.php";
if(isset($_SESSION['use'])) //Checking whether the session is already there or not if
                            //true then header redireect it to the home page directly
{
 header("Location:admin/student_info.php");
}
if (isset($_POST["submit"])) {
  $uname=$_POST["username"];
  $pass=$_POST["pwd"];
    $res= mysqli_query($link,"select * from admin_block where Username='$_POST[username]' && Password='$_POST[pwd]'");
    while ($row=mysqli_fetch_array($res)) {
      $username=$row["Username"];
      $pwd=$row["Password"];
    }
    if($uname == $username && $pass == $pwd){
    $_SESSION['use']=$_POST["username"];

    echo '<script type="text/javascript">window.open("admin/student_info.php","_self");</script>'; /*on successful
    login redirects to home.php*/
    }
    else{
      echo '<script type="text/javascript">alert("Invalid username and password. please try again");</script>';
    }

   }


?>
<!DOCTYPE html>
<html>

<head>
    <title>OLMS-Login Form</title>
    <link href="https://fonts.googleapis.com/css?family=Bitter&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext'>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <div class="menu">
                <ul>
                    <li>
                        <a href="index.php">Back to home</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <section>
        <div class="bg">

        </div>
        <div class="left-bg">

        </div>
        <div class="right-bg">
            <img src="image/login.svg">
        </div>
        <div class="mid-content">
            <form method="POST">
                <div class="form">
                    <h2>Admin Login Form</h2><br>
                    <div class="inputbox">
                        <input type="text" name="username" placeholder="Enter Username" required><br>
                        <input type="password" name="pwd" placeholder="Enter Password"><br>
                        <button name="submit"> Login</button><br>
                        <font color="white">Forget Password </font><a href="forget.html"> click hear </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="foot">
            <font>© 2020 Online Library Management System | Designed by : Peeyush Itara , Gori Sharma</font>
        </div>
    </section>
</body>

</html>
