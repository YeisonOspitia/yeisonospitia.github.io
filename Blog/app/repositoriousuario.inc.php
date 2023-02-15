<?php
class repositoriousuario{
    public static function obtener_todos($conexion){
        $usuarios=array();
        if(isset($conexion)){
            try {
                include_once 'usuario.inc.php';
                $sql="SELECT * FROM usuarios";

                $sentencia=$conexion->prepare($sql);
                $sentencia->execute();
                $resultado=$sentencia->fetchALL();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $usuarios[]=new Usuario(
                            $fila['id'],$fila['nombre'],$fila['email'],$fila['password'],$fila['fecha_registro'],$fila['activo']
                        );
                    }
                } else {
                    print 'No hay usuarios';
                }

            } catch (PDOException $ex) {
                print "ERROR". $ex -> getMessage();
            }
        }
        return $usuarios;

    }

    public static function obtener_numero_usuarios($conexion){
        $total_usuarios=null;

        if (isset($conexion)) {
            try {
                $sql="SELECT COUNT(*) as total FROM Usuarios";

                $sentencia=$conexion->prepare($sql);
                $sentencia->execute();
                $resultado=$sentencia->fetch();

                $total_usuarios=$resultado['total'];

            } catch (PDOException $ex) {
                print "ERROR". $ex -> getMessage();
            }


        }
        return $total_usuarios;
    }
    public static function insert_usuario($conexion, $usuario){
        $usuario_insertado=false;
        if(isset($conexion)){
            try{
                $sql="INSERT INTO usuarios(nombre, email, password, fecha_registro, activo) VALUES (:nombre, :email, :password, NOW(), 0)"; 
                $nombre1=$usuario->obtener_nombre();
                $email1=$usuario->obtener_email();
                $password1=$usuario->obtener_password();

                $sentencia=$conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $nombre1, PDO::PARAM_STR);
                $sentencia->bindParam(':email', $email1, PDO::PARAM_STR);
                $sentencia->bindParam(':password', $password1, PDO::PARAM_STR);

                $usuario_insertado=$sentencia->execute();
            }catch(PDOException $ex){
                print "Error".$ex->getMessage();
            }

        }
        return $usuario_insertado;
    }
}