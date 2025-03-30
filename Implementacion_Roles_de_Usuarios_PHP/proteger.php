<?php
session_start();
if (!isset($_SESSION["email"]) || $_SESSION["rol"] != 'admin') {
    header("Location: index.php");
    exit();
}
?>