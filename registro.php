<?php
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/repositoriousuario.inc.php';
include_once 'app/validador.inc.php';
if(isset($_POST['enviar'])){
    conexion::abrir_conexion();
    $validador=new validadorRegistro($_POST['nombre'],$_POST['email'],$_POST['password'],$_POST['password2']);
    if($validador->registro_valido()){
        $usuario=new Usuario('' , $validador->obtener_nombre(), $validador->obtener_email(), $validador->obtener_password(), '', '' );
        $usuario_insertado= repositoriousuario::insert_usuario(conexion::obtener_conexion(), $usuario);
        if ($usuario_insertado){
            //Redirigir a login
        }
    }

    conexion::cerrar_conexion();
}
$titulo = "Pagina de registro";

include_once 'PLANTILLAS/documento_inicio.inc.php';
include_once 'PLANTILLAS/navbar.inc.php';
?>
<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Formulario de registro</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6  text-center">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Instrucciones</h3>
                </div>
                <div class="card-body">
                    <br>
                    <p class="text-justify">Para unirte a AVICAMPO introduce un nomnbre de usuario, email y contraseña. Te recomendamos que utilices una contraseña que contenga Mayuscula, Miniscula, numeros y simbolos</p>
                    <br>
                    <a href="#">¿Ya tienes cuenta?</a>
                    <br>
                    <a href="#">¿Recuperar contraseña?</a>
                    <br>
                </div>
            </div>

        </div>
        <div class="col-md-6 text-center">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Introduce tus datos</h3>
                </div>
                <div class="card-body">
                    <form role=form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">                            
                    
                           <?php if(isset($_POST['enviar'])){
                                
                                include_once 'PLANTILLAS/registro_validado.inc.php';
                           }else{
                                include_once 'PLANTILLAS/registro_vacio.inc.php';                              

                           }
                             ?>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include_once 'PLANTILLAS/documento_cierre.inc.php';
?>