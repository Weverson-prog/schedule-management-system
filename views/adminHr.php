<?php \Classes\ClassLayoutAgendamento2::setHeadRestrito("manager");   ?>
<?php \Classes\ClassLayoutAgendamento2::setHead('Controle ','controle seus agendamentos'); ?>
<?php include 'calendar_cli/conexao.php';?>
<div class="single">
	<div class="container">
		<br><br><br><br><br>
		<div class="leave-comment" style="font-size:20px;font-family:arial;">
		<b style="font-size:30px; color: black" >Escolha o dia</b>
			<p style="font-size:19px;font-weight: bold; color: black">Clique no dia para administrar os horarios.</p>
			
			<?php
			
			                 $consulta_semana = "SELECT * FROM semana";
                             $result_parametro = $pdo->query($consulta_semana);
                             $rows_parametro = $result_parametro->fetchAll();

                             foreach ($rows_parametro as $key => $value){
								 $id_semana = $value['id_semana'];
								 $dia_semana = $value['dia_semana'];
							     echo "<a href='".DIRPAGE."adminHr2?id_dia_semana=$id_semana&&dia_semana=$dia_semana'>".$dia_semana.'</a><br/><hr/>';
							 }
                            
			?>
			
		</div>
	</div>
	</div>
    <?php \Classes\ClassLayout::setFooter(); ?>