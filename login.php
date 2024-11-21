<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="css/components.css">
</head>
<body>
  
    
    <div class="forms">
        <form action="./includes/login.inc.php" method="POST" class="login">
          <h2>Login</h2>
          <input type="text" name="email" placeholder="Enter your email..">
          <input type="text" name="password" placeholder="Enter your password..">
          <div class="rem">
          <input type="checkbox" name="re-check" id="re-check">
          <label for="re-check">Remember Me</label>
          </div>
          <button type="submit" name="login-btn">Login</button>
          <p>Do not you have account?<a href="register.php">register</a></p>
        </form>
    </div>
</body>
</html>