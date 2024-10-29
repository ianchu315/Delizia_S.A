<?php
function agregarProducto($nombre,$precio){
$database=new Database();
$db=$database->getDB();

$query ="INSERT INTO locales (nombre,precio) VALUES (:nombre,:precio);
    $stmt=$db->prepare($query);
    $stmt=bindParam(':nombre',$nombre);
    $stmt=bindParam(':precio',$precio);
    $stmt=execute();

        return $stmt->execute();
}
function eliminarProducto($nombre){
$database=new Database();
$db->$database->getDB();

$query = "DELETE FROM locales WHERE nombre=:nombre";
$stmt = $db ->prepare($query);
$stmt->bindParam(':nombre',nombre);

return $stmt->execute();
}
?>