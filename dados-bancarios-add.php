<?php 
require_once('./conexao.php');
require_once('header/head.php'); 
require_once('header/header.php'); 
require_once('header/sidebar.php');
require_once('./funcoes/funcoes.php');

$banco = buscandoBanco($_SESSION['id'], $conexao);
 

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
                            <h3 class="page-title">Adicionar Dados Bancarios</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dados</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
            
                <div class="row">
                    <div class="col-sm-12">
                    
                        <div class="card">
                            <div class="card-body">
                                <form action="./funcoes/addDadosBancarios.php" method="post">
                                    <div class="row p-2 settings-form">

                                        <div class="col-12 col-sm-8 m-4">
												<p class="pay-cont">Eu sou titular da conta</p>
												
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="titular" id="gender_male" value="1" checked>
															<label class="form-check-label" for="gender_male">
															Sim
															</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="titular" id="gender_female" value="0" <?= ($banco ==! 0 && $banco[0]['titular'] == 0) ? 'checked' : '' ?>>
															<label class="form-check-label" for="gender_female">
															Não
															</label>
														</div>
													
										</div> 
                        
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label >Parentesco</label>
                                                <select name="parentesco" id="parentesco" class="form-control" >
                                                    <option value="<?= $banco ==! 0 ? $banco[0]['parentesco'] : '' ?>" ><?= $banco ==! 0 ? $banco[0]['parentesco'] : 'Selecione' ?></option>
                                                    <option value="Pai/Mae" >Pai / Mae</option>
                                                    <option value="Esposo(a)" >Esposo(a)</option>
                                                    <option value="Outro" >Outro</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Nome completo do titular</label>
                                                <input type="text" name="nome" id="nome" value="<?= $banco ==! 0 ? $banco[0]['nome_titular'] : '' ?>" maxlength="50" class="form-control">
                                            </div> 
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>CPF do titular da conta</label>
                                                <input type="text" name="cpf" value="<?= $banco ==! 0 ? $banco[0]['cpf'] : '' ?>" id="cpf" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label >Tipo de conta</label>
                                                <select name="tipo_conta" id="tipo_conta" class="form-control" >
                                                    <option value="<?= $banco ==! 0 ? $banco[0]['tipo_conta'] : '' ?>" ><?= $banco ==! 0 ? $banco[0]['tipo_conta'] : '' ?></option>
                                                    <option value="Corrente" >Corrente</option>
                                                    <option value="Poupanca" >Pupança</option>
                                                    <option value="Salario" >Salário</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                           
                                                
                                                <label >Banco</label>
                                                <select name="nome-banco" id="banco" class="form-control" >
                                                                <option value="<?= $banco ==! 0 ? $banco[0]['banco'] : '' ?>"  ><?= $banco ==! 0 ? $banco[0]['banco'] : 'Selecione' ?></option>                                                                <option  value="Banco BMG S.A.">Banco Bmg S.a.</option>
                                                                <option  value="Banco Bradesco S.A.">Banco Bradesco S.a.</option>
                                                                <option  value="Banco C6 S.A.">Banco C6 S.a.</option>
                                                                <option  value="Banco do Brasil S.A.">Banco Do Brasil S.a.</option>
                                                                <option  value="Banco Inter S.A.">Banco Inter S.a.</option>
                                                                <option  value="BANCO SANTANDER (BRASIL) S.A.">Banco Santander (Brasil) S.a.</option>
                                                                <option  value="Caixa Econômica Federal">Caixa Econômica Federal</option>
                                                                <option  value="ITAÚ UNIBANCO S.A.">Itaú Unibanco S.a.</option>
                                                                <option  value="MERCADOPAGO.COM REPRESENTACOES LTDA.">Mercadopago.com Representacoes Ltda.</option>
                                                                <option  value="Nu Pagamentos S.A.">Nu Pagamentos S.a.</option>
                                                                <option  value="Pagseguro Internet S.A.">Pagseguro Internet S.a.</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Agência</label>
                                                <input type="text" name="agencia" value="<?= $banco ==! 0 ? $banco[0]['agencia'] : '' ?>" id="agencia" maxlength="10" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Conta</label>
                                                <input type="text" name="conta" value="<?= $banco ==! 0 ? $banco[0]['conta'] : '' ?>" id="conta" maxlength="10" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label >Chave Pix</label>
                                                <select name="tipo_pix" id="tipo_pix" class="form-control" >
                                                    <option value="<?= $banco ==! 0 ? $banco[0]['tipo_pix'] : '' ?>" ><?= $banco ==! 0 ? $banco[0]['tipo_pix'] : 'Selecione' ?></option>
                                                    <option value="Corrente" >CPF / CNPJ</option>
                                                    <option value="Poupanca" >Celular</option>
                                                    <option value="Salario" >E-mail</option>
                                                    <option value="Salario" >Aleatório</option> 
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Pix</label>
                                                <input type="text" name="pix" value="<?= $banco ==! 0 ? $banco[0]['pix'] : '' ?>" id="pix" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-12 m-3">
                                            <div class="student-submit">
                                                <button type="submit" class="btn btn-primary">Concluir</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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