<?php


//session_start();

function mostrarError($errores,$campo){
    $alerta='';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta='<div class="alerta alerta-error">'.$errores[$campo].'</div>';
    }

    return $alerta;
}

function mostrarErrorLogin($errores_login,$campo){
    $alerta='';
    if(isset($errores_login[$campo]) && !empty($campo)){
        $alerta='<div class="alerta alerta-error">'.$errores_login[$campo].'</div>';
    }

    return $alerta;
}

function borrarErrores(){
    
    $borrado=false;
    if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = null;
        $borrado=session_unset();

    }

    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;
        unset($_SESSION['completado']);
    }
    return $borrado;
   
}

function borrarErroresLogin(){
    
    if(isset($_SESSION['error_login'])){
        $_SESSION['error_login'] = null;
        unset($_SESSION['error_login']);

    }

    if(isset($_SESSION['errores_login'])){
        $_SESSION['errores_login'] = null;
        unset($_SESSION['errores_login']);

    }
   
}

function recuperarCat($conexion_db){

    $query="SELECT *FROM categorias ORDER BY id ASC;";
    $categorias=mysqli_query($conexion_db,$query);

    $resultado=array();
    if($categorias && mysqli_num_rows($categorias)>=1){
        $resultado=$categorias;
    }
    return $resultado;
}

function recuperarEntrada($conexion_db){

    $query="SELECT e.*,c.nombre as 'categoria',u.nombre as 'u.nombre',u.apellidos as 'u.apellidos' 
            FROM entradas e
            INNER JOIN categorias c ON c.id=e.id_categoria
            INNER JOIN usuarios u ON u.id=e.id_usuario
            ORDER BY e.id_categoria DESC;";
    
    
    $entradas=mysqli_query($conexion_db,$query);
    
    $resultado=array();
    if($entradas && mysqli_num_rows($entradas)>=1){
        $resultado=$entradas;
    }
    return $resultado;
     
}