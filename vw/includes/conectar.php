<?php
session_start();
$nombreservidor = "localhost";
$usuarioservidor = "root";
$contraservidor = "";
$nombrebd = "viwaiter";
$nom = $_SESSION['nom'];
$tip = $_SESSION['tip'];
$foto = $_SESSION['foto'];
$escu = $_SESSION['escu'];

$con = new mysqli($nombreservidor, $usuarioservidor, $contraservidor, $nombrebd);
?>