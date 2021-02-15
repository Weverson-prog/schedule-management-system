<?php \Classes\ClassLayoutAgendamento::setHeadRestrito("user");   ?>
<?php \Classes\ClassLayoutAgendamento::setHead('Agendamento','Agende sua consulta'); ?>
<?php include 'calendar_cli/conexao.php';?>

<div class="single">
	<div class="container">
		<br><br><br><br><br>
		<center>
			
		<div class="leave-comment">

			
			
			
			
		</div>
		<?php include 'calendar_cli/calendario.php';?>
			
	</div>
	</div>   
	</div>


	<div class="single">
	<div class="container">
		<div class="leave-comment" style="font-size:23px;font-family:arial;font-weight: bold;color: Black">
	
			<p style="font-size:16px"><?php //echo $_GET['nome_cliente'];?></p>
			



	
			</div>

			


	</div>
	</div>
	</div>
	<!-- footer part start-->
	
    <?php \Classes\ClassLayout::setFooter(); ?>




