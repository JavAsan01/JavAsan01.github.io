<?php include("../templates/cabecera.php");?>
<?php
    session_start();
    session_destroy();
    header('Location:../../index.html');

?>

<?php include("../templates/pie.php");?> 