<?php require_once 'includes/conexion_db.php' ?>
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de Videojuegos</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <!--LOGO-->
    <header id="cabecera">
        <div id="logo">
            <a href="index.php">
                Blog de Videojuegos
            </a>
        </div>
        <!--MENU-->
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>                
                </li>
                
                <?php                   
                    $categorias=recuperarCat($conexion);
                    if(!empty($categorias)):
                    while($categoria=mysqli_fetch_assoc($categorias)):
                ?>     
                <li>
                    <a href=""><?=$categoria['nombre']?></a>
                </li>
                <?php endwhile;?>
                <?php endif;?>
                               
                <li>
                    <a href="">Sobre Nostros</a>
                </li>
                <li>
                    <a href="">Contacto</a>
                </li>
            </ul>
        </nav>
    </header>

    <div id="contenedor">