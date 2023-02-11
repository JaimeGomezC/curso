<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
</head>

<body>


	<form action="index.php">

		<input type="hidden" name="controlador" value="Articulo">
		<input type="hidden" name="accion" value="borrar">

		
		<input type="hidden" name="codigo" value="<?php echo $articulo->getArtID(); ?>">

		<h2>BORRAR ARTICULO</h2>
        <h4>ARTICULO ID : <?php echo $articulo->getArtID(); ?></h4>
        <h4>Nombre Articulo : <?php echo $articulo->getArtNombre(); ?></h4>
        <h4>Categoria Articulo : <?php echo $articulo->getArtCategoria(); ?></h4>
        <h4>Cantidad : <?php echo $articulo->getArtCantidad(); ?></h4>
        <h4>¿CONFIRMA QUE DESEA BORRAR ESTE ARTICULO?</h4>

		<input type="submit" name="submit" value="CONFIRMAR Y BORRAR ARTICULO" >
	</form>
	</br>
    <form action="index.php">

		<input type="hidden" name="controlador" value="Articulo">
		<input type="hidden" name="accion" value="listar">
		<input type="submit" name="submit" value="CANCELAR BORRADO">
	</form>
	</br>

</body>

</html>