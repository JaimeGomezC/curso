<?php
session_start();
// Controlador para el modelo ItemModel (puede haber más controladores en la aplicación)
// Un controlador no tiene porque estar asociado a un objeto del modelo
class CategoriaController
{
    // Atributo con el motor de plantillas del microframework
    protected $view;

    // Constructor. Únicamente instancia un objeto View y lo asigna al atributo
    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }

    // Método del controlador para listar los items almacenados
    public function listar()
    {
        //Incluye el modelo que corresponde
        require 'models/CategoriaModel.php';

        //Creamos una instancia de nuestro "modelo"
        $categorias = new CategoriaModel();

        //Le pedimos al modelo todos los items
        $listado = $categorias->getAll();

        //Pasamos a la vista toda la información que se desea representar
        $data['categorias'] = $listado;

        // Finalmente presentamos nuestra plantilla 
        // Llamamos al método "show" de la clase View, que es el motor de plantillas
        // Genera la vista de respuesta a partir de la plantilla y de los datos
        $this->view->show("listarCategoria.php", $data);
    }


    public function index()
    {
        //Incluye el modelo que corresponde
        require_once 'models/CategoriaModel.php';

        //Creamos una instancia de nuestro "modelo"
        $categorias = new CategoriaModel();

        //Le pedimos al modelo todos los items
        $listado = $categorias->getAll();

        //Pasamos a la vista toda la información que se desea representar
        $data['categorias'] = $listado;

        //Finalmente presentamos nuestra plantilla
        $this->view->show("listarCategoria.php", $data);
    }

    // Método del controlador para crear un nuevo item

    public function nuevo()
    {
        require 'models/CategoriaModel.php';
        $categoria = new CategoriaModel();

        $errores = array();

        // Si recibe por GET o POST el objeto y lo guarda en la BG
        if (isset($_REQUEST['submit'])) {
            if (!isset($_REQUEST['cat_nombre']) || empty($_REQUEST['cat_nombre']))
            {
                $errores['cat_nombre'] = "* Nombre Categoria: Error!! Tiene que introducir un nombre valido";
            }
            
            $existe = $categoria->existe($_REQUEST['cat_nombre']);
            if($existe !=null)
            {
                $errores['cat_nombre'] = "* Nombre Categoria: Error!! La categoria introducida : " . $_REQUEST['cat_nombre'] . " ya existe";
            }

            if (empty($errores)) {

                $categoria->setCatNombre($_REQUEST['cat_nombre']);
                $categoria->save();

                // Finalmente llama al método listar para que devuelva vista con listado
                header("Location: index.php?controlador=categoria&accion=listar");
            }
        }

        // Si no recibe el item para añadir, devuelve la vista para añadir un nuevo item
        $this->view->show("nuevoCategoria.php", array('errores' => $errores));


    }


    // Método que procesa la petición para editar un item
    public function editar()
    {

        require 'models/CategoriaModel.php';
        $categoria = new CategoriaModel();

        // Recuperar el item con el código recibido
        $cat_nombre = $categoria->getById($_REQUEST['codigo']);

        if ($cat_nombre == null) {
            $this->view->show("errorView.php", array('error' => 'No existe codigo'));
        }

        $errores = array();

        // Si se ha pulsado el botón de actualizar
        if (isset($_REQUEST['submit'])) {

            if (!isset($_REQUEST['cat_nombre']) || empty($_REQUEST['cat_nombre']))
            {
                $errores['cat_nombre'] = "* Nombre Categoria: Error!! Tiene que introducir un nombre valido";
            }
            $existe = $categoria->existe($_REQUEST['cat_nombre']);
            if($existe !=null)
            {
                $errores['cat_nombre'] = "* Nombre Categoria: Error!! La categoria introducida : " . $_REQUEST['cat_nombre'] . " debe tener un nombre distinto al que tenía y no coincidir con otras categorías.";
            }

            if (empty($errores)) {
                // Cambia el valor del item y lo guarda en BD
                $cat_nombre->setCatNombre($_REQUEST['cat_nombre']);
                $cat_nombre->save();

                // Reenvía a la aplicación a la lista de items
                header("Location: index.php?controlador=categoria&accion=listar");
            }
        }

        // Si no se ha pulsado el botón de actualizar se carga la vista para editar el item
        $this->view->show("editarCategoria.php", array('categoria' => $cat_nombre, 'errores' => $errores));



    }

    // Método para borrar un item 
    public function borrar()
    {
        //Incluye el modelo que corresponde
        require_once 'models/CategoriaModel.php';

        require_once 'models/ArticuloModel.php';

        //Creamos una instancia de nuestro "modelo"
        $categoria = new CategoriaModel();

        // Recupera el item con el código recibido por GET o por POST
        $cat_nombre = $categoria->getById($_REQUEST['codigo']);

        if ($cat_nombre == null) {
            $this->view->show("errorView.php", array('error' => 'No existe codigo'));
        }

        //$errores = array();

        // Si se ha pulsado el botón de actualizar
        if (isset($_REQUEST['submit'])) {

            $articulos = new ArticuloModel();
            $cuantosArticulos = $articulos->categoriaVacia($_REQUEST['codigo']);

            if($cuantosArticulos == null)
            {
                
                // Si existe lo elimina de la base de datos y vuelve al inicio de la aplicación
                $cat_nombre->delete();

                // Reenvía a la aplicación a la lista de items
                header("Location: index.php?controlador=categoria&accion=listar");
            }
            else{
                //Pasamos por una sesion el codigo del elemento a borrar para mostrarle en la pantalla de error
                $_SESSION['codigo']=$_REQUEST['codigo'];
                //echo "No se puede borrar esta categoria";
            //$this->view->show("errorBorradoCategoria.php", array('categoria' => $cat_nombre));
            header("Location: index.php?controlador=categoria&accion=errorBorrar");

            }

        }

        // Si no se ha pulsado el botón de actualizar se carga la vista para editar el item
    $this->view->show("borrarCategoria.php", array('categoria' => $cat_nombre/*, 'errores' => $errores*/));


    }
    public function errorBorrar()
    {
        //Incluye el modelo que corresponde
        require_once 'models/CategoriaModel.php';

        //Creamos una instancia de nuestro "modelo"
        $categoria = new CategoriaModel();

        // Recupera el item con el código recibido por GET o por POST
        $cat_nombre = $categoria->getById($_SESSION['codigo']);
        $this->view->show("errorBorradoCategoria.php", array('categoria' => $cat_nombre));

    }

}
?>