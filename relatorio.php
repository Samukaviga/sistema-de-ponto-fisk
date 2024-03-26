<?php 
require_once('header/head.php'); 
require_once('header/header.php'); 
require_once('header/sidebar.php');
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
                                        <option value="BIANCA" >1 -Janeiro</option>
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
                                            <h4 class="text-end"> Total: R$ 200,00 </h4>										
										</div>
									</div>
									<!-- /Page Header -->
								
									<table class="table border-0 star-student table-hover table-center mb-0 table-striped">
    
                                        <thead class="student-thread">
											<tr>
												<th>Nome</th>
												<th>Qtd. Aulas</th>
												<th>Qtd. Horas</th>
												<th>Valor Hora</th>
												<th>Valor Total</th>
										</thead>
										<tbody>
											<tr>												
												<td>
													<h2>
														<a>Samuel Gomes</a>
													</h2>
												</td>
												<td>32</td>
												<td>16</td>
												<td>R$ 15.00</td>
												<td>R$ 960,00</td>
											
											</tr>											
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