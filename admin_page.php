<?php

include "includes/dbh.inc.php";

session_start();

$id = $_SESSION['id'];

if(!isset($id)){
    header('location:profile.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="./css/components.css">
</head>
<body>
   
    <?php
    include ('admin_header.php'); ?>


  <script src="js/script.js"></script>
</body>
</html>