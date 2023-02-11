<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
</head>

<body>


	<form action="index.php">

		<input type="hidden" name="controlador" value="Categoria">
		<input type="hidden" name="accion" value="editar">

		
		<input type="hidden" name="codigo" value="<?php echo $categoria->getCatID(); ?>">
		<!--</br>-->
		<h2>EDITAMOS CATEGORIA</h2>
        <h4>Categoria ID : <?php echo $categoria->getCatID(); ?></h4>

		<?php echo isset($errores["cat_nombre"]) ? "*" : "" ?>
		<label for="cat_nombre">Nombre Categoria:</label>
		<input type="text" name="cat_nombre" value="<?php echo $categoria->getCatNombre(); ?>">
		</br>

		<input type="submit" name="submit" value="Aceptar" onclick="return confirm('¿Quiere confirmar los cambios?')">
	</form>
	</br>

	<form action="index.php">

	<input type="hidden" name="controlador" value="Categoria">
	<input type="hidden" name="accion" value="listar">
	<input type="submit" name="submit" value="CANCELAR EDICION">
	</form>
	</br>

	<?php
    if (isset($errores)):
	    foreach ($errores as $key => $error):
		    echo $error . "</br>";
	    endforeach;
    endif;
    ?>

</body>

</html>