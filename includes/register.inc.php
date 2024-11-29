<?php
require_once "./dbh.inc.php";
require_once "./validation.inc.php";


if(isset($_POST["register"])){
    $name= $_POST["name"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    $cpassword= $_POST["cpassword"];
    $imageName = $_FILES["image"]["name"];
    $imageTmpName = $_FILES["image"]["tmp_name"];
    $imageSize = $_FILES["image"]["size"];
    $imageError = $_FILES["image"]["error"];
    $imageType= $_FILES["image"]["type"];


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
    }else if(invalidImage($imageName,$imageTmpName,$imageSize,$imageError,$imageType)){
      header("location: ../register.php?err=invalidImage");
    }
    else{
       userRegister($name,$email,$password,$cpassword,$imageName);
    }
}else{
   header("location: ../register.php");
}


function userRegister($name,$email,$password,$cpassword,$imageName){
  
global $conn;
   $hashpassword = password_hash($password, PASSWORD_DEFAULT);

   $sql = "INSERT INTO users (name,email,password,image) values(?,?,?,?);";

   $stmt = mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt,$sql)){
      header("location: ../register.php?err=failedstmt");
   }else{
     mysqli_stmt_bind_param($stmt, "ssss" , $name,$email,$password,$imageName );

     mysqli_stmt_execute($stmt);
     echo "successfully insert";
     header("location: ../login.php?signup=successfull");
   }
   


}

?>