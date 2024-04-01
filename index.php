<?php 
require_once('header/head.php'); 
require_once('header/header.php'); 
require_once('header/sidebar.php');
require_once('./funcoes/funcoes.php');

session_start();

	if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){
        header("location: ./login.php");
        exit;
    }

	$registros = buscandoRegistros($conexao);

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
		$mes = $_POST['mes'];
		$ano = $_POST['ano'];
	
		$filtro = filtrandoRegistro($conexao, $ano, $mes);
	
	}

?>

<!-- Page Wrapper -->
<div class="page-wrapper">
			<?php if(isset($_SESSION['mensagem.sucesso'])): ?>
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <?= $_SESSION['mensagem.sucesso']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php  unset($_SESSION['mensagem.sucesso']); ?>
            <?php endif; ?>                        
                                              
            <?php if(isset($_SESSION['mensagem.erro'])): ?>
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <?= $_SESSION['mensagem.erro']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php  unset($_SESSION['mensagem.erro']); ?>
            <?php endif; ?>

                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Revisar</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active">Revisar</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="student-group-form mb-4" >
						<form action="./" method="post">
							<div class="row">
								<div class="col-lg-3 col-md-6">  
									<div class="input-block local-forms">
										<label >Mês</label>
										<select name="mes" id="mes" class="form-control" >
											<option value="" >Selecione o mês</option>
											<option value="1" >1 - Janeiro</option>
											<option value="2" >2 - Fevereiro</option>
											<option value="3" >3 - Março</option>
											<option value="4" >4 - Abril</option>
											<option value="5" >5 - Maio</option>
											<option value="6" >6 - Junho</option>
											<option value="7" >7 - Julho</option>
											<option value="8" >8 - Agosto</option>
											<option value="9" >9 - Setembro</option>
											<option value="10" >10 - Outrubro</option>
											<option value="11" >11 - Novembro</option>
											<option value="12" >12 - Dezembro</option>
										</select>
									</div>
								</div>
								<div class="col-lg-3 col-md-6">  
									<div class="input-block local-forms">
										<label >Ano</label>
										<select name="ano" id="ano" class="form-control" >
											<option value="" >Selecione o ano</option>
											<option value="2023" >2023</option>
											<option value="2024" >2024</option>
										</select>
									</div>
								</div>
								<div class="col-lg-2">  
									<div class="search-student-btn">
										<button type="btn" class="btn btn-primary">Filtrar</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-body">
								
									<!-- Page Header -->
									<div class="page-header">
										<div class="row align-items-center">
											
											
										</div>
									</div>
									<!-- /Page Header -->
								
									<table class="table border-0 star-student table-hover table-center mb-0 table-striped">
										<thead class="student-thread">
											<tr>
												
												<th>ID</th>
												<th>Nome</th>
												<th>Dia</th>
												<th>Horário</th>
												<th>Método</th>
												<th>Unidade</th>
												<th>Status</th>
												<th>Ação</th>
											</tr>
										</thead>
										<tbody>
										<?php $i = 0; ?>
										<?php foreach($registros as $registro): ?>
										<tr>
												<td><?= $i; ?></td>
												<td>
													<h2>
														<a><?= $registro['nome_usuario']; ?></a>
													</h2>
												</td>
												<td><?= $registro['data']; ?></td>
												<td><?= $registro['hora_inicio']; ?></td>
												<td><?= $registro['tipo']; ?></td>
												<td><?= $registro['nome_unidade']; ?></td>
												<td><?= $registro['status'] == 0 ? '<span class="badge bg-warning">Em Análise</span>' : ($registro['status'] == 1 ? '<span class="badge bg-success">Aprovado</span>' : '<span class="badge bg-danger">Reprovado</span>'); ?></td>
												<td>
													<div>
														<a href="./funcoes/aprovar.php?id_registro=<?= $registro['id']; ?>" type="button" class="btn btn-outline-success me-1 mb-1" id="type-success">Aprovar</a>
														<a href="./funcoes/reprovar.php?id_registro=<?= $registro['id']; ?>" type="button" class="btn btn-outline-danger me-1 mb-1" id="type-error">Reprovar</a>
													</div>
												</td>
											</tr>
											<?php $i++; endforeach;?>
											
										</tbody>
									</table>
									
								</div>
							</div>							
						</div>					
					</div>					
				</div>
<?php 
require_once('foot/footer.php'); 
?>
    </body>
</html>