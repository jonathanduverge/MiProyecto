<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi pagina Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .titulo{
            color: white;

        }
        body { font-family: Arial, sans-serif; background-color: aquamarine;}
    
        .hero { background: url('https://via.placeholder.com/1500x500') no-repeat center center; 
        background-size: cover; padding: 100px 0; color: white; text-align: center; }
        header{
            display: flex;
            justify-content: space-between;
            background-color: black;
            align-items: center;
            padding: 20px;
        }
        .logo{
            display: flex;
            align-items: center;
            
        }
        .logo img{
            height: 75px;
            align-items: center;
            margin: left:10px;;
        }
        .nav{
            display: flex;
            align-items: center;
           
        }

        #ship {
            width: 50px;
            height: 50px;
            position: relative;
            animation-name: square;
            animation-duration: 5s;
            animation-iteration-count: 1;


        }
        #revealText{
            font-size: 2em;
            animation-name: reveal;
            animation-duration: 5s;

        }

        @keyframes reveal{
    0%{transform: scale(0);}
    100%{transform: scale(100%);}


}
        @keyframes square{ 
           0% {left: 0px; top:0px; opacity:1; transform: rotate(0deg);}
            25% {left: 200px; top:0px; opacity:5; transform: rotate(20deg);}
           50% {left: 200px; top:0px; opacity:1; transform: rotate(0deg);}
            75% {left: 0px; top:0px; opacity:1; transform: rotate(20deg);}
            100% {left: 0px; top:0px; opacity:1; transform: rotate(0deg);}

        }



    </style>
</head>

<body>
    <header>
            
        <div class="logo">
            <img src="img/utesa.jpg" alt="Logo de Utesa">
            </div>
            <h2 class="titulo"><?php
            
            if ($_SESSION["rol"] == "admin") {
                echo "<p>Eres un administrador. Aquí puedes gestionar usuarios.</p>";
            } else {
                echo "<p>Eres un usuario normal. Puedes ver tu perfil.</p>";
            }

            ?></h2>

            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link text-white" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="logout.php">Logout</a></li>
                </ul>
            </nav>
        
    </header><br>


    <h2 id="revealText">Bienvenidos</h2>
            <div id="ship"><img src="img/ship.jpg"></div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>      
    
    <section id="contenido" class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Contenido</h1>
                <p>Esta en una pagina web de prueba para la clase de pagina web II</p>
            </div>
            
            <div class="col-md-6">
                <h2>Informacion acerca de esta pagina</h2>
                <p>
                    Esta pagina web fue creada con php,
                     siguiendo las instrucciones de autenticacion de usuario con PHP y Mysql
                </p>
            </div>
        </div>
    </section>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
