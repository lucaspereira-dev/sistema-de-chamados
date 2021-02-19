<?php

$suporte = new Class\Controller\Suporte;
$chamados = $suporte->get();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="autor" content="Lucas Pereira">

    <link rel="stylesheet" type="text/css" href="./public/css/style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./public/img/logoVD.png">

    <title>Sistema de Chamados</title>

</head>

<body>

    <header class="main-header">
        <div class="main-header-container">
            <img class="main-header-logo" src="./public/img/logoVD.png" alt="Logo" class="main-header-logo">
            <h1 class="main-header-titler">Sistema de Chamados</h1>
        </div>
    </header>
    <div id="mensagem" class="Aviso">
    </div>
    <main class="main-container">
        <section class="container-chamados">
            <?php 
                if(!isset($chamados) || empty($chamados)){
                    echo '<p style=" text-align: center;" >';
                    echo 'Nenhum chamado para exibir';
                    echo '</p>';
                }else{
            ?>
                <ul class="container-chamados-ul">
                    <?php foreach ($chamados as $chamado) { ?>
                        <li class="container-chamados-ul-li">

                            <ul class="chamados-data-ul">

                                <li class="chamados-data-ul-li-info">

                                    <div class="info-div">

                                        <ul class="info-div-ul">

                                            <li class="info-div-ul-li-title">

                                                <h3 class="chamado-li-title"><?= $chamado["titulo"] ?></h3>

                                            </li>
                                            <li class="info-div-ul-li-requerente">

                                                <label class="chamado-li-requerente"><?= $chamado["requerente"] ?></label>

                                            </li>
                                            <li class="info-div-ul-li-status">

                                                <label class="chamado-li-status"><?= $chamado["status_chamado"] ?></label>
                                            </li>
                                        </ul>

                                        <p class="info-div-descricao"><?= $chamado["descricao"] ?></p>
                                    </div>
                                </li>
                                <li class="chamados-data-ul-li-btn">
                                    <ul class="btn-chamado-ul">
                                        <li class="btn-chamado-ul-li">
                                            <a class="chamada-btn" href="#">
                                                <span>
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 2V16H16V9H18V16C18 17.1 17.1 18 16 18H2C0.89 18 0 17.1 0 16V2C0 0.9 0.89 0 2 0H9V2H2ZM11 2V0H18V7H16V3.41L6.17 13.24L4.76 11.83L14.59 2H11Z" fill="#005CE7" fill-opacity="0.54" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </li>

                                        <li class="btn-chamado-ul-li">

                                            <a class="chamada-btn" href="#">
                                                <span>
                                                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6588 0C15.4088 0 15.1488 0.1 14.9588 0.29L13.1288 2.12L16.8788 5.87L18.7088 4.04C19.0988 3.65 19.0988 3.02 18.7088 2.63L16.3688 0.29C16.1688 0.09 15.9188 0 15.6588 0ZM12.0588 6.02L12.9788 6.94L3.91878 16H2.99878V15.08L12.0588 6.02ZM0.998779 14.25L12.0588 3.19L15.8088 6.94L4.74878 18H0.998779V14.25Z" fill="#FFB800" fill-opacity="0.54" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </li>

                                        <li class="btn-chamado-ul-li">
                                            <a class="chamada-btn" href="javascript:Aviso('Mensagem', 'Green');">
                                                <span>
                                                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.5 0H4.5L3.5 1H0V3H14V1H10.5L9.5 0ZM11 6V16H3V6H11ZM1 4H13V16C13 17.1 12.1 18 11 18H3C1.9 18 1 17.1 1 16V4Z" fill="#FF0000" fill-opacity="0.54" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </li>

                                    </ul>

                                </li>
                            </ul>

                        </li>
                    <?php } ?>

                </ul>
            <?php
                } 
            ?>
        </section>

        <section class="container-form">
            <form action="/" method="post">
                <h2>Chamado</h2>
                <hr>
                <input required autofocus class="input-form" type="text" name="titulo" placeholder="Titulo">
                <textarea required class="input-form" name="descricao" cols="30" rows="10" placeholder="Descrição"></textarea>
                <input required class="input-form" type="text" name="requerente" placeholder="Requerente">
                <input required class="input-form" type="text" name="status" placeholder="Status">
                <input required class="input-form" type="date" name="date" placeholder="Data de solicitação">
                <!-- <input required class="input-form" type="text" name="data" placeholder="Data de Solicitação dd/mm/aaaa" title="dd/mm/aaaa" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">-->
                <input required class="btn-default" type="submit" value="Salvar">
            </form>
        </section>

    </main>

    <script type="text/javascript" src="./public/js/script.js"></script>
</body>

</html>