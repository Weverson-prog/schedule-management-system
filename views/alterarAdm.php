<?php \Classes\ClassLayoutAgendamento2::setHeadRestrito("manager");   ?>
<?php \Classes\ClassLayoutAgendamento2::setHead('Controle ','controle seus agendamentos'); ?>
<?php include 'calendar_cli/conexao.php';?>

<div class="single">
	<div class="container">
		<br><br><br><br><br>
		<div class="leave-comment" style="font-size:20px;font-family:arial;">
			<h3>Alterar Dados</h3>
			
			<?php
			 $consulta_cli = "SELECT * FROM users where id = '".$_GET['id_cliente']."'";
            $result_cli = $pdo->query($consulta_cli);
            $rows_cli = $result_cli->fetchAll();
            $id_cliente = $_GET['id_cliente'];
            foreach ($rows_cli as $key => $value){

            ?>
            <form name="formAlterar" id="formAlterar"  action="<?php echo DIRPAGE.'controllers/controllerAlterar'; ?>" method="post">
                <div class="alterar float center">
                <input class="float w100 h40" type="hidden" id="id" name="id" value="<?php echo $value['id'] ?>" required >

                <input class="float w100 h40" type="text" id="nome" name="nome" value="<?php echo $value['nome'] ?>" maxlength="42" required >
        <input class="float w100 h40" type="text" id="cpf" name="cpf" value="<?php echo $value['cpf'] ?>" required>
        <input class="float w100 h40" type="text" id="dataNascimento" name="dataNascimento" value="<?php echo $value['dataNascimento'] ?>" required>
        <input class="float w100 h40" type="text" id="telCelular" name="telCelular" value="<?php echo $value['telCelular'] ?>" required>
                    
                    <input class="btn_2" type="submit" value="Alterar" >

                </div>
            </form>
            <?php    
               
			  }
			  
			  
			
			?>
		</div>
	</div>
	</div>

<?php \Classes\ClassLayout::setFooter(); ?>