<?php
    session_start();
    if (!isset($_SESSION['usuario'])){
        header("Location:../../login.php");
    }else{
        if($_SESSION['usuario']=="ok"){
            $nombreusuario = $_SESSION["nombreusuario"]; 
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
    <!--FONT OSWALD-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <!-- CUSTOM CSS-->
    <link rel="stylesheet" href="../../styles\1_inicio.css">
    <link rel="stylesheet" href="../../styles\login.css">
</head>
<body>
    <!-- ******************************************** NAVBAR *************************************************-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" id="nav-p">
        <div class="container-fluid" id="contenerdor-n">
            <a class="navbar-brand" href="#">
                <img src="../../img\facil4.png" alt="logo"  height="50">
            </a>
            <button class="navbar-toggler" type="button"  data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" height="3rem" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>         
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="../paginas/inicio.php">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../paginas/citas.php">CITAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../paginas/cerrar.php">CERRAR</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
