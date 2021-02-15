<?php \Classes\ClassLayoutAgendamento::setHeadRestrito("user");   ?>
<?php \Classes\ClassLayoutAgendamento::setHead('Controle ','controle seus agendamentos'); ?>
<?php include 'calendar_cli/conexao.php';?>

<div class="single">
	<div class="container">
		<br><br><br><br><br>
		<div class="leave-comment" style="font-size:20px;font-family:arial;">
		<p style="font-size:23px;font-family:arial;font-weight: bold; color: Black">Alterar Dados</p>
			
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

                    <input class="float w100 h40" type="text" id="nome" name="nome" value="<?php echo $value['nome'] ?>" required >
                    <input class="float w100 h40" type="text" id="cpf" name="cpf" value="<?php echo $value['cpf'] ?>" required>
                    <input class="float w100 h40" type="text" id="dataNascimento" name="dataNascimento" value="<?php echo $value['dataNascimento'] ?>" required>
                    <input class="float w100 h40" type="text" id="telCelular" name="telCelular" value="<?php echo $value['telCelular'] ?>" maxlength="15" required>
					<input style=" width: 120px;height: 40px; font-size:20px ;border-radius:15px;margin-top: 5px;margin: auto;line-height: 0;" type="submit" value="Alterar" >


                </div>
            </form>
            <?php    
               
			  }
			  
			  
			
			?>
		</div>
	</div>
    </div>
    </div>
	

<?php \Classes\ClassLayout::setFooter(); ?>