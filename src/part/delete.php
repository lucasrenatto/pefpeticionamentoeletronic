<?php 
    require_once('../../config/connection.php');
    $id = '';
    $pessoa = '';
    $cpf = '';
    $rg = '';
    $orgao_emissor = '';
    $nome = '';
    $genero = '';
    $cep = '';
    $numero = '';
    $complemento = '';
    $participacao = '';
    $estado_civil = '';
    $nacionalidade = '';
    $profissao = '';

    if(!empty($_GET['Codigo'])){
        $codigo = $_GET['Codigo'];
        $sqlSelect = "SELECT * FROM PARTE WHERE Codigo=?";
        $cmd = mysqli_prepare($connection, $sqlSelect);
        mysqli_stmt_bind_param($cmd, 'i', $codigo);
        mysqli_stmt_execute($cmd);
        $result = mysqli_stmt_get_result($cmd);
        if(mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_array($result);
        }
    } else if(!empty($_POST['Codigo'])){
        $id = $_POST['Codigo'];
        $sqlDelete = "DELETE FROM PARTE WHERE Codigo = ?";
        $cmd = mysqli_prepare($connection, $sqlDelete);
        mysqli_stmt_bind_param($cmd,'i',$codigo);
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
        <h4 class="custom-form-title">Editar PARTE única</h4>
        <hr>
        <form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
            <div class="form-group label-floating">
                <label  class="control-label" for="codigo">Código:</label>
                <input type="text" name='codigo' class="form-control" id="codigo" readonly title="Digite o Código" value='<?php echo $data['Codigo'] ?>'>
            </div>
            <div class="form-group label-floating">
                <label  class="control-label" for="nome">Nome:</label>
                <input type="text" name='nome' class="form-control" id="nome" readonly title="Digite o Nome" value='<?php echo $data['Nome'] ?>'>
            </div>
            <div class="form-row">
                <div class="col">
                    <label  class="control-label" for="pessoa">Pessoa:</label>
                    <!-- <input type="text" name='pessoa' class="form-control" id="pessoa" title="Digite a Pessoa"> -->
                    <select id="pessoa" disabled name='pessoa' class="form-control">
                        <option value="F" <?php echo $data['Pessoa'] == 'F' ? 'selected': ''; ?> selected>Física</option>
                        <option value="J" <?php echo $data['Pessoa'] == 'J' ? 'selected': ''; ?>>Jurídica</option>
                    </select>
                </div>
                <div class="col">
                    <div class="form-group label-floating">
                        <label  class="control-label" for="genero">Gênero:</label>
                        <select id="genero" disabled name='genero' class="form-control">
                            <option value=""disabled>Selecione</option>
                            <option value="M" <?php echo $data['Genero'] == 'M' ? 'selected': ''; ?>>Masculino</option>
                            <option value="F" <?php echo $data['Genero'] == 'F' ? 'selected': ''; ?>>Feminino</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group label-floating">
                        <label  class="control-label" for="cpf">CPF:</label>
                        <input type="text" name='cpf'readonly class="form-control" id="cpf" title="Digite o CPF" value='<?php echo $data['CPF'] ?>'>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group label-floating">
                        <label  class="control-label" for="rg">RG:</label>
                        <input type="text" name='rg' readonly class="form-control" id="rg" title="Digite o RG" value='<?php echo $data['RG'] ?>'>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group label-floating">
                        <label  class="control-label" for="orgao_emissor">Órgão emissor:</label>
                        <input type="text" name='orgao_emissor' readonly class="form-control" id="orgao_emissor" title="Digite o órgão emissor" value='<?php echo $data['Orgao_Emissor'] ?>'>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group label-floating">
                        <label  class="control-label" for="cep">CEP:</label>
                        <input type="text" name='cep' readonly class="form-control" id="cep" title="Digite o CEP" value='<?php echo $data['CEP'] ?>'>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group label-floating">
                        <label  class="control-label" for="numero">Número:</label>
                        <input type="text" name='numero' readonly class="form-control" id="numero" title="Digite o Número" value='<?php echo $data['Numero'] ?>'>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group label-floating">
                        <label  class="control-label" for="complemento">Complemento:</label>
                        <input type="text" name='complemento' readonly class="form-control" id="complemento" title="Digite o Complemento" value='<?php echo $data['Complemento'] ?>'>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group label-floating">
                        <label  class="control-label" for="participacao">Participação:</label>
                        <select id="participacao" disabled name='participacao' class="form-control">
                            <option value="">Selecione</option>
                            <?php 
                                $sql = "SELECT * FROM PARTICIPACAO";
                                $response = mysqli_query($connection, $sql);
                                $numRows = mysqli_num_rows($response);
                                if($response && $numRows > 0)
                                {
                                    while ($line = mysqli_fetch_array($response))
                                    {
                                        $id = $line['Codigo'];
                                        $value = $line['Nome'];
                                        if($id == $data['PARTICIPACAO_Codigo']){
                                            echo "<option selected value='$id'>$value</option>";
                                        } else {
                                            echo "<option value='$id'>$value</option>";
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group label-floating">
                        <label  class="control-label" for="estado_civil">Estado Civil:</label>
                        <select id="estado_civil" disabled name='estado_civil' class="form-control">
                            <option value="" selected disabled>Selecione</option>
                            <?php 
                                $sql = "SELECT * FROM ESTADO_CIVIL";
                                $response = mysqli_query($connection, $sql);
                                $numRows = mysqli_num_rows($response);
                                if($response && $numRows > 0)
                                {
                                    while ($line = mysqli_fetch_array($response))
                                    {
                                        $id = $line['Codigo'];
                                        $value = $line['Nome'];
                                        if($id == $data['ESTADO_CIVIL_Codigo']){
                                            echo "<option selected value='$id'>$value</option>";
                                        } else {
                                            echo "<option value='$id'>$value</option>";
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group label-floating">
                        <label  class="control-label" for="nacionalidade">Nacionalidade:</label>
                        <select id="nacionalidade" disabled name='nacionalidade' class="form-control">
                            <option value="" selected disabled>Selecione</option>
                            <?php 
                                $sql = "SELECT * FROM NACIONALIDADE";
                                $response = mysqli_query($connection, $sql);
                                $numRows = mysqli_num_rows($response);
                                if($response && $numRows > 0)
                                {
                                    while ($line = mysqli_fetch_array($response))
                                    {
                                        $id = $line['Codigo'];
                                        $value = $line['Nome'];
                                        if($id == $data['NACIONALIDADE_Codigo']){
                                            echo "<option selected value='$id'>$value</option>";
                                        } else {
                                            echo "<option value='$id'>$value</option>";
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group label-floating">
                        <label  class="control-label" for="profissao">Profissão:</label>
                        <select id="profissao"  disabled name='profissao' class="form-control">
                            <option value="" selected disabled>Selecione</option>
                            <?php 
                                $sql = "SELECT * FROM PROFISSAO";
                                $response = mysqli_query($connection, $sql);
                                $numRows = mysqli_num_rows($response);
                                if($response && $numRows > 0)
                                {
                                    while ($line = mysqli_fetch_array($response))
                                    {
                                        $id = $line['Codigo'];
                                        $value = $line['Nome'];
                                        if($id == $data['PROFISSAO_Codigo']){
                                            echo "<option selected value='$id'>$value</option>";
                                        } else {
                                            echo "<option value='$id'>$value</option>";
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" name='submit' class="btn btn-danger   ">Excluir</button>
            <a href='list.php' class="btn btn-success">Voltar</a>
        </form>
    </div>
    <!-- FIM DO CONTEUDO DA PAGINA -->
    <?php include('../../components/footer.php'); ?>
</body>
</html>