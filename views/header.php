<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Breakfast</title>
        <!-- UI JQUERY -->
        <link href="<?= URL ?>public/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= URL ?>public/css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= URL ?>public/css/jquery-ui.theme.min.css" rel="stylesheet" type="text/css"/>

        <!-- Bootstrap Core CSS -->
        <link href="<?= URL ?>public/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?= URL ?>public/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?= URL ?>public/dist/css/sb-admin-2.css" rel="stylesheet">
        <!-- <link href="<?php // URL    ?>public/css/estiloProjeto.css" rel="stylesheet"> Só me atrapalhou FDP  -->

        <!-- Custom Fonts -->
        <link href="<?= URL ?>public/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="https://use.fontawesome.com/df465f0d7b.js"></script>

        <!-- UI JQUERY -->
        <link href="<?= URL ?>public/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= URL ?>public/css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= URL ?>public/css/jquery-ui.theme.min.css" rel="stylesheet" type="text/css"/>
        <script src="<?= URL ?>public/js/jwifi.js" type="text/javascript"></script>
        <!-- DataTables CSS -->
        <link href="<?= URL ?>public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="<?= URL ?>public/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <!-- Dialog Mensagem -->
        <link href="<?= URL ?>public/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css"/>

        <!-- Mascara Telefone -->
        <script type="text/javascript">
            /* Máscaras ER */
            function mascara(o, f) {
                v_obj = o
                v_fun = f
                setTimeout("execmascara()", 1)
            }
            function execmascara() {
                v_obj.value = v_fun(v_obj.value)
            }
            function mtel(v) {
                v = v.replace(/\D/g, "");             //Remove tudo o que não é dígito
                v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
                v = v.replace(/(\d)(\d{4})$/, "$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
                return v;
            }
            function id(el) {
                return document.getElementById(el);
            }
            window.onload = function () {
                id('telefonefixo').onkeypress = function () {
                    mascara(this, mtel);
                }
                id('telefonecelular').onkeypress = function () {
                    mascara(this, mtel);
                }
            }
        </script>
       

        <?php
        if (isset($this->js)) {
            foreach ($this->js as $js) {
                echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
            }
        }
        ?>   



    </head>

    <body>

        <div id="wrapper">
