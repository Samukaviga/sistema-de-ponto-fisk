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
                            <h3 class="page-title">Marcar Ponto</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Marcar Ponto</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
            
                <div class="row">
                    <div class="col-sm-12">
                    
                        <div class="card">
                            <div class="card-body">
                                <form action="./funcoes/marcarPonto.php" method="post" >
                                    <div class="row p-2">
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Data da aula </label>
                                                <input type="date" name="data" id="data" class="form-control" placeholder="DD-MM-YYYY">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Horario de inicio</label>
                                                <input type="time" name="horario-inicio" id="horario_inicio" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Horario de fim</label>
                                                <input type="time" name="horario-fim" id="horario_fim" readonly class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label >Método</label>
                                                <select name="metodo" id="metodo" class="form-control" >
                                                    <option value="" >Selecione</option>
                                                    <option value="Presencial" >Presencial</option>
                                                    <option value="Online" >Online</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Observacao</label>
                                                <textarea type="text" class="form-control" maxlength="100" name="observacao" id="observacao" cols="10" rows="5" placeholder="Observações..." ></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 m-3">  
                                            <div class="input-block local-forms">
                                                <label >Unidade</label>
                                                <select name="unidade" id="unidade" class="form-control" >
                                                    <option value="" >Selecione</option>
                                                    <option value="3" >Fisk Itaquaquecetuba</option>
                                                    <option value="2" >Fisk Suzano</option>
                                                    <option value="1" >Fisk Poa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 m-3">
                                            <div class="student-submit">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
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