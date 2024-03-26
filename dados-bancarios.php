<?php 

require_once('header/head.php'); 
require_once('header/header.php'); 
require_once('header/sidebar.php');
require_once('./funcoes/funcoes.php');

$banco = buscandoBanco($_SESSION['id'], $conexao);


?>


<!-- Page Wrapper -->
<div class="page-wrapper">
                <div  class="content container-fluid">

                         <!-- Page Header -->
                         <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Dados Bancarios</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dados</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
								    <div class="student-personals-grp">
										<div class="card mb-0">
											<div class="card-body">
											
												<div class="hello-park">

													<h5>Banco:<?= $banco ==! 0 ? $banco[0]['banco'] : ' --'; ?></h5>
												</div>
												<div class="hello-park">
													<div class="educate-year">
														<h6 class="fs-5">Tipo conta:</h6>
														<p class="fs-6"><?= $banco ==! 0 ? $banco[0]['tipo_conta'] : '--' ; ?></p>
													</div>
													<div class="educate-year">
														<h6 class="fs-5">Agencia</h6>
														<p class="fs-6"><?= $banco ==! 0 ? $banco[0]['agencia'] : '--'; ?></p>
													</div>
													<div class="educate-year">
														<h6 class="fs-5">Conta</h6>
														<p class="fs-6"><?= $banco ==! 0 ? $banco[0]['conta'] : '--'; ?></p>
													</div>
													<div class="educate-year">
														<h6 class="fs-5">Pix</h6>
														<p class="fs-6"><?= $banco ==! 0 ? $banco[0]['pix'] : '--'; ?></p>
													</div>
                                                    <div class="educate-year">
                                                        <div class="student-submit">
                                                            <a href="./dados-bancarios-add.php" class="btn btn-primary">Adicionar agora</a>
                                                        </div>
                                                    </div>
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