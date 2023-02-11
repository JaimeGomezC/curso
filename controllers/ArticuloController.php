<?php

class ArticuloController
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
            require 'models/ArticuloModel.php';

            //Creamos una instancia de nuestro "modelo"
            $articulos = new ArticuloModel();

            //Le pedimos al modelo todos los items
            $listado = $articulos->getAllArticulos();

            //Pasamos a la vista toda la información que se desea representar
            $data['articulos'] = $listado;

            // Finalmente presentamos nuestra plantilla 
            // Llamamos al método "show" de la clase View, que es el motor de plantillas
            // Genera la vista de respuesta a partir de la plantilla y de los datos
            $this->view->show("listarArticulo.php", $data);

        }

        public function index()
        {
            //Incluye el modelo que corresponde
            require_once 'models/ArticuloModel.php';
    
            //Creamos una instancia de nuestro "modelo"
            $articulos = new ArticuloModel();
    
            //Le pedimos al modelo todos los items
            $listado = $articulos->getAllArticulos();
    
            //Pasamos a la vista toda la información que se desea representar
            $data['articulos'] = $listado;
    
            //Finalmente presentamos nuestra plantilla
            $this->view->show("listarArticulo.php", $data);
        }

        public function nuevo()
        {
            require 'models/ArticuloModel.php';

            require 'models/CategoriaModel.php';

            $articulo = new ArticuloModel();
    
            $errores = array();

            $categorias = new CategoriaModel();
            $listado = $categorias->getAll();
            

    
            // Si recibe por GET o POST el objeto y lo guarda en la BG
            if (isset($_REQUEST['submit'])) {
                if (!isset($_REQUEST['art_nombre']) || empty($_REQUEST['art_nombre']))
                {
                    $errores['art_nombre'] = "* Nombre Articulo: Error!! Tiene que introducir un nombre valido";
                }
                if (!isset($_REQUEST['art_categoria']) || empty($_REQUEST['art_categoria']))
                {
                    $errores['art_categoria'] = "* Categoria: Error";
                }
                if (!isset($_REQUEST['art_cantidad']) || empty($_REQUEST['art_cantidad']) || !is_numeric($_REQUEST['art_cantidad']))
                {
                    $errores['art_cantidad'] = "* Cantidad: Error!! Tiene que introducir un entero";
                }

                $existe = $articulo->existe($_REQUEST['art_nombre'],$_REQUEST['art_categoria']);
                if($existe != null)
                {
                    $errores['duplicado']= "* Duplicado: Error!! El articulo ya existe en la categoria indicada elija otra categoria o especifique otro nombre";
                }
                
                if (empty($errores)) {
                    $articulo->setArtNombre($_REQUEST['art_nombre']);
                    $articulo->setArtCategoria($_REQUEST['art_categoria']);
                    $articulo->setArtCantidad($_REQUEST['art_cantidad']);
                    $articulo->save();
    
                    // Finalmente llama al método listar para que devuelva vista con listado
                    header("Location: index.php?controlador=articulo&accion=listar");
                }
            }
    
            // Si no recibe el item para añadir, devuelve la vista para añadir un nuevo item
            $this->view->show("nuevoArticulo.php", array('listado' => $listado, 'errores' => $errores) );

        }

    // Método que procesa la petición para editar un item
    public function editar()
    {

        require 'models/ArticuloModel.php';

        require 'models/CategoriaModel.php';

        $articulo = new ArticuloModel();

        $categorias = new CategoriaModel();
        $listado = $categorias->getAll();

        // Recuperar el item con el código recibido
        $art_nombre = $articulo->getById($_REQUEST['codigo']);

        if ($art_nombre == null) {
            $this->view->show("errorView.php", array('error' => 'No existe codigo'));
        }

        $errores = array();

            // Si recibe por GET o POST el objeto y lo guarda en la BG
            if (isset($_REQUEST['submit'])) {
                if (!isset($_REQUEST['art_nombre']) || empty($_REQUEST['art_nombre']))
                {
                    $errores['art_nombre'] = "* Nombre Articulo: Error!! Tiene que introducir un nombre valido";
                }
                if (!isset($_REQUEST['art_categoria']) || empty($_REQUEST['art_categoria']))
                {
                    $errores['art_categoria'] = "* Categoria: Error";
                }
                if (!isset($_REQUEST['art_cantidad']) || empty($_REQUEST['art_cantidad']) || !is_numeric($_REQUEST['art_cantidad']))
                {
                    $errores['art_cantidad'] = "* Cantidad: Error!! Tiene que introducir un entero";
                }
                $existe = $articulo->existe($_REQUEST['art_nombre'],$_REQUEST['art_categoria']);
                if($existe != null)
                {
                    $errores['duplicado']= "* Duplicado: Error!! El articulo ya existe en la categoria indicada elija otra categoria o especifique otro nombre, si no quiere modificar el articulo haga click en: CANCELAR EDICION";
                }
                
                if (empty($errores)) {
                    $articulo->setArtID($_REQUEST['codigo']);
                    $articulo->setArtNombre($_REQUEST['art_nombre']);
                    $articulo->setArtCategoria($_REQUEST['art_categoria']);
                    $articulo->setArtCantidad($_REQUEST['art_cantidad']);
                    $articulo->save();
    
                    // Finalmente llama al método listar para que devuelva vista con listado
                    header("Location: index.php?controlador=articulo&accion=listar");
                }
            }

        // Si no se ha pulsado el botón de actualizar se carga la vista para editar el item
        $this->view->show("editarArticulo.php", ['listado' => $listado, 'articulo' => $art_nombre, 'errores' => $errores]);



    }

        public function borrar()
        {
            require_once "models/ArticuloModel.php";

            $articulo = new ArticuloModel();

            $art_nombre = $articulo->getById($_REQUEST['codigo']);

            if ($art_nombre == null)
            {
                $this->view->show("errorView.php" , array('error' => 'No existe codigo'));
            }

            if(isset($_REQUEST['submit'])){
                $art_nombre->delete();

                header("Location: index.php?controlador=Articulo&accion=index");
            }

            $this->view->show("borrarArticulo.php", array('articulo' => $art_nombre));

        }







}

?>