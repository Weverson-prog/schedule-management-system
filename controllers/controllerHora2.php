<style>
#box_hr{width: 100%;max-width: 550px;text-align: center;border: 2px solid #3399FF;padding: 10px;font-size: 28px;font-family: arial;}
</style>
<?php 

$id_cliente = $_GET['id_cliente'];
     $dia_semana = $_GET['dia_semana'];
     //echo $dia_semana.'<br/>';

         $dia = $_GET['dia'];
         //echo 'dia n '.$dia.'<br/>';

             $mes = $_GET['mes'];
             //echo $mes;
			 
                 $hora_atual = date('H:i:s');
                 //echo 'hora atual '.$hora_atual.'<br/>';
				 
                     $dia_atual = date('d');
                     //echo 'dia atual '.$dia_atual.'<br/>';
					 
					    $ano = $_GET['ano'];
					 
                         echo "<div id='box_hr'>";

                             echo "<p style=color:black; >Escolha um horario para ".$dia_semana." Dia ".$dia."</p>";

 if(($dia==$dia_atual)){
	             
				/* //consulta o dia da semana
	            $consulta_semana = mysql_query ("SELECT * FROM semana where dia_semana = '$dia_semana'");
                      while ($linha_semana = mysql_fetch_array($consulta_semana)){
	                  $id_semana_tabela = $linha_semana['id_semana'];
	                             
								 //consulta os horaros desse dia
	                            $consulta_horarios = mysql_query ("SELECT * FROM horarios where id_semana = '$id_semana_tabela'");
                                $conta_horarios = mysql_num_rows($consulta_horarios);
	                                 while ($linha_semana = mysql_fetch_array($consulta_horarios)){
	                                 $hora_disp = $linha_semana['hora_disp'];
	                                           if(($hora_atual<=$hora_disp)){
	                                                  echo $hora_disp.'<br/>';
	                                           }else{}
	 
	                                 }
	   
                       } */    
					   
					   
					   
					     //consulta o dia da semana
	               $consulta_semana = "SELECT * FROM semana where dia_semana = '$dia_semana'";
	               $result_semana = $pdo->query($consulta_semana);
	               $rows_semana = $result_semana->fetchAll();


                     foreach ($rows_semana as $key => $value){
	                 $id_semana_tabela = $value['id_semana'];
					 }

					 $sql = '';
					 
					 
					 //query magic
					 $consulta_dia = "SELECT hora_cliente FROM dia where dia_dia = '$dia' AND mes_mes = '$mes' AND ano_ano = '$ano'";
					 $result_dia = $pdo->query($consulta_dia);
					 $rows_dia = $result_dia->fetchAll();


                         foreach ($rows_dia as $key => $value){
							 $hora_cliente = $value['hora_cliente'];
							 $sql .= " AND hora_disp <> '".$hora_cliente."'";
							 //echo $sql;
						 }
	 
	                            //consulta os horarios desse dia
	                            $consulta_horarios = "SELECT * FROM horarios where id_semana = $id_semana_tabela $sql ORDER BY hora_disp ASC";
                         $result_horarios = $pdo->query($consulta_horarios);
                         $rows_horarios = $result_horarios->fetchAll();
                         $conta_horarios = sizeof($rows_horarios);

                         foreach ($rows_horarios as $key => $value){
	                         $hora_disp = $value['hora_disp'];
										
	                          if(($hora_atual<=$hora_disp)){
	                               echo '<b style=color:black;>'.$hora_disp.'<br/><input type="submit" onclick="location.href=\'cadastroHr?id_user='.$id_cliente.'&&dia_dia='.$dia.'&&mes_mes='.$mes.'&&ano_ano='.$ano.'&&hora_disp='.$hora_disp.'\'" value="Marcar" style="width: 40%;height: 30px;border-radius:15px;margin-top: 5px;margin: auto;line-height: 0;"/><br/>';
	                           }else{}
	 
	                     }
					   
 }
 
 else{
	                //consulta o dia da semana
	               $consulta_semana = "SELECT * FROM semana where dia_semana = '$dia_semana'";
	               $result_semana = $pdo->query($consulta_semana);
	               $rows_semana = $result_semana->fetchAll();

                     foreach ($rows_semana as $key => $value){
	                 $id_semana_tabela = $value['id_semana'];
					 }

					 $sql = '';
					 
					 
					 //query magic
					 $consulta_dia = "SELECT hora_cliente FROM dia where dia_dia = '$dia' AND mes_mes = '$mes'";
                     $result_dia = $pdo->query($consulta_dia);
                     $rows_dia = $result_dia->fetchAll();

                     foreach ($rows_dia as $key => $value){
							 $hora_cliente = $value['hora_cliente'];
							 $sql .= " AND hora_disp <> '".$hora_cliente."'";
							 //echo $sql;
						 }
	 
	                            //consulta os horaros desse dia
                     $consulta_horarios = "SELECT * FROM horarios where id_semana = $id_semana_tabela $sql ORDER BY hora_disp ASC";
                     $result_horarios = $pdo->query($consulta_horarios);
                     $rows_horarios = $result_horarios->fetchAll();
                     $conta_horarios = sizeof($rows_horarios);


                                       foreach ($rows_horarios as $key => $value){
	                                    $hora_disp = $value['hora_disp'];
										
	                                           //echo $hora_disp.'<br/>';
	                                           echo '<b style=color:black;>'.$hora_disp.'<br/><input type="submit" onclick="location.href=\'cadastroHr?id_user='.$id_cliente.'&&dia_dia='.$dia.'&&mes_mes='.$mes.'&&ano_ano='.$ano.'&&hora_disp='.$hora_disp.'\'" value="Marcar"  style="width: 40%;height: 30px;border-radius:15px;margin-top: 5px;margin: auto;line-height: 0;"/><br/>';
	                                    }
	   
                      
	  
 }
echo "</div>";
?>


