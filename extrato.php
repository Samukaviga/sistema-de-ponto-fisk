<?php 
require_once('header/head.php'); 
require_once('header/header.php'); 
require_once('header/sidebar.php');
require_once('./funcoes/funcoes.php');

$registros = buscandoRegistrosProfessor($_SESSION['id'], $conexao);

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
								<h3 class="page-title">Extrato</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active">Relatorio</li>
								</ul>
							</div>
						</div>
					</div>

                    
					<!-- /Page Header -->
					
					<div class="student-group-form mb-4" >
						<div class="row">
							<div class="col-lg-2 col-md-6">  
								<div class="input-block local-forms">
									<label >Mês</label>
									<select name="professor" id="professor" class="form-control" >
                            			<option value="" >Selecione o mês</option>
                                        <option value="BIANCA" >1 - Janeiro</option>
                                        <option value="CARLOS" >2 - Fevereiro</option>
                           			 </select>
								</div>
							</div>
							<div class="col-lg-2 col-md-6">  
								<div class="input-block local-forms">
									<label >Ano</label>
									<select name="professor" id="professor" class="form-control" >
                            			<option value="" >Selecione o ano</option>
                                        <option value="BIANCA" >2023</option>
                                        <option value="CARLOS" >2024</option>
                           			 </select>
								</div>
							</div>
							<div class="col-lg-6">  
								<div class="search-student-btn">
									<button type="btn" class="btn btn-primary">Filtrar</button>
								</div>
							</div>
                          
						</div>
					</div>
				
					<div class="row">
                            
						<div class="col-sm-12">

							<div class="card card-table">
								<div class="card-body">
								
									<!-- Page Header -->
									<div class="page-header">
										<div class="row align-items-end pe-2">                                       
                                            <h4 class=" page-title text-start"> Extrato horas - <?= $_SESSION['nome']; ?> </h4>										
										</div>
									</div>
									<!-- /Page Header -->
								
									<table class="table border-0 star-student table-hover table-center mb-0 table-striped">
    
                                        <thead class="student-thread">
											<tr>
												<th>Dia</th>
												<th>horario</th>
												<th>Método</th>
												<th>Unidade</th>
												<th>Status</th>
										</thead>
										<tbody>
											<?php $i = 0; ?>
											<?php foreach($registros as $registro): ?>	
											<tr>												
												<td><?= $registro['data']; ?></td>
												<td><?= $registro['hora_inicio']; ?></td>
												<td><?= $registro['tipo']; ?></td>
												<td><?= $registro['nome']; ?></td>
												<td><?= $registro['status'] == 0 ? '<span class="badge bg-warning">Em Análise</span>' : ($registros[$i]['status'] == 2 ? '<span class="badge bg-danger">Reprovado</span>' : '<span class="badge bg-success">Success</span>'); ?></td>						
											</tr>											
											<?php $i++; endforeach; ?>	
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