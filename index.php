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
        <div class="image-container set-full-height" style="background-image: url('/resources/img/book_bg.jpg')">

	    <!--   Big container   -->
	    <div class="container-fluid">
	        <div class="row" style='display: flex; justify-content: center;'>
		        <div class="col-sm-8 col-sm-offset-2">
		            <!-- Wizard container -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="red" id="wizard">
		                    <form action="" method="">
		                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        		Bem vindo ao sistema de Peticionamento Eletrônico Fácil
		                        	</h3>
									<h5>Aqui vai a descrição do sistema.</h5>
									<br>
									<h6>Escolha uma das opções abaixo</h6>
									<div class='flex-center-row'>
										<a href='first_degree_petition.php' class='btn btn-primary btn-fill btn-default btn-wd' name='pt_ini'>Criar Petição Inicial de 1º grau</a>
										<a href='first_degree_inter_petition.php' class='btn btn-primary btn-fill btn-default btn-wd' name='pt_inter'>Criar Petição Intermediária de 1º grau</a>
									</div>
		                    	</div>	
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div> <!-- row -->
		</div> <!--  big container -->

	    <?php include('./components/footer.php'); ?>
	</div>
    <script src="/scripts/lib.js" defer type="text/javascript"></script>
</body>
</html>