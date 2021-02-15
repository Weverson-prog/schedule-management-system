<style>
#box_hr{width: 100%;max-width: 1000px;text-align: center;border: 2px solid #3399FF;padding: 10px;font-size: 28px;font-family: arial;}
</style>
<?php


//$id_cliente = '1';

     $dia_semana = $_GET['dia_semana'];
     //echo $dia_semana.'<br/>';

         $dia = $_GET['dia'];
         //echo 'dia n '.$dia.'<br/>';

             $mes = $_GET['mes'];
             //echo $mes;
			 
					$ano = $_GET['ano'];
					 
                         echo "<div id='box_hr'>";

                             echo "<b style='font-size: 19px;color: black'> ".$dia_semana." Dia ".$dia."<br>";
			 
					 //query magic
					 $consulta_dia = "SELECT * FROM dia where dia_dia = '$dia' AND mes_mes = '$mes' AND ano_ano = '$ano' order by hora_cliente";
					 $result_dia = $pdo->query($consulta_dia);
					 $rows_dia = $result_dia->fetchAll();

                             foreach ($rows_dia as $key => $value){
							 $id_dia = $value['id_dia'];
							 $id_user = $value['id_user'];
							 $hora_cliente = $value['hora_cliente'];
							 
							  $consulta_cliente = "SELECT * FROM users where id = '$id_user'";
                                 $result_cliente = $pdo->query($consulta_cliente);
                                 $rows_cliente = $result_cliente->fetchAll();

                                 foreach ($rows_cliente as $key => $value){
							     $id_cliente = $value['id'];
								 $nome_cliente = $value['nome'];
								 echo '</b>'	;
							 echo '<b style=color:black;>'.$nome_cliente.'| Hora - '.'</b>';
							// echo $hora_cliente.' <input type="submit" value="Excluir" onclick="location.href=\"del_hr.php?id_dia='.$id_dia.'&&dia='.$dia.'&&mes='.$mes.'&&ano='.$ano.'"\" style="margin: auto;width: 150px;height: 25px;line-height: 0;"><br/>';
							
							echo '<b style=color:black;>'.$hora_cliente.' <input type="submit" value="Excluir" onclick="location.href=\'../controllerDelete?id_dia='.$id_dia.'&&dia='.$dia.'&&mes='.$mes.'&&ano='.$ano.'&&d_semana='.$dia_semana.'\'"  style="width: 170px;height: 30px;border-radius:15px;margin-top: 5px;margin: auto;font-size: 25px;line-height: 0;"><br/><hr/>
								'; 
	
							}
							
							 //echo $sql;
						 }
	 
	
echo "</div>";
?>
