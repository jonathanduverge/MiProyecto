<?php

//includes database connection
include 'db.php';

$error = "";

//receives data from the post method
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $rol = mysqli_real_escape_string($conn, $_POST['rol']);


    //checks that confirmation of password is correct
if($password !== $confirm_password){
    $error = "Password do not match";
} else{

    // checks if user already exist
    $sql = "SELECT * FROM usuarios WHERE nombre='$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1){

        $error = "user already exist, please try another";
        


    } else {

        //add hashing to the password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        //inserts data into database
        $sql = "INSERT INTO usuarios (nombre, email, password, rol) VALUES ('$username', '$email', '$passwordHash', '$rol')";

        //checks if data is inserted correctly
        if(mysqli_query($conn, $sql)){
          echo "Registro creado";
      }else {
          $error = "Algo salio mal" . mysqli_error($conn);

    }
}
}
}





//    if($result){
//        echo "<pre>";
//      var_dump($result);
//      echo "</pre>";
 










?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Registro de Usuario</h2>

<?php if($error): ?>

    <p style="color:red">
        <?php echo $error; ?>
    </p>

<?php endif; ?>
    
    
        <form method="POST" action="">
            <label for="username">Username:</label><br>
            <input type="name" name="username" required><br><br>

            <label for="email">Email:</label><br>
            <input  type="email" name="email" required><br><br>

            <label for="password">Password:</label><br>
            <input placeholder="Enter your password"  type="password" name="password" required><br><br>

            <label for="confirm_password">Confirm Password:</label><br>
            <input  placeholder="Confirm your password" type="password" name="confirm_password" required><br><br>

            <label for="rol">Agrega un rol:</label><br>
            <input  placeholder="Agrega el rol" type="rol" name="rol" required><br><br>

            <input type="submit" value="Register">
        </form>



</body>
</html>
<?php 
mysqli_close($conn);
?>