<?php 
    require_once('header/head.php'); 
    require_once('header/header.php'); 
    require_once('header/sidebar.php');
    require_once('./funcoes/funcoes.php');

    $usuario = buscandoUsuario($_SESSION['id'], $conexao);
    
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
                            <h3 class="page-title">Complete seus dados</h3>
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
                                <form action="./funcoes/meuCadastro.php" method="post">
                                    <div class="row p-2">
                                       
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Nome Completo </label>
                                                <input type="text" name="nome" value = "<?= $usuario[0]['nome']; ?>" id="nome" maxlength="50" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>CPF </label>
                                                <input maxlength="20" name="cpf" id="cpf" value="<?= $usuario[0]['cpf'] ? $usuario[0]['cpf'] : ''?>" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Data Nascimento </label>
                                                <input type="date" name="nascimento" id="nascimento" value="<?= $usuario[0]['nascimento'] ? date("Y-m-d", strtotime($usuario[0]['nascimento'])) : ''; ?>" class="form-control" placeholder="DD-MM-YYYY">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Whatsapp</label>
                                                <input name="whatsapp" telefone="whatsapp" id="whatsapp" value="<?= $usuario[0]['celular'] ? $usuario[0]['celular'] : '' ?>" class="form-control datetimepicker" type="text" >
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Email </label>
                                                <input type="text" name="email" id="email" value="<?= $usuario[0]['email'] ? $usuario[0]['email'] : '' ?>" maxlength="30" class="form-control" >
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

                        <div class="card">
                            <div class="card-body">
                            
                                <div class="row align-items-center mb-2 ms-3 ">                                       
                                    <h4 class="page-title"> Endereço </h4>										
                                </div>

                                <form action="./funcoes/meuEndereco.php" method="post">
                                    <div class="row p-2">
                                       
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>CEP </label>
                                                <input name="cep" id="cep" value="<?= $usuario[0]['cep'] ? $usuario[0]['cep'] : '' ?>" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Endereço </label>
                                                <input name="rua" id="rua" value="<?= $usuario[0]['endereco'] ? $usuario[0]['endereco'] : '' ?>" type="text" maxlength="50" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Número </label>
                                                <input name="numero" id="numero" value="<?= $usuario[0]['numero'] ? $usuario[0]['numero'] : '' ?>" type="text" class="form-control"  >
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Complemento</label>
                                                <input name="complemento" id="compl" value="<?= $usuario[0]['complemento'] ? $usuario[0]['complemento'] : '' ?>" maxlength="50" class="form-control datetimepicker" type="text" >
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Bairro </label>
                                                <input name="bairro" id="bairro" value="<?= $usuario[0]['bairro'] ? $usuario[0]['bairro'] : '' ?>" type="text" maxlength="50" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Cidade </label>
                                                <input name="cidade" id="cidade" value="<?= $usuario[0]['cidade'] ? $usuario[0]['cidade'] : '' ?>" type="text" maxlength="50" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Estado</label>
                                                <input name="uf" id="uf" value="<?= $usuario[0]['estado'] ? $usuario[0]['estado'] : '' ?>" type="text" maxlength="15" class="form-control" >
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