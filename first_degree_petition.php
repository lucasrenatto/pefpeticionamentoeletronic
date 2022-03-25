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
		                        		Petição Inicial de 1º Grau
		                        	</h3>
									<!-- <h5>This information will let us know more about you.</h5> -->
		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#details" data-toggle="tab">Dados Básicos</a></li>
			                            <li><a href="#captain" data-toggle="tab">Partes e/ou Advogados</a></li>
			                            <li><a href="#description" data-toggle="tab">Anexar Documentos</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="details">
		                            	<div class="row">	
		                                	<div class="col-sm-6">
												<div class="form-group label-floating">
													<label class="control-label">Foro</label>
													<select id="foro" name='foro' class="form-control">
														<option selected disabled></option>
														<?php 
															$sql = "SELECT * FROM FORO";
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
												<div class="form-group label-floating">
													<label class="control-label" for="competencia">Competencia:</label>
													<select id="competencia" name='competencia' class="form-control">
														<option value="" selected disabled></option>
														<?php 
															$sql = "SELECT * FROM COMPETENCIA";
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
												<div class="form-group label-floating">
													<label class="control-label" for="classe_processo">Classe de Processo:</label>
													<select id="classe_processo" name='classe_processo' class="form-control">
														<option value="" selected disabled>	</option>
														<?php 
															$sql = "SELECT * FROM CLASSE_PROCESSO";
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
		                                	<div class="col-sm-6">
												<div class="form-group label-floating">
													<label class="control-label" for="assunto">Assunto Principal:</label>
													<select id="assunto" name='assunto' class="form-control">
														<option value="" selected disabled></option>
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
												<div class="input-group">
													<div class="form-group label-floating">
			                                          	<label class="control-label">Valor da Ação</label>
			                                          	<input name="name" type="number" step='0.01' class="form-control">
			                                        </div>
												</div>
		                                	</div>
		                            	</div>
		                            </div>
		                            <div class="tab-pane" id="captain">
										<div class="form-row">
											<div class="col">
												<div class="form-group label-floating">
													<label class="control-label"  for="nome">Nome:</label>
													<input type="text" name='nome' class="form-control" id="nome">
												</div>
											</div>
											<div class="col">
												<div class="form-group label-floating">
													<label class="control-label" for="participacao">Participação:</label>
													<select id="participacao" name='participacao' class="form-control">
														<option value=""></option>
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
																	echo "<option value='$id'>$value</option>";
																}
															}
														?>
													</select>
												</div>
											</div>
										</div>
										<div class="form-row">
										<div class="col">
												<div class="form-group label-floating">
													<label class="control-label" for="pessoa">Pessoa:</label>
													<!-- <input type="text" name='pessoa' class="form-control" id="pessoa" > -->
													<select id="pessoa" name='pessoa' class="form-control">
														<option value="F" selected>Física</option>
														<option value="J">Jurídica</option>
													</select>
												</div>	
											</div>
											<div class="col">
												<div class="form-group label-floating">
													<label class="control-label" for="cpf">CPF:</label>
													<input type="text" name='cpf' class="form-control" id="cpf">
												</div>
											</div>
											<div class="col">
												<div class="form-group label-floating">
													<label class="control-label" for="rg">RG:</label>
													<input type="text" name='rg' class="form-control" id="rg">
												</div>
											</div>
										</div>
										<div class="form-row">
										<div class="col">
												<div class="form-group label-floating">
													<label class="control-label" for="orgao_emissor">Órgão emissor:</label>
													<input type="text" name='orgao_emissor' class="form-control" id="orgao_emissor">
												</div>
											</div>
											<div class="col">
												<div class="form-group label-floating">
													<label class="control-label" for="genero">Gênero:</label>
													<select id="genero" name='genero' class="form-control">
														<option value="" selected disabled></option>
														<option value="M">Masculino</option>
														<option value="F">Feminino</option>
													</select>
												</div>
											</div>
											<div class="col">
												<div class="form-group label-floating">
													<label class="control-label" for="estado_civil">Estado Civil:</label>
													<select id="estado_civil" name='estado_civil' class="form-control">
														<option value="" selected disabled></option>
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
																	echo "<option value='$id'>$value</option>";
																}
															}
														?>
													</select>
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="col">
												<div class="form-group label-floating">
													<label class="control-label" for="nacionalidade">Nacionalidade:</label>
													<select id="nacionalidade" name='nacionalidade' class="form-control">
														<option value="" selected disabled></option>
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
																	echo "<option value='$id'>$value</option>";
																}
															}
														?>
													</select>
												</div>
											</div>
											<div class="col">
												<div class="form-group label-floating">
													<label class="control-label" for="profissao">Profissão:</label>
													<select id="profissao" name='profissao' class="form-control">
														<option value="" selected disabled></option>
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
																	echo "<option value='$id'>$value</option>";
																}
															}
														?>
													</select>
												</div>
											</div>
										</div>
										<div class="form-row">
												<div class="col">
													<div class="form-group label-floating">
														<label class="control-label" for="cep">CEP:</label>
														<input type="text" name='cep' class="form-control" id="cep" onblur='consultaCep(event)'>
													</div>
												</div>
												<div class="col">
													<div class="form-group label-floating">
														<label class="control-label" for="numero">Número:</label>
														<input type="text" name='numero' class="form-control" id="numero">
													</div>
												</div>
												<div class="col">
													<div class="form-group label-floating">
														<label class="control-label" for="complemento">Complemento:</label>
														<input type="text" name='complemento' class="form-control" id="complemento">
													</div>
												</div>
										</div>
										<div>
											<label id='cityInfo'></label>
										</div>
		                            </div>
		                            <div class="tab-pane" id="description">
										<div class="col">
											<div class="form-group label-floating">
												<label class="control-label" for="genero">Selecione o Certificado que dese autilizar:</label>
												<select id="genero" name='genero' class="form-control">
													<option value="" selected disabled></option>
													<option value="1">THIAGO BARDEZ - Validade 01/07/2021</option>
													<option value="2">LUCAS ZANON - Validade 31/12/2021</option>
												</select>
											</div>
										</div>
										<div class="col">
											<div class="form-group label-floating">
												<label class="control-label" for="genero">Selecione o tipo de documento:</label>
												<select id="arquivo" name='arquivo' class="form-control">
													<option value="" selected disabled></option>
													<?php 
														$sql = "SELECT * FROM TIPO";
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
										<div class="col">
											<!-- <div class="form-group label-floating"> -->
												<button class="btn btn-info" onclick="anexo(event)">Anexar</button>
												<input hidden='true' id='file' type="file" onchange="inputClick()" name='Arquivo' id="Arquivo">
											<!-- </div> -->
										</div>
										<div class="col">
											<div class="form-group label-floating">
												<label class="control-label" for="genero">Lista de documentos anexos:</label>
												<textarea rows="3" class="form-control" id="anexos"></textarea>
											</div>
										</div>
		                            </div>
		                        </div>
	                        	<div class="wizard-footer">
	                            	<div class="pull-right">
	                                    <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Próximo' />
	                                    <input type='button' onclick='enviarPeticao()' class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' value='Finalizar' />
	                                </div>
	                                <div class="pull-left">
	                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Anterior' />
	                                </div>
	                                <div class="clearfix"></div>
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