<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
</head>

<body>
<h2>LISTADO CATEGORIAS</h2>
    <table>
        <tr>
            <th>CAT ID
            </th>
            <th>CAT NOMBRE
            </th>
        </tr>
        <?php
        foreach ($categorias as $categoria) {
        ?>
        <tr>
            <td><?php echo $categoria->getCatID() ?></td>
            <td><?php echo $categoria->getCatNombre() ?></td>
            <td><a href="index.php?controlador=Categoria&accion=editar&codigo=<?php echo $categoria->getCatID() ?>">Editar</a>
            </td>
            <td><a href="index.php?controlador=Categoria&accion=borrar&codigo=<?php echo $categoria->getCatID() ?>">Borrar</a>
            </td>

        </tr>
        <?php
        }
        ?>
    </table>
    <a href="index.php?controlador=Categoria&accion=nuevo">Nuevo</a>

    <!--<h4><a href="index.php?controlador=Articulo&accion=index">ARTICULOS</a></h4>-->
</body>

</html>