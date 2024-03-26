<?php 
require_once('header/head.php'); 
require_once('header/header.php'); 
require_once('header/sidebar.php');
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
                            <h3 class="page-title">Cadastrar Professor</h3>
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
                                <form action="./funcoes/cadastrarProfessor.php" method="post">
                                    <div class="row p-2">
                                       
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Nome Completo</label>
                                                <input type="text" name="nome" id="nome" maxlength="50" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Email </label>
                                                <input type="text" name="email" id="email" maxlength="30" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Senha</label>
                                                <input maxlength="20" name="senha" id="senha" type="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Confirmar Senha</label>
                                                <input maxlength="20" name="confirmar-senha" id="senha" type="password" class="form-control">
                                            </div>
                                        </div>
                
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Valor p/ hora</label>
                                                <input name="valor" id="valor" maxlength="5" type="number" class="form-control" >
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