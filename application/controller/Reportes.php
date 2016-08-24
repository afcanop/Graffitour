<?php

class Reportes extends Controller {

    private $mdlUser = null;


    function __construct() {
        $this->mdlUser = $this->loadModel("MldUsuario");
    }

    public function index() {

        if (isset($_SESSION["nombre"])) {
            require APP . 'view/_templates/Adm/HeaderAdm.php';
            require APP . 'view/contenido/reportes/reportes.php';
            require APP . 'view/_templates/Adm/footerAdm.php';
        } else {

            require APP . 'view/_templates/Login/HeaderAdmLogin.php';
            require APP . 'view/contenido/ContenidoAdmLogin.php';
            require APP . 'view/_templates/Login/footerAdmLogin.php';
        }
    }

}
