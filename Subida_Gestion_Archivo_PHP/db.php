<?php

$conn = mysqli_connect("localhost", "root", "", "sistema_archivos");

if($conn){

    echo "Conectado a la base de datos" . "<br>";
}
else{
    echo "not connected" . mysqli_error($conn);
}