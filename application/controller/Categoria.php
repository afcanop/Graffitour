<?php

class Categoria extends Controller {

    private $MldCategoria = null;


    function __construct() {
        $this->MldCategoria = $this->loadModel("MldCategoria");
       //var_dump($this->MldCategoria->Listar());
        //$this->ListarTodo();
        //exit();
    }

    public function INDEX() {
      if (isset($_SESSION["nombre"]) ) {

        require APP . 'view/_templates/Adm/HeaderAdm.php';
        require APP . 'view/contenido/Categoria/Registrar.php';
        require APP . 'view/_templates/Adm/footerAdm.php';

    }else{

        require APP . 'view/_templates/Login/HeaderAdmLogin.php';
        require APP . 'view/contenido/ContenidoAdmLogin.php';
        require APP . 'view/_templates/Login/footerAdmLogin.php';
    }
}

public function Guardar() {

    if (isset($_POST)) {


       $this->MldCategoria->__SET("NombreCategoria", $_POST["txtNombreCategoria"]);

       try {

        if ($this->MldCategoria->registrar()) {

           echo json_encode(["v" => 1]);
       } else {
        echo json_encode(["v" => 0]);
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}
}
}

public function Listar()
{
      $elementos = [];
        foreach ($this->MldCategoria->ListarNombre() as $value) {

           $elementos[] = [
            'id' => $value->IdCategoria,
            'text' => $value->NombreCategoria,
           ];
        }
      echo json_encode($elementos);
}

public function ListarTodo()
{
  $datos = ["data"=>[]];
  $EstadosPosibles = array('Activo' => 1, 'Inactivo'=>0 );
  foreach ($this->MldCategoria->Listar() as $value) {
   $datos ["data"][]=[
   $value->IdCategoria,
   $value->NombreCategoria,
   
            $value->Estado == 1 ?
            //boton de cambiar estado 
            " <a class='btn btn-success' 
            onclick='Rol.CambiarEstado(". $value->IdCategoria.",".   $EstadosPosibles["Inactivo"].")'  role='button' data-toggle='tooltip' data-placement='auto' title='Cambiar Estado'> 
            <span class='glyphicon glyphicon-eye-open'></span>  
        </a>" : 
        " <a class='btn btn-danger' 
        onclick='Rol.CambiarEstado(". $value->IdCategoria.",".  $EstadosPosibles["Activo"].")'role='button' data-toggle='tooltip' data-placement='auto' title='Cambiar Estado'> 
        <spam class='glyphicon glyphicon-eye-close'></spam> </a>",
                //boton de eliminiar
        " <a class='btn btn-warning' 
        onclick='Rol.Eliminar(".$value->IdCategoria.")' role='button' 
        data-toggle='tooltip' data-placement='auto' title='Eliminar'> 
        <spam class='glyphicon glyphicon-trash'></spam></a>",
            //boton para modificar por medio de modal
            "<a class='btn btn-info' 
            onclick='Rol.ListarRolPorID(".$value->IdCategoria.")' role='button'
            data-toggle='modal' data-target='#myModal'
            data-toggle='tooltip' data-placement='auto' title='Modificar!'> <span class='glyphicon glyphicon-wrench
            '></span>  </a>", 
        

   ];
 }
 echo json_encode($datos);
}
}



