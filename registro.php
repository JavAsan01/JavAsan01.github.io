<?php include("admin/conexion.php");?>
<?php
session_start();
if(isset($_POST["registrar"])){

    if(!empty($_POST['apellidos']) && !empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['usuario_reg']) && !empty($_POST['contrasenia'])){
        $apellidos=$_POST['apellidos'];
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $usuario_reg=$_POST['usuario_reg'];
        $contrasenia=$_POST['contrasenia'];

        $query = $conexion->prepare("SELECT * FROM usuario WHERE usuario_reg=:usuario_reg");
            $query->bindParam("usuario_reg", $usuario_reg, PDO::PARAM_STR);
            $query->execute();
            
            if($query->rowCount() > 0){
                $mensaje = "El usuario ya se encuentra registrado";
            }

            else{
                $query = $conexion->prepare("INSERT INTO usuario(apellidos,nombre,email,usuario_reg,contrasenia) VALUES (:apellidos,:nombre,:email,:usuario_reg,:contrasenia)");
                $query->bindParam("apellidos",$apellidos, PDO::PARAM_STR);
                $query->bindParam("nombre",$nombre, PDO::PARAM_STR);
                $query->bindParam("email",$email, PDO::PARAM_STR);
                $query->bindParam("usuario_reg",$usuario_reg, PDO::PARAM_STR);
                $query->bindParam("contrasenia",$contrasenia, PDO::PARAM_STR);
                $result =$query->execute();
                
                if($result){
                    $mensaje = "Cuenta Correctamente Creada";
                }
                else{
                    $mensaje = "Error al ingresar datos de la información!";
                }
            }             
        }
        else {
            $mensaje = "Todos los campos son obligatorios!";
        }  

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles\1_inicio.css">
    <link rel="stylesheet" href="styles\login.css">
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

    <!-- ******************************************** NAVBAR *************************************************-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" id="nav-p">
        <div class="container-fluid" id="contenerdor-n">
            <a class="navbar-brand" href="#">
                <img src="img\facil4.png" alt="logo"  height="50">
            </a>
            <button class="navbar-toggler" type="button"  data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" height="3rem" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>         
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="index.html">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="2_nosotros.html">NOSOTROS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="3_servicios.html">SERVICIOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="5_contactos.html">CONTACTOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="login.php">CITAS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


<div class="container login">
    <div class="row">
        
        <div class="col-md-6 foto-l">  
            <img src="img/login.jpg" class="img-fluid" alt="Noticia 1"> 
        </div>
        <div class="col-md-6 rounded carta">
            <br>
            <div class="card" >

                <div class="class-header text-center">
                    <h1>Registre sus datos</h1>
                </div>
            </div>
            <div class="card-body ">
                <?php if(isset($mensaje)){?>
                <div class="alert alert-danger" role="alert">
                    <strong><?php echo $mensaje;?></strong>
                </div>
                <?php }?>
                <form method="POST" name="registrarform" id="registrarform" action="registro.php">
                    <div class="form-group">
                        <label>Apellidos</label>
                        <input name ="apellidos" id="apellidos"type="text" class="form-control" placeholder="Escriba sus apellidos">
                    </div>    
                    <div class="form-group">
                        <label>Nombre</label>
                        <input name ="nombre" id="nombre"type="text" class="form-control" placeholder="Escriba su nombre">
                    </div>    
                    <div class="form-group">
                        <label>Email</label>
                        <input name ="email" id="email"type="text" class="form-control" placeholder="Escriba su email">
                    </div> 
                    <div class="form-group">
                        <label>Usuario</label>
                        <input name ="usuario_reg" id="usuario_reg"type="text" class="form-control" placeholder="Escriba su nuevo nombre de usuario">
                    </div> 
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input name ="contrasenia" id="contrasenia"type="text" class="form-control" placeholder="Escriba su nueva contraseña">
                    </div> 
                    <button type="submit" name="registrar" id="registrar" class="btn">Registrarse</button>
                    <br>
                    <p> Ya estas registrado y tienes una cuenta? <a href="login.php">Entra aqui</a></p>
                    <br>
                </form>
            
            </div>
            
        </div>
    </div>
</div>
<!-- FOOTER -->
<div class="container-fluid">
        <div class="row p-5 text-white pie">
            <!--LOGO-->
            <div class="col-xs-12 col-md-6 col-lg-3">
                <a href="" class="col-3 text-reset text-uppercase d-flex align-items-center text-decoration-none">
                    <img src="img\facil4.png" alt="logo MY PET"  height="60">
                      <h5><strong>VETERINARIA MY PET</strong></h5> 
                </a>
            </div>

            <!--DIRECCION-->
            <div class="col-xs-12 col-md-6 col-lg-3">

                <a href="#" class="col-3 text-reset text-uppercase d-flex align-items-center text-decoration-none">
                    <img src="img/direccion.ico" alt="logo MY PET">
                      <h5><strong>DIRECCION</strong></h5> 
                </a>
                <p>Av. Colón E11-58 y 12 de Octubre Quito, Pichincha, Ecuador</p>
            </div>

            <!--SIGUENOS-->
            <div class="col-xs-12 col-md-6 col-lg-3">
                <h5><strong>SIGUENOS EN:</strong></h5>
                <a href="https://www.whatsapp.com/" target="_blank"> <img src="img/whatsapp.ico" alt="whatsapp"></a>
                <a href="https://www.instagram.com/" target="_blank"> <img src="img/instagram.ico" alt="instagram"></a>
                <a href="https://www.facebook.com/" target="_blank"> <img src="img/facebook.ico" alt="facebook"></a> 

            </div>

            <!--GRACIAS-->
            <div class="col-xs-12 col-md-6 col-lg-3">
                <h5><strong>GRACIAS POR TU VISITA</strong></h5>
            </div>
        </div>


        <!--DERECHOS RESERVADOS-->
        <div class="col-xs-12">
            <p class="text-center"> &copy 2022 - <strong>los chicos dulces</strong>  - Todos los Derechos Reservados</p>
        </div>
    
       
    </div>


    <!--SCRIPT_BOSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>