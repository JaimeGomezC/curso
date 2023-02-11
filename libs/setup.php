<?php
// Obtiene la instancia del objeto que guarda los datos de configuración
$config = Config::singleton();

// Carpetas para los Controladores, los Modelos y las Vistas
$config->set('controllersFolder', 'controllers/');
$config->set('modelsFolder', 'models/');
$config->set('viewsFolder', 'views/');

// Parámetros de conexión a la BD
$config->set('dbhost', 'containers-us-west-185.railway.app:6841');
$config->set('dbname', 'railway');
$config->set('dbuser', 'root');
$config->set('dbpass', '97C91tGD3IMb7pyrmyCs');
?>