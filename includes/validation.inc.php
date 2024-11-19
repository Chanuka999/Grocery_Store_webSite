<?php
require_once "./dbh.inc.php";

function imptySet($name,$email,$password,$cpassword/*,$image*/){
    $value;
    if(empty($name) || empty($email) || empty($password) || empty($cpassword) /*|| empty($image)*/){
      $value=true;
    }else{
        $value=false;
    }
}

function emptyValid($email,$password){
    $value;
    if(empty($email) || empty($password)){
           $value=true;
    }else{
        $value=false;
    }
    return $value;
}

function invalidname($name){
    $value;
    if(!preg_match("/^[a-zA-Z]+$/", $name)){
         $value=true;
    }else{
        $value=false;
    }
}

function invalidEmail($email){
    $value;
    if(!preg_match("/^[a-zA-Z\d\._-]+@[a-zA-Z\d_-]+\.[a-zA-Z\d\.]{2,}$/", $email)){
        $value=true;
    }else{
        $value=false;
    }
}

function invalidpassword($password){
    $value;
    if(!preg_match("/^.{5,}$/", $password)){
           $value=true;
    }else{
        $value=false;
    }
}

function matchpassword($password, $cpassword){
    $value;
    if($password !== $cpassword){
       $value=true;
    }else{
        $value=false;
    }
}

function availblEmail($email){
    $value;
   global $conn;
    $sql = "SELECT * FROM users WHERE email = ?;";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../register.php?err=avaiableEmail");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$email);

        mysqli_stmt_execute($stmt);

        $data = mysqli_stmt_get_result($stmt);

        if(!mysqli_fetch_assoc($data)){
            $value=false;
        }else{
            $value=true;
        }
    }
    mysqli_stmt_close($stmt);

    return $value;

}
?>