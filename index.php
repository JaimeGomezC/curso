
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h4><a href="index.php?controlador=Articulo&accion=index">ARTICULOS</a>   &nbsp;&nbsp;&nbsp;&nbsp; <a href="index.php?controlador=Categoria&accion=index">CATEGORIAS</a> </h4>
<h4></h4>

</body>
</html>
<?php
//Incluimos el FrontController que es el controlador de inicio de la aplicación
require 'libs/FrontController.php';

//Lo iniciamos con su método estático main.
FrontController::main();
?>

