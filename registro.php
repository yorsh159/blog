<?php

if(isset($_POST['submit'])){

require_once 'includes/conexion_db.php';

if(!isset($_SESSION)){
    session_start();
}

    $nombre= isset($_POST['nombre']) ? mysqli_real_escape_string($conexion,$_POST['nombre']) :false;
    $apellidos= isset($_POST['apellidos']) ? mysqli_real_escape_string($conexion,$_POST['apellidos']):false;
    $email= isset($_POST['email']) ? mysqli_real_escape_string($conexion,$_POST['email']):false;
    $password= isset($_POST['password']) ? mysqli_real_escape_string($conexion,$_POST['password']):false;
    
    $errores=array();

    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
        $nombre_validado=true;
        
    }
    else{
        $nombre_validado=false;
        $errores['nombre']="El nombre no es válido";
    }
    
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/",$apellidos)){
        $apellido_validado=true;
        
    }
    else{
        $apellido_validado=false;
        $errores['apellidos']="El apellido no es válido";
    }

    if(!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_validado=true;
        
    }
    else{
        $email_validado=false;
        $errores['email']="El email no es válido";
    }

    if(!empty($password)){
        $password_validado=true;
        
    }
    else{
        $password_validado=false;
        $errores['password']="El password no es válido";
    }

    $guardar_usuario=false;
    
    if(count($errores)==0){
        $guardar_usuario=true;

        //crifrar contraseña
        $pass_encrytp = password_hash($password,PASSWORD_BCRYPT,['cost'=>4]);
        

        //insert en la BD
        $query="INSERT INTO usuarios VALUES(null,'$nombre','$apellidos','$email','$pass_encrytp',CURRENT_TIMESTAMP());";
        $sql= mysqli_query($conexion,$query);
               

        if($sql){
            $_SESSION['completado']= "Se registró el usuario!";
        }else{
            $_SESSION['errores']['general'] = "No se registró usuario!";
        }


    }else{
        $_SESSION['errores']=$errores;
              
    }
  
}

header('Location: index.php');

