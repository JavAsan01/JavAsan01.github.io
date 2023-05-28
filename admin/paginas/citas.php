<?php include("../templates/cabecera.php");?>
<?php include("../conexion.php")?>
<?php
//CODIGO PARA LISTAR LA TABLA
$sentenciaSQL = $conexion->prepare("SELECT * FROM citas");
$sentenciaSQL->execute();
$listaCitas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
//CODIGO PARA EL FORMULARIO
//DATOS DEL FORMULARIO
$cedula = (isset($_POST['cedula']))?$_POST['cedula']:"";
$correo = (isset($_POST['correo']))?$_POST['correo']:"";
$celular = (isset($_POST['celular']))?$_POST['celular']:"";
$servicios = (isset($_POST['servicios']))?$_POST['servicios']:"";
$hora = (isset($_POST['hora']))?$_POST['hora']:"";
$dia = (isset($_POST['dia']))?$_POST['dia']:"";
$id = (isset($_POST['id']))?$_POST['id']:"";
//TOMO LA ACCION DEL BOTON
$accion = (isset($_POST['accion']))?$_POST['accion']:"";
switch ($accion){
    //INSERTAR DATOS EN LA BD
    case "Agregar":
        $sentenciaSQL = $conexion->prepare("INSERT INTO citas (cedula,correo,celular,servicio,hora,dia) VALUES (:cedula,:correo,:celular,:servicio,:hora,:dia)");
        $sentenciaSQL->bindParam(':cedula',$cedula);
        $sentenciaSQL->bindParam(':correo',$correo);
        $sentenciaSQL->bindParam(':celular',$celular);
        $sentenciaSQL->bindParam(':servicio',$servicios);
        $sentenciaSQL->bindParam(':hora',$hora);
        $sentenciaSQL->bindParam(':dia',$dia);
        $sentenciaSQL ->execute();
        header("Location:citas.php");
        break;
    //BORRAR DATOS EN LA BD
    case "Eliminar":
        $sentenciaSQL = $conexion->prepare("DELETE  FROM citas where id_cita=:id");
        $sentenciaSQL->bindParam(':id',$id);
        $sentenciaSQL->execute();    
        header("Location:citas.php");
        break;
    //ACTUALIZAR DATOS EN LA BD    
    case "Actualizar":
        $sentenciaSQL = $conexion->prepare("UPDATE citas set cedula = :cedula, correo = :correo, celular = :celular, servicio = :servicio, hora = :hora, dia = :dia
                                                            WHERE id_cita=:id");
        $sentenciaSQL->bindParam(':id',$id);
        $sentenciaSQL->bindParam(':cedula',$cedula);
        $sentenciaSQL->bindParam(':correo',$correo);
        $sentenciaSQL->bindParam(':celular',$celular);
        $sentenciaSQL->bindParam(':servicio',$servicios);
        $sentenciaSQL->bindParam(':hora',$hora);
        $sentenciaSQL->bindParam(':dia',$dia);
        $sentenciaSQL ->execute();
        header("Location:citas.php");
        break;
};
?>

<div class="container">
    <div class="row">
        <div class="col-md-5 formulario" >
            <label ><h3>Ingrese los datos</h3></label>
            <form method="POST" enctype="multipart/form-data">
            <div class="col-6 col-md-4">
                <label >Id de la cita</label>
                <input type="text" id="recibir_id" name="id" placeholder="Código de cita" readonly>
            </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Ingrese su cédula <i class="fas fa-signature"></i></label>
                        <input class="form-input" type="number" name="cedula" placeholder="Ingrese su cédula">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Ingrese su correo </label>
                        <input class="form-input" type="mail" name="correo" placeholder="Ingrese su correo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Ingrese su # de celular</label>
                        <input class="form-input" type="number" name="celular" placeholder="Ingrese su celular">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Seleccione el servicio</label>
                        <select class="form-select" name="servicios" id="servicio">
                            <option value="Clinica General">Clinica General</option>
                            <option value="Cirugía">Cirugía</option>
                            <option value="Emergencias">Emergencias</option>
                            <option value="Rehabilitación">Rehabilitación</option>
                            <option value="Odontología">Odontología</option></select>      
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Seleccione la hora</label>
                        <select class="form-select" name="hora" id="hora">
                            <option value="7:00 a.m - 8:00 a.m">7:00 a.m - 8:00 a.m</option>
                            <option value="8:00 a.m - 9:00 a.m">8:00 a.m - 9:00 a.m</option>
                            <option value="9:00 a.m - 10:00 a.m">9:00 a.m - 10:00 a.m</option>
                        </select>  
                    </div>
                    <div class="col md-6">
                        <label class="form-label">Seleccione el día</label>
                        <select class="form-select" name="dia" id="dia">
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miércoles">Miércoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option></select>
                    </div>
                </div>
                <div class="btn ">
                        <button type="submit" name="accion" value="Agregar" class="btn" >Enviar</button>
                        <button type="reset"  name="accion" value="Limpiar" class="btn" >Limpiar</button>
                        <button type="submit" name="accion" value="Eliminar" class="btn" >Eliminar</button>
                        <button type="submit" name="accion" value="Actualizar" class="btn" >Actualizar</button>
                </div>    
            </form>
        </div>    
        <!-- TABLA -->
        <div class="col tabla-c">
            <h3 class="text-center">Tabla de Citas</h3>   
            <table class="table table-striped tabla">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Cédula</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Día</th>
                    </tr>
                </thead>
                <tbody>
                <!-- Imprimir datos de la BD-->
                <?php  foreach($listaCitas as $citas) {?>
                    <tr>
                        <td><input type="button" onclick="obtener_id(<?php echo $citas ['id_cita'];?>)" id="valor_id" value="<?php echo $citas ['id_cita'];?>"></td>
                        <td><?php echo $citas ['cedula'];?></td>
                        <td><?php echo $citas ['correo'];?></td>
                        <td><?php echo $citas ['celular'];?></td>
                        <td><?php echo $citas ['servicio'];?></td>
                        <td><?php echo $citas ['hora'];?></td>
                        <td><?php echo $citas ['dia'];?></td>
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

<?php include("../templates/pie.php");?> 
