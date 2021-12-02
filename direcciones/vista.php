<?php
if(!empty($_GET['id'])){
    //Credenciales de conexion
    $Host = 'localhost';
    $Username = 'root';
    $Password = '';
    $dbName = 'ecommerce';
    
    //Crear conexion mysql
    $db = new mysqli($Host, $Username, $Password, $dbName);
    
    //revisar conexion
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    
    //Extraer imagen de la BD mediante GET
    $result = $db->query("SELECT im FROM imagenes WHERE idimagen = {$_GET['id']}");
    
    if($result->num_rows > 0){
        $imgDatos = $result->fetch_assoc();
        
        //Mostrar Imagen
        header("Content-Type: image/jpg"); 
        echo $imgDatos['im']; 
    }else{
        echo 'Imagen no existe...';
    }
}
?>