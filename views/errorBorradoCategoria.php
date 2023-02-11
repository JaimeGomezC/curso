<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
</head>

<body>


	<form action="index.php">

		<input type="hidden" name="controlador" value="Categoria">
		<input type="hidden" name="accion" value="listar">

		
		<input type="hidden" name="codigo" value="<?php echo $categoria->getCatID(); ?>">

		<h2>ERROR NO SE PUEDE BORRAR LA SIGUIENTE CATEGORIA</h2>
        <h4>Categoria ID : <?php echo $categoria->getCatID(); ?></h4>
        <h4>Nombre Categoria : <?php echo $categoria->getCatNombre(); ?></h4>
        <h6>La categoria contiene articulos, primero debe borrar todos los articulos de esta categoria antes de poder eliminarla</h6>
        <h4></h4>

		<!--<label for="cat_nombre"></label>
		<input type="hidden" name="cat_nombre" value="<?php// echo $categoria->getCatNombre(); ?>">-->

		<input type="submit" name="submit" value="VOLVER AL LISTADO DE CATEGORIAS" >
	</form>
	</br>
    <form action="index.php">

		<input type="hidden" name="controlador" value="Articulo">
		<input type="hidden" name="accion" value="listar">
		<input type="submit" name="submit" value="MOSTRAR ARTICULOS">
	</form>
	</br>

</body>

</html>