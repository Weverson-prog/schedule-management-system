<?php \Classes\ClassLayoutAgendamento2::setHeadRestrito("manager");   ?>
<?php \Classes\ClassLayoutAgendamento2::setHead('Controle ','controle seus agendamentos'); ?>
<?php include 'calendar_cli/conexao.php';?>

<div class="single">
	<div class="container">
		<br><br><br><br><br>
		<div class="leave-comment" style="font-size:20px;font-family:arial;">
			<h3>Ativar usuário</h3>
			
			<?php
			 $consulta_cli = "SELECT * FROM users where id = '".$_GET['id_cliente']."'";
            $result_cli = $pdo->query($consulta_cli);
            $rows_cli = $result_cli->fetchAll();
            $id_cliente = $_GET['id_cliente'];
            foreach ($rows_cli as $key => $value){
echo "Situação do cadastro: ".$value['status'];
            ?>
            <form name="formAlterar" id="formAlterar"  action="<?php echo DIRPAGE.'controllers/ativar'; ?>" method="post">
                <div class="alterar float center">
                    <input class="float w100 h40" type="hidden" id="status" name="status" value="<?php echo $value['status'] ?>" required >
                    <input class="float w100 h40" type="hidden" id="id" name="id" value="<?php echo $value['id'] ?>" required >
                    <laber>Tem certeza que deseja ativar esse usuários?</label>
                    <input class="btn_2" type="submit" value="Sim" >

                </div>
            </form>
            <?php    
               
			  }
			  
			  
			
			?>
		</div>
	</div>
	</div>

<?php \Classes\ClassLayout::setFooter(); ?>