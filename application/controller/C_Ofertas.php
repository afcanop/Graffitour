<?php

class C_Ofertas extends Controller {

  private $MldOferta = null;
  
  function __construct() {
    $this->MldOferta = $this->loadModel("MldOferta");
  }

    public function INDEX() {


        if (isset($_SESSION["nombre"])) {

            require APP . 'view/_templates/Adm/HeaderAdm.php';
            require APP . 'view/contenido/Ofertas/Ofertas.php';
            require APP . 'view/_templates/Adm/footerAdm.php';
        } else {

            require APP . 'view/_templates/Login/HeaderAdmLogin.php';
            require APP . 'view/contenido/ContenidoAdmLogin.php';
            require APP . 'view/_templates/Login/footerAdmLogin.php';
        }

        // load views
    }

    public function Registrar()
    {
     if (isset($_POST)) {

       $hoy = date('Y-m-d');
       $FECHAINICIO = explode(" ", $_POST["txtFechaOfertaInicio"]);
       $FECHAFINAL = explode(" ", $_POST["txtFechaFinal"]);

       //fecha inicio
       $fechainicial = strtotime($FECHAINICIO[0]); 
       $fechaInicial = date('Y-m-d',$fechainicial);

       //fecha final
       $fechafinal = strtotime($FECHAFINAL[0]); 
       $fechaFinal = date('Y-m-d',$FECHAFINAL[0]);
       //hora inicio
       $timeInicio = strtotime($FECHAINICIO[1]);     
       $horainicio = date('h:i:s',$timeInicio);
       //hora final
       $timeFinal = strtotime($FECHAFINAL[1]);      
       $horafinal = date('h:i:s',$timeFinal);

        $valor = (float) $_POST["txtOferta"];
        $this->MldOferta->__SET("Valor", $valor);
        $this->MldOferta->__SET("FECHAINICIO", $fechaInicial);
        $this->MldOferta->__SET("FECHAFINAL", $fechaFinal);
        $this->MldOferta->__SET("FECHAREGISTRO", $hoy);
        $this->MldOferta->__SET("HORAINICIO", $horainicio);
        $this->MldOferta->__SET("HORAFINAL", $horafinal);



        try {
            $very = $this->MldOferta->Registrar();
            if ($very) {
                echo json_encode(["v" => 1]);   
            }else{
                echo json_encode(["v"=>0]);

            }
        } catch (Exception $e) {
            
        }
            
        }
    }

}