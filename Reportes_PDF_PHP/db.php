<?php

$conn = mysqli_connect("localhost", "root", "", "sistema_login");

if($conn){

    echo "Conectado a la base de datos" . "<br>";
}
else{
    echo "not connected" . mysqli_error($conn);
}