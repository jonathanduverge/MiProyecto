<?php

include 'db.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login to my webpage</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <h2>Bienvenido a mi pagina web</h2>

    <p>
        <a href="registro.php">Registrar</a>
    </p>


    <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>

        <p>
            <a href="dashboard.php">Dashboard</a>
        </p>

        <p>
            <a href="logout.php">Logout</a>
        </p>

        <?php else: ?>

            <p>
            <a href="login.php">Login</a>
         </p>


    <?php endif; ?>

   
    
    
</body>
</html>