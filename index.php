<?php require_once 'includes/cabecera.php' ?>
<?php require_once 'includes/lateral.php' ?>


<!--CAJA PRINCIPAL-->
<div id="principal">
    <h1>Ultimas Entradas</h1>
    <?php
        $entradas = recuperarEntrada($conexion);
        if(!empty($entradas)):
        while ($entrada = mysqli_fetch_assoc($entradas)):
        ?>
        <article class="entrada">            
            <a href="">
                <h2><?= $entrada['titulo'] ?></h2>
                <span><?=$entrada['u.nombre']." ".$entrada['u.apellidos']." | ".$entrada['categoria']." | ".$entrada['fecha'] ?></span>
                <p><?=substr($entrada['descripcion'],0,200)."..."  ?></p>
            </a>    
        </article>
    <?php endwhile; ?>
    <?php endif; ?>   
        <article class="entrada">
            <a href="">
                <h2>Titulo de entrada 2</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque at, possimus voluptates ex
                    saepe ut numquam ipsam optio eos consectetur nihil doloribus nobis a! Quam fugit ipsam eius
                    enim modi.</p>
            </a>
        </article>
        <article class="entrada">
            <a href="">
                <h2>Titulo de entrada 3</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi saepe facere labore, non
                    soluta cupiditate neque quae impedit placeat, voluptates est facilis, ad enim rerum consectetur
                    excepturi atque delectus voluptatem!</p>
            </a>
        </article>
        <article class="entrada">
            <a href="">
                <h2>Titulo de entrada 4</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi saepe facere labore, non
                    soluta cupiditate neque quae impedit placeat, voluptates est facilis, ad enim rerum consectetur
                    excepturi atque delectus voluptatem!</p>
            </a>
        </article>

        <div id="ver-todas">
            <a href="">Ver todas las entradas</a>
        </div>
</div>


<!--PIE DE PAGINA-->
<?php require_once 'includes/footer.php' ?>