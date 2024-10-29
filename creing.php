<php
function 
verificarCredenciales($nombre,$apellido,$contraseña){
    $database=new Database();
    $db = $database->getDB();

    $query ="SELECT * FROM dueno WHERE nombre= :nombre AND apellido=:apellido AND contrasena=:contrasena";
    $stmt=$db->prepare($query);
    $stmt=bindParam(':nombre',$nombre);
    $stmt=bindParam(':apellido',$apellido);
    $stmt=bindParam(':contrasena',$contrasena);
    $stmt=execute();

    if($stmt->rowCount()>0){
        return "jefe";
    }
    $query ="SELECT * FROM usuarios WHERE nombre= :nombre AND apellido=:apellido AND contrasena=:contrasena";
    $stmt=$db->prepare($query);
    $stmt=bindParam(':nombre',$nombre);
    $stmt=bindParam(':apellido',$apellido);
    $stmt=bindParam(':contrasena',$contrasena);
    $stmt=execute();

    if($stmt->rowCount()>0){
        return "usuarios";
    }
    return false;
}
?>