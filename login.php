<?php

require_once 'includes/conexion_db.php';

if(isset($_POST)){
    //$email = trim($_POST['email']);
    //$password = $_POST['password'];

    // if(isset($_SESSION['errores_login'])){
    //     unset($_SESSION['errores_login']);

    // }
    
    $email_login= isset($_POST['email']) ? $_POST['email']:false;
    $password_login= isset($_POST['password']) ? $_POST['password']:false;
    
    $errores_login=array();

    if(!empty($email_login) && filter_var($email_login,FILTER_VALIDATE_EMAIL)){
        $email__login_validado=true;       
    }
    else{
        $email__login_validado=false;
        $errores_login['email']="El email no es válido";
    }
    if(!empty($password_login)){
        $password__login_validado=true;
        
    }
    else{
        $password__login_validado=false;
        $errores_login['password']="El password no es válido";
    }
    
    $_SESSION['errores_login']=$errores_login;

    $sql="SELECT * from usuarios WHERE email = '$email_login'";
    $login=mysqli_query($conexion,$sql);
    
    if($login && mysqli_num_rows($login)==1){
        $usuario = mysqli_fetch_assoc($login);
        
        $verify = password_verify($password_login,$usuario['password']);

        if($verify){

            $_SESSION['usuario']=$usuario;
            //var_dump($usuario);
            
        }else{
            $_SESSION['error_login']="Login Incorrecto";
        }

    }else{
        
        $_SESSION['error_login']="Login Incorrecto";

    }
    

}

header('Location: index.php');