<?php

require "user_validator.php";
require "db.php";

if(isset($_POST['submit'])){
    $validation=new UserVlaidator($_POST);
    $errors=$validation->validateForm();
    if(sizeof($errors)==0){
    global $db;

    $email=$_POST['email'];
    
    $username=$_POST['username'];
    
    $db->query("INSERT INTO users (email,username)
    VALUES ($email,$username)
    ");
    }
}

?>

<html>
<head>
    <title>Simple OOP Project</title>

</head>

<body>

<div class="new user">
    <h2>Create New User</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label>Username:</label>
    <input type="text" name="username" value="<?php  echo htmlspecialchars($_POST['username']); ?>">
    <div class="errors">
        <?php echo $errors['username'] ?? ''?>
    </div>
    <label>Email:</label>
    <input type="text" name="email">
    <div class="errors">
        <?php echo $errors['email'] ?? ''?>
    </div>
    <input type="submit" value="submit" name="submit">
    </form>  

</body>
</html>