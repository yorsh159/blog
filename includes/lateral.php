

<aside id="sidebar">

    <?php if(isset($_SESSION['usuario'])):?> 
        <div id="login" class="bloque">
           <h4>Hola, <?= $_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos'] ?></h4> 
           <!-- logout -->
           <a href="" class="boton"><i class="material-icons">person</i>Mi Perfil</a>
           <a href="" class="boton"><i class="material-icons">add</i>Crear Categoria Nueva</a>
           <a href="" class="boton"><i class="material-icons">post_add</i>Crear Entrada Nueva</a>
           <a href="logout.php" class="boton"><i class="material-icons">logout</i>Salir</a>
           
        </div>   
    <?php endif; ?>
        

    <div id="login" class="bloque">
        <h3>Identificate</h3>

        <?php if(isset($_SESSION['error_login'])):?> 
        <div class="alerta alerta-error">
            <?=($_SESSION['error_login'])?>    
        </div>
        <?php endif;?>   

        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="text" name="email">
            <?php echo isset($_SESSION['errores_login']) ? mostrarErrorLogin($_SESSION['errores_login'], 'email') : ''; ?>

            <label for="password">Contraseña</label>
            <input type="password" name="password">
            <?php echo isset($_SESSION['errores_login']) ? mostrarErrorLogin($_SESSION['errores_login'], 'password') : ''; ?>

            <input type="submit" value="Entrar">
        </form>
        <?php borrarErroresLogin(); ?>
    </div>

    <div id="registrar" class="bloque">
        <h3>Registrate</h3>

        <?php if (isset($_SESSION['completado'])) : ?>
            <div class="alerta alerta-exito">
                <?= $_SESSION['completado'] ?>
            </div>
        <?php elseif (isset($_SESSION['errores']['general'])) : ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['errores']['general'] ?>
            </div>
        <?php endif; ?>

        <form action="registro.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

            <label for="email">Email</label>
            <input type="email" name="email">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

            <label for="password">Contraseña</label>
            <input type="password" name="password">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

            <input type="submit" name="submit" value="Registrar">
        </form>
        <?php borrarErrores(); ?>
    </div>
</aside>