<?php

class MldUsuario {

    PRIVATE $IDUSUARIOS;
    private $PRIMER_NOMBRE;
    private $SEGUNDO_NOMBRE;
    private $PRIMER_APELLIDO;
    private $SegundoApellido;
    private $NUMERO_CONTACTO;
    private $NumeroIdentificacion;
    private $FechaNacimiento;
    private $Constrasena;
    private $Estado;
    private $TipoRol;
    private $EstadoViaje;


    //metodos magicos get y set
    public function __GET($atributo) {
        return $this->$atributo;
    }

    public function __SET($atributo, $value) {
        $this->$atributo = $value;
    }

    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function registrar() {

        $sql = 'CALL RU_RegistrarUsuarios(?,?,?,?,?,?,?,?)';

        $sth = $this->db->prepare($sql);
        $sth->bindParam(1, $this->PRIMER_NOMBRE);
        $sth->bindParam(2, $this->SEGUNDO_NOMBRE);
        $sth->bindParam(3, $this->PRIMER_APELLIDO);
        $sth->bindParam(4, $this->SegundoApellido);
        $sth->bindParam(5, $this->NUMERO_CONTACTO);
        $sth->bindParam(6, $this->NumeroIdentificacion);
        $sth->bindParam(7, $this->FechaNacimiento);
        $sth->bindParam(8, $this->Constrasena);
        return $sth->execute();
    }

    public function listar() {
        $sql = 'CALL RU_ListarPersonas()';
        $sth = $this->db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function listarRoles() {
        $sql = 'CALL RU_ListarNombreRol()';
        $sth = $this->db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function Modificar() {
        $sql = 'CALL RU_ActualizarUsuario(?,?,?,?,?,?,?)';
        $sth = $this->db->prepare($sql);
        $sth->bindParam(1, $this->IDUSUARIOS);
        $sth->bindParam(2, $this->PRIMER_NOMBRE);
        $sth->bindParam(3, $this->SEGUNDO_NOMBRE);
        $sth->bindParam(4, $this->PRIMER_APELLIDO);
        $sth->bindParam(5, $this->SegundoApellido);
        $sth->bindParam(6, $this->NUMERO_CONTACTO);
        $sth->bindParam(7, $this->Constrasena);
        return $sth->execute();
    }

    public function ConsultarID() {
        $sql = 'CALL RU_ListarPersonaID(?)';
        $sth = $this->db->prepare($sql);
        $sth->bindParam(1, $this->IDUSUARIOS);
        $sth->execute();
        return $sth->fetch();
    }

    public function ModificarEstado() {
        $sql = 'CALL RU_ActualizarEstadoPersona(?,?)';
        $sth = $this->db->prepare($sql);
        $sth->bindParam(1, $this->IDUSUARIOS);
        $sth->bindParam(2, $this->Estado);
        return $sth->execute();
    }

    public function Eliminar(){
       $sql= "CALL RU_EliminarPersonas(?)";
       $sth = $this->db->prepare($sql);
       $sth->bindParam(1, $this->IDUSUARIOS);
      return $sth->execute();
    }

    public function ULtimoID(){
        $sql = 'CALL RU_ListarULtimoIdPersona';
        $sth = $this->db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function ContrasenaActual() {
        $sql = 'CALL RU_ContraseñaActual(?)';
        $sth = $this->db->prepare($sql);
        $sth->bindParam(1, $this->IDUSUARIOS);
        $sth->execute();
        return $sth->fetch();
    }

     public function ModificarEstadoViaje() {
        $sql = 'CALL RU_ActualizarEstadoViaje(?,?)';
        $sth = $this->db->prepare($sql);
        $sth->bindParam(1, $this->IDUSUARIOS);
        $sth->bindParam(2, $this->EstadoViaje);
        return $sth->execute();
    }
}
