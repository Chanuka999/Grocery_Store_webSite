<?php
if(isset($message)){
  foreach ($(message) as $message) {
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
        </div>
    </header>
</body>
</html>
