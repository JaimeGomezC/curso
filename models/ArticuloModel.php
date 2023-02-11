<?php
class ArticuloModel
{
    protected $db;

    private $art_id;
    private $art_nombre;
    private $art_categoria;
    private $art_cantidad;

	public function __construct()
	{
		//Traemos la única instancia de PDO
		$this->db = SPDO::singleton();
	}
    //Getters y Setters
    public function getArtId()
    {
        return $this->art_id;
    }
    public function setArtId($art_id)
    {
        return $this->art_id = $art_id;
    }

    public function getArtNombre()
    {
        return $this->art_nombre;
    }
    public function setArtNombre($art_nombre)
    {
        return $this->art_nombre = $art_nombre;
    }

    public function getArtCategoria()
    {
        return $this->art_categoria;
    }
    public function setArtCategoria($art_categoria)
    {
        return $this->art_categoria = $art_categoria;
    }

    public function getArtCantidad()
    {
        return $this->art_cantidad;
    }
    public function setArtCantidad($art_cantidad)
    {
        return $this->art_cantidad = $art_cantidad;
    }


    public function getAllArticulos()
    {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT * FROM articulo');
        $consulta->execute();

        $resultado = $consulta->fetchAll(PDO::FETCH_CLASS, "ArticuloModel");

        //devolvemos la colección para que la vista la presente.
        return $resultado;
    }

    // Método que almacena en BD un objeto ArticuloModel
    // Si tiene ya código actualiza el registro y si no tiene lo inserta
    public function save()
    {
        if (!isset($this->art_id)) {
            //$consulta = $this->db->prepare('INSERT INTO categoria ( cat_nombre ) values ( ? )');
            $consulta = $this->db->prepare('INSERT INTO articulo (art_nombre, art_categoria, art_cantidad) values (?, ?, ?)');
            $consulta->bindParam(1, $this->art_nombre);
            $consulta->bindParam(2, $this->art_categoria);
            $consulta->bindParam(3, $this->art_cantidad);
            $consulta->execute();
        } else {
            $consulta = $this->db->prepare('UPDATE articulo SET art_nombre = ? , art_categoria = ? , art_cantidad = ? WHERE art_id =  ? ');
            $consulta->bindParam(1, $this->art_nombre);
            $consulta->bindParam(2, $this->art_categoria);
            $consulta->bindParam(3, $this->art_cantidad);
            $consulta->bindParam(4, $this->art_id);
            $consulta->execute();
        }
    }

    // Método que devuelve (si existe en BD) un objeto ItemModel con un código determinado
    public function getById($codigo)
    {
        $gsent = $this->db->prepare('SELECT * FROM articulo where art_id = ?');
        $gsent->bindParam(1, $codigo);
        $gsent->execute();

        $gsent->setFetchMode(PDO::FETCH_CLASS, "ArticuloModel");
        $resultado = $gsent->fetch();

        return $resultado;
    }

    public function categoriaVacia($codigo){
        $gsent = $this->db->prepare( 'SELECT * FROM articulo WHERE art_categoria = ?');
        $gsent->bindParam(1, $codigo);
        $gsent->execute();
        
        $gsent->setFetchMode(PDO::FETCH_CLASS, "ArticuloModel");
        $resultado = $gsent->fetch();

        return $resultado;
    }

    // Método que elimina el ItemModel de la BD
    public function delete()
    {
        $consulta = $this->db->prepare('DELETE FROM  articulo WHERE art_id =  ?');
        $consulta->bindParam(1, $this->art_id);
        $consulta->execute();
    }

    public function existe($nombre, $categoria)
    {
        $gsent = $this->db->prepare( 'SELECT * FROM articulo WHERE art_nombre = ? AND art_categoria = ?');
        $gsent->bindParam(1, $nombre);
        $gsent->bindParam(2, $categoria);

        $gsent->execute();
        
        $gsent->setFetchMode(PDO::FETCH_CLASS, "ArticuloModel");
        $resultado = $gsent->fetch();

        return $resultado;
    }


}




?>