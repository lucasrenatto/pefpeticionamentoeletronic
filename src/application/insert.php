<?php 
    require_once('../../config/connection.php');
    $valor = '';
    $assunto = '';
    if(!empty($_POST['Valor'])){
        $valor=$_POST['Valor'];
        $assunto=$_POST['assunto'];
        $sqlInsert = "INSERT INTO PETICAO_INICIAL_PRIMEIRO_GRAU (Valor_Acao, ASSUNTO_PRINCIPAL_Codigo) VALUES (?, ?)";
        $cmd = mysqli_prepare($connection, $sqlInsert);
        mysqli_stmt_bind_param($cmd,'ss',$valor,$assunto);
        mysqli_stmt_execute($cmd);
        $err = mysqli_stmt_error_list($cmd);
        if( count($err) > 0 ) {
            echo mysqli_stmt_error($cmd);
        } else {
            header("location: list.php");
        }
    }
?>
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
    <?php include('../../components/header.php'); ?>
    <!-- INICIO DO CONTEUDO DA PAGINA -->
    <div style="margin-top: 85px;">
        <h4 class="custom-form-title">CADASTRO DE petição inicial de 1º grau</h4>
        <hr>
        <form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
            <div class="form-row">
                <div class="col">
                    <div class="form-group label-floating">
                        <label  class="control-label" for="Valor">Valor:</label>
                        <input type="text" name='Valor' class="form-control" id="Valor" title="Digite o Valor">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group label-floating">
                        <label  class="control-label" for="assunto">Assunto Principal:</label>
                        <select id="assunto" name='assunto' class="form-control">
                            <option value="" selected disabled>Selecione</option>
                            <?php 
                                $sql = "SELECT * FROM ASSUNTO_PRINCIPAL";
                                $response = mysqli_query($connection, $sql);
                                $numRows = mysqli_num_rows($response);
                                if($response && $numRows > 0)
                                {
                                    while ($line = mysqli_fetch_array($response))
                                    {
                                        $id = $line['Codigo'];
                                        $value = $line['Nome'];
                                        echo "<option value='$id'>$value</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" name='submit' class="btn btn-primary">Cadastrar</button>
            <a href='list.php' class="btn btn-success">Voltar</a>
        </form>
    </div>
    <!-- FIM DO CONTEUDO DA PAGINA -->
    <?php include('../../components/footer.php'); ?>
</body>
</html>