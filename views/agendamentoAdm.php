<?php \Classes\ClassLayoutAgendamento2::setHeadRestrito("manager");   ?>
<?php \Classes\ClassLayoutAgendamento2::setHead('Agendamento','Agende sua consulta'); ?>
<?php include 'calendar_cli/conexao.php';?>

<div class="single">
	<div class="container">
		<br><br><br><br><br>
		<div class="leave-comment">
		<center><b style="font-size:30px;" >Calendário</b></center>

			
			<?php 
			include DIRREQ.'controllers/controllerCalendario.php';
			?>
			
		</div>
	</div>
	</div>
    
	</div>

<?php \Classes\ClassLayout::setFooter(); ?>



