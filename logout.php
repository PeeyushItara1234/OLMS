<?php
session_start();
echo "Logout Successfully";

session_destroy(); //function that distroys session
header("Location: login.php");
?>
