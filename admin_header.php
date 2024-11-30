<?php
include "includes/dbh.inc.php";
if(isset($message)){
  foreach ($message as $message) {
    echo '
    <div class="message">
    <span>'.$message.'</div>
    <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
    </div>
    ';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <header class="header">
        <div class="flex">
            <a href="admin_page.php" class="logo">Admin<span>panel</span></a>
            <nav class="navbar">
                <a href="admin_page.php">Home</a>
                <a href="admin_products.php">products</a>
                <a href="admin_orders.php">orders</a>
                <a href="admin_users.php">users</a>
                <a href="admin_contacts.php">contacts</a>
            </nav>
            <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
            </div>
           
            <div class="profile">
                <?php
               $sql = "SELECT * FROM users WHERE id= ?;";

               $stmt = mysqli_stmt_init($conn);
               
               $res = mysqli_stmt_prepare($stmt,$sql);

               if(!$res){
                echo "stmt failed";
               }else{
                 mysqli_stmt_bind_param($stmt, 'i',$id);
                
                  mysqli_stmt_execute($stmt);

                  $res = mysqli_stmt_get_result($stmt);

                  $row = mysqli_num_rows($res);
                 
                  if($row>0){
                    if(!empty($row['image'])){
                        echo ' <img src="uploads/' . htmlspecialchars($row['image']).'" alt="image">';  
                     
                    }else{
                        echo '<img src="uploads/default.jpg" alt="Default User Image">'; 
                    }
                    echo '<p>' . htmlspecialchars($row['name']) . '</p>';
                  }else{
                    echo '<img src="uploads/default.jpg" alt="Default User Image">'; 
                  }
                  mysqli_stmt_close($stmt);
               }
                ?>
              
               <a href="admin_update_profile.php" class="btn">Update</a>
               <a href="logout.php" class="delete-btn">logout</a>
               <div class="flex-btn">
                 <a href="login.php" class="option-btn">Login</a>
                 <a href="register.php" class="option-btn">register</a>
               </div>
            </div>
        </div>
    </header>
</body>
</html>
