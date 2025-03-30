<?php

//includes database connection
include 'db.php';
session_start();

//if(isset($_SESSION['logged_in'] && $_SESSION['logged_in'] === true)){
  //  header("location: admin.php");
   // exit;

//}

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    $sql = "SELECT * FROM usuarios WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1){
        $email = mysqli_fetch_assoc($result);
        
        if(password_verify($password, $email['password'])){

            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $email['email'];
            $_SESSION['rol'] = $email['rol'];
            header("location: dashboard.php");
            exit;

        }else{
            $error = "Invalid password";
        }
        

    } else {
        $error = "user not found";
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Login</h2>

<?php if($error): ?>

    <p style="color:red">
        <?php echo $error; ?>
    </p>

<?php endif; ?>
    
    
        <form method="POST" action="">
           
            <label for="email">Email:</label><br>
            <input  type="email" name="email" required><br><br>

            <label for="password">Password:</label><br>
            <input placeholder="Enter your password"  type="password" name="password" required><br><br>

            <input type="submit" value="login">
        </form>



</body>
</html>
<?php 
mysqli_close($conn);
?>