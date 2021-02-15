<?php \Classes\ClassLayoutAgendamento2::setHeadRestrito("manager");   ?>
<?php \Classes\ClassLayoutAgendamento2::setHead('Controle ','controle seus agendamentos'); ?>
<?php include 'calendar_cli/conexao.php';?>

<div class="single">
	<div class="container">
		<br><br><br><br><br>
		<div class="leave-comment" style="font-size:20px;font-family:arial;">
			<b style="font-size:30px; color: black" >Administrar clientes</b>

			<p>
			<form action="" method="get" enctype="multipart/form-data">
            <input type="text" name="nome" placeholder="Buscar por nome" style="margin-left: 0px;width: 180px;height: 30px;" required="required"/>
            <input type="submit" value="Buscar" style="width: 140px;height: 45px;line-height: 0;height: 30px; border-radius: 15px"/>
            </form>
			</p>
			<p style="font-size:19px"><input type="submit" value="Novo cliente" onclick="location.href='cadastro2'" style="border-radius: 15px;width: 180px;height: 45px;line-height: 0;height: 30px;"/></p>
			<p style="font-size:19px;font-weight: bold; color: black">Clique no cliente para administrar.</p>

			
			<?php 
			
			 $consulta_cliente = "SELECT * FROM users order by nome ASC";

			 if(isset($_GET['nome'])){
				$consulta_cliente = "SELECT * FROM users where nome like '%".$_GET['nome']."%' order by nome ASC";
			 }
			

            $result_parametro = $pdo->query($consulta_cliente);
            $rows_parametro = $result_parametro->fetchAll();

                            foreach ($rows_parametro as $key => $value){
								
								 $id_cliente = $value['id'];
								 $nome_cliente = $value['nome'];
								 $email_cliente = $value['email'];
								 //mostrar todos os usuários com id diferente do id do admin
								 if($id_cliente != '1'){
									
								
								 //$dia_semana = $linha_cliente['dia_semana'];
								 
							     echo "<a href='".DIRPAGE."adminClientes?id_cliente=$id_cliente&&nome_cliente=$nome_cliente'>".$nome_cliente.'</a>
								 <form action="controllers/controllerOperacao" method="get" enctype="multipart/form-data" style="float: right;">
								 <input type="hidden" name="email_cliente" value="'.$email_cliente.'" />
								 <input type="hidden" name="id_cliente" value="'.$id_cliente.'" />
								 <input type="submit" value="Marcar horário" style="width: 180px; border-radius: 15px;height: 45px;line-height: 0;height: 30px;"/>
								 </form>
								 <br/><hr/>';
							 }}
							
			?>
			
		</div>
	</div>
	</div>

<?php \Classes\ClassLayout::setFooter(); ?>