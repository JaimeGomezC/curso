<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
</head>

<body>


<form action="index.php">

<input type="hidden" name="controlador" value="Articulo">
<input type="hidden" name="accion" value="nuevo">

<!--<label for="codigo">Codigo</label>
<input type="text" name="codigo">
</br>-->
<H3>NUEVO ARTICULO</h3>
<?php echo isset($errores["art_nombre"]) ? "*" : "" ?>
<label for="art_nombre">Nombre Articulo</label>
<input type="text" name="art_nombre">
</br>

<!--<label for="art_categoria">Categoria del Articulo</label>
<input type="text" name="art_categoria">
</br>
-->
<label for="art_categoria">Categoria del Articulo</label>
<select name="art_categoria">
	<?php
	foreach ($listado as $opcion)
	{
		$cat_nombre = $opcion->getCatNombre();
		$cat_id = $opcion->getCatID();
		echo "<option value=$cat_id>$cat_nombre</option>";
	}
		
	?>

</select>
</br>


<?php echo isset($errores["art_cantidad"]) ? "*" : "" ?>
<label for="art_cantidad">Cantidad</label>
<input type="text" name="art_cantidad">
</br>

<input type="submit" name="submit" value="AÑADIR">
</form>
	</br>

<form action="index.php">

<input type="hidden" name="controlador" value="Articulo">
<input type="hidden" name="accion" value="listar">
<input type="submit" name="submit" value="Cancelar nuevo articulo">
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