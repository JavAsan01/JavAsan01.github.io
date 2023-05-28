<?php include("../templates/cabecera.php");?>
<?php include("../conexion.php")?>
<?php
//CODIGO PARA LISTAR LA TABLA
$sentenciaSQL = $conexion->prepare("SELECT * FROM mascota");
$sentenciaSQL->execute();
$listaMascota = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
//CODIGO PARA EL FORMULARIO
//DATOS DEL FORMULARIO
$id_mascota = (isset($_POST['id_mascota']))?$_POST['id_mascota']:"";
$nombre_mascota = (isset($_POST['nombre_mascota']))?$_POST['nombre_mascota']:"";
$tipo_mascota = (isset($_POST['tipo_mascota']))?$_POST['tipo_mascota']:"";
$raza_mascota = (isset($_POST['raza_mascota']))?$_POST['raza_mascota']:"";
$edad_mascota = (isset($_POST['edad_mascota']))?$_POST['edad_mascota']:"";
$id_usuario = (isset($_POST['id_usuario']))?$_POST['id_usuario']:"";
//TOMO LA ACCION DEL BOTON
$accion_mas = (isset($_POST['accion_mas']))?$_POST['accion_mas']:"";
switch ($accion_mas){
    //INSERTAR DATOS EN LA BD
    case "AgregarMascota":
        $sentenciaSQL = $conexion->prepare("INSERT INTO mascota (nombre_mascota,tipo_mascota,raza_mascota,edad_mascota,id_usuario) VALUES (:nombre_mascota,:tipo_mascota,:raza_mascota,:edad_mascota,:id_usuario)");
        $sentenciaSQL->bindParam(':nombre_mascota',$nombre_mascota);
        $sentenciaSQL->bindParam(':tipo_mascota',$tipo_mascota);
        $sentenciaSQL->bindParam(':raza_mascota',$raza_mascota);
        $sentenciaSQL->bindParam(':edad_mascota',$edad_mascota);
        $sentenciaSQL->bindParam(':id_usuario',$id_usuario);
        $sentenciaSQL ->execute();
        header("Location:mascota.php");
        break;
    //BORRAR DATOS EN LA BD
    case "EliminarMascota":
        $sentenciaSQL = $conexion->prepare("DELETE  FROM mascota where id_mascota=:id_mascota");
        $sentenciaSQL->bindParam(':id_mascota',$id_mascota);
        $sentenciaSQL->execute();    
        header("Location:mascota.php");
        break;
    //ACTUALIZAR DATOS EN LA BD    
    case "ActualizarMascota":
        $sentenciaSQL = $conexion->prepare("UPDATE mascota set nombre_mascota = :nombre_mascota, tipo_mascota = :tipo_mascota, raza_mascota = :raza_mascota, edad_mascota = :edad_mascota, id_usuario = :id_usuario
                                                            WHERE id_mascota=:id_mascota");
        $sentenciaSQL->bindParam(':id_mascota',$id_mascota);
        $sentenciaSQL->bindParam(':nombre_mascota',$nombre_mascota);
        $sentenciaSQL->bindParam(':tipo_mascota',$tipo_mascota);
        $sentenciaSQL->bindParam(':raza_mascota',$raza_mascota);
        $sentenciaSQL->bindParam(':edad_mascota',$edad_mascota);
        $sentenciaSQL->bindParam(':id_usuario',$id_usuario);
        $sentenciaSQL ->execute();
        header("Location:mascota.php");
        break;
};
?>
<div class="container">
    <div class="row">
        <div class="col-md-5 formulario" >
            <label ><h3>Ingrese los datos de su mascota</h3></label>
            <form method="POST" enctype="multipart/form-data">
            <div class="col-6 col-md-4">
                <label >Id de la mascota</label>
                <input type="text" id="recibir_id" name="id_mascota" placeholder="Código de la mascota" readonly>
            </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Ingrese el nombre de su mascota </label>
                        <input class="form-input" type="text" name="nombre_mascota" placeholder="Ingrese el nombre">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Ingrese el tipo de su mascota </label>
                        <input class="form-input" type="text" name="tipo_mascota" placeholder="Ingrese el tipo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Ingrese la raza de su mascota</label>
                        <input class="form-input" type="text" name="raza_mascota" placeholder="Ingrese la raza">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Ingrese la edad de su mascota</label>
                        <input class="form-input" type="text" name="edad_mascota" placeholder="Ingrese la edad">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Ingrese su id de usuario </label>
                        <input class="form-input" type="text" name="id_usuario" placeholder="Ingrese su id">
                    </div>
                </div>
                <div class="btn ">
                        <button type="submit" name="accion_mas" value="AgregarMascota" class="btn" >Enviar</button>
                        <button type="reset"  name="accion_mas" value="LimpiarMascota" class="btn" >Limpiar</button>
                        <button type="submit" name="accion_mas" value="EliminarMascota" class="btn" >Eliminar</button>
                        <button type="submit" name="accion_mas" value="ActualizarMascota" class="btn" >Actualizar</button>
                </div>    
            </form>
        </div>    
        <!-- TABLA -->
        <div class="col tabla-c">
            <h3 class="text-center">Sus mascostas </h3>   
            <table class="table table-striped tabla">
                <thead>
                    <tr>
                    <th scope="col">Id_mascota</th>
                    <th scope="col">Nombre de la mascota</th>
                    <th scope="col">Tipo de mascota</th>
                    <th scope="col">Raza de la mascota</th>
                    <th scope="col">Edad de la mascota</th>
                    <th scope="col">Id usuario</th>
                    </tr>
                </thead>
                <tbody>
                <!-- Imprimir datos de la BD-->
                <?php  foreach($listaMascota as $mascota) {?>
                    <tr>
                        <td><input type="button" onclick="obtener_id(<?php echo $mascota ['id_mascota'];?>)" id="valor_id" value="<?php echo $mascota ['id_mascota'];?>"></td>
                        <td><?php echo $mascota ['nombre_mascota'];?></td>
                        <td><?php echo $mascota ['tipo_mascota'];?></td>
                        <td><?php echo $mascota ['raza_mascota'];?></td>
                        <td><?php echo $mascota ['edad_mascota'];?></td>
                        <td><?php echo $mascota ['id_usuario'];?></td>
                    </tr>
                    <?php } ?>
                    <!-- CODIGO PARA MANDAR EL ID -->
                    <script>
                        function obtener_id(item){
                            id = document.getElementById("recibir_id");
                            id.value = '';
                            id.value = item;

                        }
                    </script>
                </tbody>
            </table>
        </div>
        
    </div>
    <br>
</div>


<!-- Cargar el pie de pagina -->
<?php include("../templates/pie.php");?> 
<!--  -->