<?php \Classes\ClassLayoutAgendamento2::setHeadRestrito("manager");   ?>
<?php \Classes\ClassLayoutAgendamento2::setHead('Controle ','controle seus agendamentos'); ?>
<?php include 'calendar_cli/conexao.php';?>

<div class="single">
	<div class="container">
		<br><br><br><br><br>
		<div class="leave-comment" style="font-size:20px;font-family:arial;">
			<b style="font-size:30px; color: black" >Administrar Relatórios</b>

			<p>
			<form action="" method="get" enctype="multipart/form-data">
            <input type="text" name="data" placeholder="Buscar por data" style="margin-left: 0px;width: 180px;height: 30px;" required="required"/>
            <input type="submit" value="Buscar" style="width: 140px;height: 45px;line-height: 0;height: 30px; border-radius: 15px"/>
            </form>
</p>
<?php \Classes\ClassLayout::setFooter(); ?>