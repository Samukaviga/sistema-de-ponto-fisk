<?php 
	
	$tipo = $_SESSION['tipo'];


?>
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Administrador</span>
							</li>
							<?php if($_SESSION['tipo'] == 1 ): ?>
							<li class="submenu">
								<a href="#"><i class="feather-grid"></i> <span>Administrador</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="./">Revisar</a></li> 	 
									<li><a href="./relatorio.php">Relatório</a></li> 	 
									<li><a href="./relatorio-unidade.php">Relatório por unidade</a></li> 	 
									<li><a href="./cadastro.php">Cadastrar Professor</a></li> 	 
								</ul>
							</li>
							<?php endif; ?> 

							<li class="submenu">
								<a href="#"><i class="feather-grid"></i> <span>Meu Cadastro</span> <span class="menu-arrow"></span></a>
								<ul>
								 
								<li><a href="./meus-dados.php">Meus Dados</a></li> 
								<li><a href="./dados-bancarios.php">Dados Bancarios</a></li> 
					
								</ul>
							</li> 
							<?php if($_SESSION['tipo'] != 1 ): ?>
                                   
                                
								<li class="submenu">
								<a href="#"><i class="feather-grid"></i> <span>Professores</span> <span class="menu-arrow"></span></a>
									<ul>
									<li><a href="./extrato.php">Extrato</a></li> 
									<li><a href="./marcar-horario.php">Marcar horário</a></li> 
						
									</ul>
								</li> 
							<?php endif; ?>
						</ul>
					</div>
                </div>
				
</div>