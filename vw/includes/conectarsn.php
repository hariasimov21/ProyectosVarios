<?php
session_start();
$nombreservidor = "localhost";
$usuarioservidor = "root";
$contraservidor = "";
$nombrebd = "viwaiter";
$con = new mysqli($nombreservidor, $usuarioservidor, $contraservidor, $nombrebd);
?>