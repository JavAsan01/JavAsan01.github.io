<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> REPORTE DE CITA AGENDADA</title>
</head>

<body>
<?php

include("../templates/conexion.php")

$sentenciaSQL= $conexion->preprare("SELECT*FROM" citas);
$sentenciaSQL->execute();
$listaCitas=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<table class="table table-bordered" id="tabla"
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Id Cita</th>
            <th>Servicio</th>
            <th>Dia</th>
            <th>Hora</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($listaCita as $cita)
        <tr>
            <td><?php echo $citas['id_usuario']; ?></td>
            <td><?php echo $citas['id_cita']; ?></td>
            <td><?php echo $citas['servicio']; ?></td>
            <td><?php echo $citas['dia']; ?></td>
            <td><?php echo $citas['hora']; ?></td>
            <td><?php echo $citas['correo']; ?></td>
        </tr>
    ?>
    </tbody>
</table>
</body>
</html>