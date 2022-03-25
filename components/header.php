<script>
    $( document ).ready(function() {
        $('.leftmenutrigger').on('click', function(e) {
        $('.side-nav').toggleClass("open");
        e.preventDefault();
        });
    });
</script>
<div id="wrapper" class="animate">
    <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark">
        <span class="navbar-toggler-icon leftmenutrigger"></span>
        <a class="navbar-brand" href="index.php"><img src="/resources/img/logo.png" alt="P.E.F" height="30px"></a>
        <span class="navbar-brand">PETICIONAMENTO ELETRÔNICO FACIL</span>
        <button id='btnToggle' class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav animate side-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo DEFAULT_URL;?>index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <div style="display: flex; align-items: center; font: small-caption; padding-left: 10px;">
                        <hr style="
                        background-color: black;
                        width: 25%;
                        margin-left: 0;
                        margin-right: 10px;
                    "> Cadastros
                        <hr style="
                        background-color: black;
                        width: 30%;
                        margin-left: 0;
                        margin-left: 10px;
                    ">
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo DEFAULT_URL;?>src/civil_state/list.php">ESTADO CIVIL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo DEFAULT_URL;?>src/class_process/list.php">CLASSE DE PROCESSO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo DEFAULT_URL;?>src/competence/list.php">COMPETÊNCIA</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?php echo DEFAULT_URL;?>src/document/list.php">DOCUMENTO ÚNICO</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo DEFAULT_URL;?>src/documents/list.php">DOCUMENTOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo DEFAULT_URL;?>src/forum/list.php">FORO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo DEFAULT_URL;?>src/nacionality/list.php">NACIONALIDADE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo DEFAULT_URL;?>src/occupation/list.php">PROFISSAO</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?php echo DEFAULT_URL;?>src/part/list.php">PARTE ÚNICA</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo DEFAULT_URL;?>src/participation/list.php">PARTICIPAÇÕES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo DEFAULT_URL;?>src/subject_matter/list.php">ASSUNTO PRINCIPAL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo DEFAULT_URL;?>src/type/list.php">TIPOS</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-md-auto d-md-flex">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Home
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Top Menu Items</a>
                </li> -->
            </ul>
            <ul class="navbar-nav navbar-right">
            <li class="nav-item">
                <form class="search" method="GET" action='/search_result.php'>
                    <div class="search__wrapper">
                        <input type="text" name="q" placeholder="Consultar petição" class="search__field">
                        <button type="submit" class="fa fa-search search__icon"></button>
                    </div>
                </form>
                </li> 
                <li class="dropdown">
                    <a class='btn btn-info' style="min-width: 100px!important;" id='textLoginLogout' class="dropdown-toggle" data-toggle="dropdown">Entrar</a>
                    <div style="display:none;" id='textLoginLogoutImage'>
                        <img height="40" style="margin: 10px;" src='/resources/img/obama.png'></img>
                    </div>
                    <ul class="dropdown-menu" style="padding: 15px;min-width: 250px; left: -165px;">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                    <div class="form-group label-floating">
                                        <label class="sr-only" for="oab">Nº OAB</label>
                                        <input type="text" class="form-control" id="oab" placeholder="Nº OAB" required>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="sr-only" for="cpf">CPF</label>
                                        <input type="text" class="form-control" id="cpf" placeholder="CPF" required>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="sr-only" for="password">Senha</label>
                                        <input type="password" class="form-control" id="password" placeholder="Senha" required>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox"> Lembrar me
                                        </label>
                                        <i class='fa fa-person'></i>
                                    </div>
                                    <div>
                                        <i class='fa fa-person'></i>
                                    </div>
                                    <div class="form-group label-floating">
                                        <a href='#' class="btn btn-primary btn-block m-0" onclick='onLoginLogout()'>Login</a>
                                        <span style='display: flex; flex: 1; justify-content: center;'>ou</span>
                                        <input class="btn btn-info btn-block m-0" type="button" id="sign-in-google" value="Usar Certificado Digital"> 
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </li> 
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <script>
        //TODO: Alterar
        var flag = true;
        function onLoginLogout(){
            window.localStorage.setItem('user', $('#oab').val() );
            if( flag ){
                $('#textLoginLogout').hide();
                $('#textLoginLogout').click();
                $('#textLoginLogoutImage').show();
                $('.search').css({left: 'calc( 100% - 70px)'});
            } else {
                $('#textLoginLogout').show();
                $('#textLoginLogout').click();
                $('#textLoginLogoutImage').hide();
                $('.search').css({left:'calc( 100% - 123px)'});
            }
            flag = !flag;
        }
    </script>
    <div class="container-fluid">