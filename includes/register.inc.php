<?php
require_once "./dbh.inc.php";
require_once "./validation.inc.php";


if(isset($_POST["register"])){
    $name= $_POST["name"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    $cpassword= $_POST["cpassword"];
    $image= $_POST["image"];


    if(imptySet($name,$email,$password,$cpassword,$image)){
        header("location: ../register.php?err=emptyError");
    }
    else if(invalidname($name)){
       header("location: ../register.php?err=invalidName");
    }
    else if(invalidEmail($email)){
       header("location: ../register.php?err=invalidEmail");
    }
    else if(invalidpassword($password)){
       header("location: ../register.php?err=invalidpassword");
    }
    else if(matchpassword($password, $cpassword)){
       header("location: ../register.php?err=donotmatchpass");
    }
    else if(availblEmail($email)){
       header("location: ../register.php?err=availbleNameOrEmail");
    }
    else{
        echo "success";
    }
}


?>