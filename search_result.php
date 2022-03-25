<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>P.E.F</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/styles/global.css">
	<link rel="stylesheet" href="/styles/lib.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.13.1/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <?php include('./config/connection.php'); ?>
    <?php include('./components/header.php'); ?>
    <!-- CONTEUDO DA PAGINA -->
    <?php if(!empty($_GET['q'])){?>
        <div style='margin-top: 80px; overflow:auto;'>
            <div class="row">
                <div class="col">
                    <ul class="list-group">
                        <li class='list-group-item  '>
                            <a href="#">Petição nº 12317623183817</a>
                            <p> Descrição breve da petição - lorem ipsum dolor sit amet - 01/08/2020</p>
                        </li>
                        <li class='list-group-item  '>
                            <a href="#">Petição nº 321231221121</a>
                            <p> Descrição breve da petição - lorem ipsum dolor sit amet - 01/06/2020</p>
                        </li>
                        <li class='list-group-item  '>
                            <a href="#">Petição nº 12317623183817</a>
                            <p> Descrição breve da petição - lorem ipsum dolor sit amet - 01/12/2019</p>
                        </li>
                        <li class='list-group-item  '>
                            <a href="#">Petição nº 389729873897298</a>
                            <p> Descrição breve da petição - lorem ipsum dolor sit amet - 01/6/2019</p>
                        </li>
                        <li class='list-group-item  '>
                            <a href="#">Petição nº 8731611615616161</a>
                            <p> Descrição breve da petição - lorem ipsum dolor sit amet - 01/01/2019</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
	<?php } else { ?>
		<h1>Nenhum resultado encontrado para a pesquisa!</h1>
    <?php } ?>
    <script src="/scripts/lib.js" defer type="text/javascript"></script>
</body>
</html>