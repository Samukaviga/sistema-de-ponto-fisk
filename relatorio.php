<?php 
require_once('header/head.php'); 
require_once('header/header.php'); 
require_once('header/sidebar.php');
require_once('./conexao.php');
require_once('./funcoes/funcoes.php');

$relatorios = buscandoRelatorio($conexao);


	$valor = 0;

 foreach($relatorios as $r){
		$valor += $r['total_valor'];	
 }


?>


<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Relatorio</h3>
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
                                        <option value="1" >1 -Janeiro</option>
                                        <option value="2" >2 - Fevereiro</option>
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
                                            <h4 class="text-end"> Total: R$ <?= $valor; ?>,00 </h4>										
										</div>
									</div>
									<!-- /Page Header -->
								
									<table class="table border-0 star-student table-hover table-center mb-0 table-striped">
    
                                        <thead class="student-thread">
											<tr>
												<th>Nome</th>
												<th>Qtd. Aulas</th>
												<th>Qtd. Horas</th>
												<th>Unidade</th>
												<th>Valor Hora</th>
												<th>Valor Total</th>
										</thead>
										<tbody>
											<?php foreach($relatorios as $relatorio): 
													
													$horasAula = $relatorio['total_registros'] * 2;
											?>
											
											<tr>												
												<td>
													<h2>
														<a><?= $relatorio['nome']; ?></a>
													</h2>
												</td>
												<td><?= $relatorio['total_registros']; ?></td>
												<td><?= $horasAula; ?></td>
												<td><?= $relatorio['nome_unidade']; ?></td>
												<td>R$ <?= $relatorio['valor']; ?>.00</td>
												<td>R$ <?= $relatorio['total_valor']; ?>,00</td>
											
											</tr>
											<?php endforeach; ?>											
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