<?php

session_start();
include 'dbh.inc.php';
include 'validation.inc.php';

if(isset($_POST["login-btn"])){
   $email = $_POST["email"];
   $password = $_POST["password"];
   //$remember = $_POST["re-check"];

   if(emptyValid($email,$password)){
    header("location: ../login.php?err=emptyError");
   }
   else if(invalidEmail($email)){
    header("location: ../login.php?err=emptyError");
   }
   else if(invalidpassword($password)){
    header("location: ../login.php?err=emptyError");
   }
   else{
    userLogin($conn,$email,$password,/*$remember*/);
   }
}

function userLogin($conn,$email,$password,/*$remember*/){

    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";

    $stmt = mysqli_stmt_init($conn);

    $res = mysqli_stmt_prepare($stmt,$sql);

    if(!$res){
        header("location: ../login.php?err=stmtNotValid");
    }else{
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $row['id']; // Set the user ID in the session
            header('location:../profile.php');
        } else {
            echo "Invalid username or password";
        }
        

    }
}
?>