<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
</head>

<body>


	<form action="index.php">

		<input type="hidden" name="controlador" value="Categoria">
		<input type="hidden" name="accion" value="borrar">

		
		<input type="hidden" name="codigo" value="<?php echo $categoria->getCatID(); ?>">

		<h2>BORRAR CATEGORIA</h2>
        <h4>Categoria ID : <?php echo $categoria->getCatID(); ?></h4>
        <h4>Nombre Categoria : <?php echo $categoria->getCatNombre(); ?></h4>
        <h4>¿CONFIRMA QUE DESEA BORRAR ESTA CATEGORIA?</h4>

		<!--<label for="cat_nombre"></label>
		<input type="hidden" name="cat_nombre" value="<?php// echo $categoria->getCatNombre(); ?>">-->

		<input type="submit" name="submit" value="CONFIRMAR Y BORRAR CATEGORIA" >
	</form>
	</br>
    <form action="index.php">

		<input type="hidden" name="controlador" value="Categoria">
		<input type="hidden" name="accion" value="listar">
		<input type="submit" name="submit" value="CANCELAR BORRADO">
	</form>
	</br>

</body>

</html>