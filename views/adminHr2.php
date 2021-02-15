<?php \Classes\ClassLayoutAgendamento2::setHeadRestrito("manager");   ?>
<?php \Classes\ClassLayoutAgendamento2::setHead('Controle ','controle seus agendamentos'); ?>
<?php include 'calendar_cli/conexao.php';?>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="calendar_adm/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="calendar_adm/css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

<br><br><br><br>

<div class="single">
	<div class="container">
		<br>
		<div class="leave-comment" style="font-size:20px;font-family:arial;">
		
			<b  style="font-size:25px;color: black ">Administre os horarios para <?php echo $_GET['dia_semana'];?></b>
			
			<form action=<?php echo DIRPAGE.'controllers/controllerCadastroHora'; ?> method="post" enctype="multipart/form-data">
			
			<b style="font-size:16px; color: black">Escolha um horário<br/>
			<input type="hidden" name="id_dia_semana" value="<?php echo $_GET['id_dia_semana'];?>" />
			<input type="hidden" name="dia_semana" value="<?php echo $_GET['dia_semana'];?>" />
             <input type="time" name="hora_disp" style="margin-left: 0px;width: 180px;" required="required"/>
               <input type="submit" value="Cadastrar horário" style="width: 180px;height: 35px;line-height: 0; border-radius: 15px"/>
            </p>
				
		    </form>
			
			<span style="font-size:16px">Clique para apagar um horário<br/><hr/></span>
			
			<?php
			
			 $consulta_hr = "SELECT * FROM horarios where id_semana = '".$_GET['id_dia_semana']."' order by hora_disp";
             $result_parametro = $pdo->query($consulta_hr);
             $rows_parametro = $result_parametro->fetchAll();

			 $id_dia_semana = $_GET['id_dia_semana'];
			 $dia_semana = $_GET['dia_semana'];

            foreach ($rows_parametro as $key => $value){
						$id_h = $value['id_h'];
						$hora_disp = $value['hora_disp'];
					echo "<a style='font-size:30px;' href='".DIRPAGE."controllers/controllerDeleteHora?id_h=$id_h&&id_dia_semana=$id_dia_semana&&dia_semana=$dia_semana'>".$hora_disp.'</a><br/><hr/>';
				}
                
			?>
			
		</div>
	</div>
	</div>
<?php \Classes\ClassLayout::setFooter(); ?>