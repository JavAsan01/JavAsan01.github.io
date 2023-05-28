
<!-- Cargar la cabecera -->
<?php include("../templates/cabecera.php");?>

<!--  -->
<div class="container-sm bg-dark text-white rounded bg-opacity-75 bienvenida">
    <br>
    <h1 class="text-white">Bienvenido <?php echo$nombreusuario?></h1>
    <br>
    <div class = container>
    <h1 align="CENTER"> ¿Que deseas hacer hoy? <h1>
    <div class="row contenedor-contactos">
        <div class="col-lg-4 col-md-6 col-sm-12 pt-4">
            <div class="marco"> 
                <a class="enlaces" href="citas.php">ACTUALIZAR MIS DATOS</a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 pt-4">
            <div class="marco"> 
            <a class="enlaces" href="mascota.php"> REGISTRA A MI MASCOTA</a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 pt-4">
            <div class="marco"> 
            <a class="enlaces" href="citas.php"> AGENDAR UNA CITA</a>
            </div>
        </div>
    </div>    
</div>
</div>


<!-- Cargar el pie de pagina -->
<?php include("../templates/pie.php");?> 
<!--  -->