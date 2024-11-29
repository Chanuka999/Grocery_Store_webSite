

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/components.css">
</head>
<body>
<?php
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


    <section class="form-container">
      <form action="./includes/register.inc.php" method="POST" enctype="multipart/form-data">
        <h1>Register</h1>
         <input type="text" name="name" class="box" placeholder="enter your name" required> 
         <br><br>
         <input type="text" name="email"  class="box" placeholder="enter your email" required> 
         <br><br>
         <input type="password" name="password"  class="box" placeholder="enter your password" required> 
         <br><br>
         <input type="password" name="cpassword"  class="box" placeholder="enter your confirm password" required> 
         <br><br>
         <input type="file" name="image" class="box">
         <br><br>
         <input type="submit" name="register" value="register now" class="btn" required>
         <p>All ready you have account?<a href="login.php">Login</a></p>
      </form> 
    </section>
</body>
</html>