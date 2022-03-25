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
    <?php include('../../config/connection.php'); ?>
    <?php include('../../components/header.php'); ?>
    <!-- INICIO DO CONTEUDO DA PAGINA -->
    <div style="margin-top: 85px;">
        <h4 class="custom-form-title">LISTA DE ESTADO CIVIL <span><a class='btn btn-success ml-3' href="insert.php"> Adicionar</a></span></h4>
        <hr>
        <table class="table table-stripped">
            <thead>
                <tr class='table-active'>
                <th scope="col">#</th>
                <th scope="col">Estado Civil</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM ESTADO_CIVIL";
                    $response = mysqli_query($connection, $sql);
                    if( $response )
                    {
                        $numRows = mysqli_num_rows($response);
                        if($numRows > 0)
                        {
                            while ($line = mysqli_fetch_array($response))
                            {
                                $id = $line['Codigo'];
                                $nome = $line['Nome'];
                                echo "<tr>
                                        <th scope='row'>$id</th>
                                        <td>$nome</td>
                                        <td>
                                            <a href='edit.php?Codigo=$id' class='btn btn-info'>Editar</a>
                                            <a href='delete.php?Codigo=$id' class='btn btn-danger'>Excluir</a>
                                        </td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr>
                                    <th colspan='3'> Nenhum regsitro encontrado.</th>
                                </tr>";
                        }
                    } else {
                        echo "<tr>
                                    <th colspan='3'> Nenhum regsitro encontrado.</th>
                                </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <!-- FIM DO CONTEUDO DA PAGINA -->
    <?php include('../../components/footer.php'); ?>
</body>
</html>