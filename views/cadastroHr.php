<?php \Classes\ClassLayoutAgendamento::setHeadRestrito("user");   ?>
<?php \Classes\ClassLayoutAgendamento::setHead('Agendamento','Agende sua consulta'); ?>
<?php include 'calendar_cli/conexao.php';?>
<?php include DIRREQ.'controllers/config.php';?>


<?php 



$sql = "INSERT INTO dia (id_user,dia_dia,mes_mes,hora_cliente,ano_ano) VALUES 
('".$_GET['id_user']."','".$_GET['dia_dia']."','".$_GET['mes_mes']."','".$_GET['hora_disp']."','".$_GET['ano_ano']."')";


$sql = "INSERT INTO dia(id_user,dia_dia,mes_mes,hora_cliente,ano_ano) VALUES (:id_user,:dia_dia,:mes_mes,:hora_cliente,:ano_ano)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id_user', $_GET['id_user'], PDO::PARAM_STR);
$stmt->bindParam(':dia_dia', $_GET['dia_dia'], PDO::PARAM_STR);
$stmt->bindParam(':mes_mes', $_GET['mes_mes'], PDO::PARAM_STR);
$stmt->bindParam(':hora_cliente', $_GET['hora_disp'], PDO::PARAM_STR);
$stmt->bindParam(':ano_ano', $_GET['ano_ano'], PDO::PARAM_STR);

$stmt->execute();
$newId = $pdo->lastInsertId();

?>
<div class="single">
	<div class="container">
		<br><br><br><br><br>
		<div class="leave-comment">
		<p style="color:black; font-size:16px; font-family:arial;font-weight: bold;"><h3>Seu horário foi marcado com sucesso!</h3></p>
			<p style="color:black; font-size:16px; font-family:arial;font-weight: bold;">Clique no botão abaixo para administrar seus horários.</p>
			
			<input style="width: 150px;height: 40px; font-size:20px ;border-radius:15px;margin-top: 5px;margin: auto;line-height: 0;" type="submit" value="Meus horários" onclick="location.href='controleCli'">
				
				<div class="clearfix"> </div>
		
		</div>
	</div>
	</div>
	</div>
	
    <?php \Classes\ClassLayout::setFooter(); ?>
