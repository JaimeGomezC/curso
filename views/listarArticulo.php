<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
</head>

<body>
    <h2>LISTADO ARTICULOS</h2>
    <table>
        <tr>
            <th>ART ID
            </th>
            <th>ART NOMBRE
            </th>
            <th>ART CATEGORIA
            </th>
            <th>ART CANTIDAD
            </th>


        </tr>
        <?php
        foreach ($articulos as $articulo) {
        ?>
        <tr>
            <td><?php echo $articulo->getArtId() ?></td>
            <td><?php echo $articulo->getArtNombre() ?></td>
            <td><?php echo $articulo->getArtCategoria() ?></td>
            <td><?php echo $articulo->getArtCantidad() ?></td>
            <td><a href="index.php?controlador=Articulo&accion=editar&codigo=<?php echo $articulo->getArtId() ?>">Editar</a>
            </td>
            <td><a href="index.php?controlador=Articulo&accion=borrar&codigo=<?php echo $articulo->getArtId() ?>">Borrar</a>
            </td>

        </tr>
        <?php
        }
        ?>
    </table>
    <a href="index.php?controlador=Articulo&accion=nuevo">Nuevo</a>

    <!--<h4><a href="index.php?controlador=Categoria&accion=index">CATEGORIAS</a></h4>-->
</body>

</html>