<?php

$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

session_start();

$_SESSION['usuario']=$usuario;

include('db.php');

$consulta="SELECT*FROM administrador WHERE correo='$usuario' AND contraseña='$contraseña'";

$rol="SELECT*FROM administrador WHERE Rol='super admin'";


$resultado=mysqli_query($conexion,$consulta);

//Super Usuario
if($usuario == 'sebas@gmail.com' && $contraseña == '1234567890')
{
    $filas=mysqli_num_rows($resultado);
    
    if($filas)
    {
        header("location:Admin/index.php");
    }
}

//Usuario menor
else if($usuario == 'hector@gmail.com' && $contraseña == '1234567890')
{
    $filas=mysqli_num_rows($resultado);
    
    if($filas)
    {
        header("location:Admin/indexEstadisticas.php");
    }
}

//Atencion al cliente
else if($usuario == 'luis@gmail.com' && $contraseña == '1234567890')
{
    $filas=mysqli_num_rows($resultado);
    
    if($filas)
    {
        header("location:Admin/indexAtencionCliente.php");
    }
}
else{
    ?>
    <?php
    include("index.php");
    ?>
    echo'<script type="text/javascript">
    alert("Usuario no valido");
    window.location.href="index.php";
    </script>';

    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);