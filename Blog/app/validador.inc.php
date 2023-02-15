<?php

class validadorRegistro{
    private $aviso_inicio;
    private $aviso_cierre;

    private $nombre;
    private $email;
    private $password;

    private $error_nombre;
    private $error_email;
    private $error_password;
    private $error_password2;

    public function __construct($nombre, $email, $password, $password2)
    {
        $this->aviso_inicio="<div class='alert alert-danger' role='alert'>";
        $this->aviso_cierre="</div>";

        $this -> nombre="";
        $this -> email="";
        $this -> password="";

        $this -> error_nombre=$this->validar_nombre($nombre);
        $this -> error_email=$this->validar_email($email);
        $this -> error_password=$this->validar_password($password);
        $this -> error_password2=$this->validar_password2($password, $password2);

        if($this->error_password==="" &&$this->error_password2===""){
            $this->password=$password;
            
        }
        
        
    }

    private function variable_iniciada($variable){
        if (isset($variable) && !empty($variable)){
            return true;
        } else {
            return false;
        }
    }

    private function validar_nombre($nombre) {
        if (!$this->variable_iniciada($nombre)){
            return "Debes escribir un nombre de usuario";
        } else {
            $this ->nombre=$nombre;
        }

        if(strlen($nombre)<6){
            return "El nombre debe ser mas largo que 6 caracteres";
        }
        if(strlen($nombre)>24){
            return "El nombre no puede ocupar mas de 24 caracteres";
        }
        return "";
        
    }

    private function validar_email($email)
    {
        if(!$this->variable_iniciada(($email))){
            return "Debes escribir un email";
        }else {
            $this ->email=$email;
        }
        return "";
    }
    private function validar_password($password)
    {
        if(!$this->variable_iniciada(($password))){
            return "Debes escribir una contraseña";
        }
        return "";
    }
    private function validar_password2($password, $password2)
    {
        if(!$this->variable_iniciada(($password))){
            return "Debes escribir la primera contraseña";
        }
        if(!$this->variable_iniciada(($password2))){
            return "Debes escribir una contraseña";
        }
        if ($password !== $password2){
            return "Ambas contraseñas deben coincidir";
        }
        return "";
    }

    public function obtener_nombre()
    {
        return $this->nombre;
    }
    public function obtener_email()
    {
        return $this->email;
    }
    public function obtener_password()
    {
        return $this->password;
    }
    public function obtener_error_nombre()
    {
        return $this->error_nombre;
    }
    public function obtener_error_email()
    {
        return $this->error_email;
    }
    public function obtener_error_password()
    {
        return $this->error_password;
    }
    public function obtener_error_password2()
    {
        return $this->error_password2;
    }

    public function mostrar_nombre()
    {
        if($this->nombre!==""){
            echo 'value="'. $this->nombre.'"';
        }
    }
    public function mostrtar_error_nombre(){
        if ($this->error_nombre!=="") {
            echo $this->aviso_inicio . $this->error_nombre . $this->aviso_cierre;
        }
    }
    public function mostrar_email()
    {
        if($this->email!==""){
            echo 'value="'. $this->email.'"';
        }
    }
    public function mostrtar_error_email(){
        if ($this->error_email!=="") {
            echo $this->aviso_inicio . $this->error_email . $this->aviso_cierre;
        }
    }
    
    public function mostrtar_error_password(){
        if ($this->error_password!=="") {
            echo $this->aviso_inicio . $this->error_password . $this->aviso_cierre;
        }
    }
    public function mostrtar_error_password2(){
        if ($this->error_password2!=="") {
            echo $this->aviso_inicio . $this->error_password2 . $this->aviso_cierre;
        }
    }

    public function registro_valido(){
        if($this->error_nombre==="" && 
        $this->error_email==="" &&
        $this->error_password===""&&
        $this->error_password2==="" ){
            return true;
        } else{
            return false;
        }
    }


}




?>