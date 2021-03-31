<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no"> 
    <title><?php echo $titulo ?></title> 

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/fontawesome.min.css">
    <link rel="stylesheet" href="../public/css/estilo.css">

</head>
<body class="d-flex flex-column">

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004aac;">
        <div class="container">
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="../public/img/logo2.png" class="img-fluid" width="55" height="45" alt="Home"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url(); ?>">Início <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Saiba mais
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Sobre o projeto(indisponível)</a>
                <a class="dropdown-item" href="#">Formas de entrar em contato(indisponível)</a>
                <div class="dropdown-divider"></div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sua conta
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo base_url('/usuario/gestaoconta'); ?>">Alterar senha</a>
                <a class="dropdown-item" href="<?php echo base_url('/url'); ?>">Lista de URLs</a>
                <div class="dropdown-divider"></div>
                </div>
            </li>
            <!--
            <li class="nav-item">
                <a class="nav-link" href="#">URLs</a>
            </li>
            -->
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <a href="<?php echo base_url('/usuario/sair'); ?>"><button class="btn btn-secondary my-2 my-sm-0" type="">Sair</button></a>
        </div>
        </div>
    </nav>

    <br>
<div class="flex-grow-1 flex-shrink-0">
    <div class="container">