<?php \Classes\ClassLayoutAgendamento2::setHeadRestrito("manager");   ?>
<?php \Classes\ClassLayoutAgendamento2::setHead('Controle ','controle seus agendamentos'); ?>
<?php include 'calendar_cli/conexao.php';

?>
<div class="single">
	<div class="container">
		<br><br><br><br><br>
		<div class="leave-comment" style="font-size:20px;font-family:arial;">
			<h3>Perfil de Usuários</h3>
			
			<?php
			
			 $consulta_cli = "SELECT * FROM users where id = '".$_GET['id_cliente']."'";
            $result_cli = $pdo->query($consulta_cli);
            $rows_cli = $result_cli->fetchAll();

            foreach ($rows_cli as $key => $value){
				echo "<p style=\"font-size:20px;margin: .1em 0 0.5em;\">Nome - ".$value['nome'].'</p>';

				 echo "<p style=\"font-size:20px;margin: .1em 0 0.5em;\">Tel - ".$value['telCelular'].'</p>';
				 echo"<p style=\"font-size:20px;margin: .1em 0 0.5em;\">Email - ". $value['email'].'</p>';
				 echo"<p style=\"font-size:20px;margin: .1em 0 0.5em;\">CPF - ". $value['cpf'].'</p>';
				 echo"<p style=\"font-size:20px;margin: .1em 0 0.5em;\">Data de Nascimento - ". $value['dataNascimento'].'</p>';
				 echo"<p style=\"font-size:20px;margin: .1em 0 0.5em;\">Estado - ". $value['status'].'</p>';

				  
			  }
			  $status = $value['status'];
			  $id_cliente = $value['id'];
			  echo"<a href='".DIRPAGE."alterarAdm?id_cliente=$id_cliente' class='btn_2'>Alterar Dados</a>\n";
			 	if($status == "Ativo"){
			  echo"<a href='".DIRPAGE."desativar?id_cliente=$id_cliente' class='btn-danger'>Desativar Usuário</a>\n";
				 }else{
					echo"<a href='".DIRPAGE."ativar?id_cliente=$id_cliente' class='btn-danger'>Ativar Usuário</a>\n";

				 }
			  echo '<hr/>';

			
			 $consulta_dia = "SELECT * FROM dia where id_user = '".$_GET['id_cliente']."' ORDER BY dia_dia,mes_mes,ano_ano,hora_cliente ASC";

            $result_dia = $pdo->query($consulta_dia);
            $rows_dia = $result_dia->fetchAll();

            foreach ($rows_dia as $key => $value){
								 $dia_dia = $value['dia_dia'];
								 $mes_mes = $value['mes_mes'];
								 $ano_ano = $value['ano_ano'];
								 $hora_cliente = $value['hora_cliente'];
								 //$dia_semana = $value['dia_semana'];
								 echo $dia_dia.'/'.$mes_mes.'/'.$ano_ano.' | Hora : '.$hora_cliente.' <br/><hr/>';
								
								}
			
			?>
			
		</div>
	</div>
	</div>
    <?php \Classes\ClassLayout::setFooter(); ?>