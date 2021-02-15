
<style>
#day{float: left;width: 125px;height: 125px;border-radius:10px;border: 1px solid silver;padding: 5px 10px 10px 5px; font-size: 17px;font-family: arial;margin-left: 15px;margin-top: 15px;}
#dia_n2{text-align: center;margin-top: 25px;padding: 5px;color: #009eff;}
@media only screen and (max-width: 600px) {
    #day{float: left;width: 43%;height: 125px;border-radius:10px;border: 1px solid silver;padding: 5px 10px 10px 5px; font-size: 17px;font-family: arial;margin-left: 15px;margin-top: 15px;}

}
</style>


<?php $conta_horarios = 0; $orbtal = 1;

   $id_cliente = $_SESSION['login'];
   
     $ano = date('Y');
     //echo ano
	 
	 
	        //pega o mes
			 $mes = date("m");
			 
			 if(isset($_GET['menosum'])){$_GET['maisum']='0';}
			 
			   if(isset($_GET['maisum'])){
				   $orbtal=1;
				   
				   if($orbtal>=1){$orbtal=$orbtal+$_GET['maisum'];}
				   
				   
				  
	         $mes = date("m")+$_GET['maisum']; 
			 if($mes<10){$mes = '0'.$mes;}else{}
			 
			 
			 
		if($mes>12){
				 
				$ano = date('Y')+1;
				$mes = $mes-12;
				if($mes<10){$mes = '0'.$mes;}else{}
				 
				if($mes>12){
				$ano = date('Y')+2;
				$mes = $mes-12;
				if($mes<10){$mes = '0'.$mes;}else{}
				
				if($mes>12){
				$ano = date('Y')+3;
				$mes = $mes-12;
				if($mes<10){$mes = '0'.$mes;}else{}
				
				if($mes>12){
				$ano = date('Y')+4;
				$mes = $mes-12;
				if($mes<10){$mes = '0'.$mes;}else{}
				
				if($mes>12){
				$ano = date('Y')+5;
				$mes = $mes-12;
				if($mes<10){$mes = '0'.$mes;}else{}
				
				
				        }
				      }
				   }
				}
		}  
			else{}
			 
			   
			   }else{}
	 
	 
		             //dia de hoje
	                 $dia_hoje = date('d');
		             //echo $dia_hoje;
		
		
		               echo "<p style='font-size: 20px;color: #009eff;margin: 1em 0em 1em 0em;'>
<a href='".DIRPAGE."agendamento?menosum=$orbtal'><img src='../images/setamesleft.jpg'/></a> &nbsp; ".$mes." / ". $ano." &nbsp; 
<a href='".DIRPAGE."agendamento?maisum=$orbtal'><img src='../images/setamesrigth.jpg'/></a></p>";
					   //echo $mes;
	      
				 
				   //numeros de dias do mes
                   $num = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
                   //echo $num; 
                   $dia_atual = 0;

                         //faz o for comforme numeros de dias do mes $num
                        for ($i = 1; $i <= $num; $i++){
	
	                        //pega o dia da semana
	                        $dia_atual = $dia_atual+1;
                            $dia_semana = jddayofweek ( cal_to_jd(CAL_GREGORIAN, $mes,$dia_atual, $ano) , 1 );
	                        if($dia_semana=='Monday'){$dia_semana='Segunda';}if($dia_semana=='Tuesday'){$dia_semana='Terca';}if($dia_semana=='Wednesday'){$dia_semana='Quarta';}if($dia_semana=='Thursday'){$dia_semana='Quinta';}if($dia_semana=='Friday'){$dia_semana='Sexta';}if($dia_semana=='Saturday'){$dia_semana='Sabado';}if($dia_semana=='Sunday'){$dia_semana='Domingo';}
	
	                    
	
	
	                              //confere se tem alguem aquele dia - $i

                            $consulta_dia = "SELECT DISTINCT id_dia FROM dia where dia_dia = '$i'";
                            $result_parametro = $pdo->query($consulta_dia);
                            $rows_parametro = $result_parametro->fetchAll();
                            $conta = sizeof($rows_parametro);


									  
									  if($i<10){$i = '0'.$i;}else{}
	
                                             //so mostra o calendario a partir da date atual
                                             if(($i>=$dia_hoje)&&(@$_GET['maisum']=='0')){


	                                              //query pra contar horarios
	                                                 $consulta_semana = "SELECT * FROM semana where dia_semana = '$dia_semana'";
                                                 $result_parametrosemana = $pdo->query($consulta_semana);
                                                 $rows_parametrosemana = $result_parametrosemana->fetchAll();
                                                 //$contasemana = sizeof($rows_parametrosemana);


                                                 foreach ($rows_parametrosemana as $key => $value){
	                                                     $id_semana_tabela = $value['id_semana'];
	 
	                                                         //$consulta_horarios = mysql_query ("SELECT * FROM horarios where id_semana = '$id_semana_tabela' AND marcou_check ='livre' ");

							                          $consulta_horarios = "SELECT * FROM horarios where id_semana = '$id_semana_tabela'";

                                                     $result_parametro_horarios = $pdo->query($consulta_horarios);
                                                     $rows_parametro_horarios = $result_parametro_horarios->fetchAll();
                                                     $conta_horarios = sizeof($rows_parametro_horarios);

                                                     if(($conta_horarios<=$conta)||($conta_horarios=='0')){
                                                         $horarios_disponiveis1 = $conta_horarios-$conta;
                                                         if($horarios_disponiveis1>=1){
                                                             echo "<div id='day' style='color:#999;' onclick=''>";
                                                             echo "<div id='dia_n'>".$i.' '.$dia_semana."</div>";
                                                             echo "<div id='dia_n2'>".$horarios_disponiveis1.' Horários<br/>Marcar123</div>';
                                                             echo "<input type='submit' value='Indisponível' style='background: transparent;border: 2;outline: 0;margin-top: 35px;margin-left: 7px;color: red;font-size: 16px;'/>";
                                                             echo "</div>";
                                                         }


                                                     }



                                                     else{

                                                         $horarios_disponiveis1 = $conta_horarios-$conta;
                                                         if($horarios_disponiveis1>=1){
                                                             echo "<div id='day' style='color:#999;cursor:pointer' onclick='location.href=\"".DIRPAGE."horarios?id_cliente=$id_cliente&&dia_semana=$dia_semana&&dia=$i&&mes=$mes&&ano=$ano\"'>";
                                                             echo "<div id='dia_n'>".$i.' '.$dia_semana."</div>";
                                                             echo "<div id='dia_n2'>Marcar</div>";
                                                             //echo "<div id='dia_n2'>".$horarios_disponiveis1.' Horários<br/>Clique para marcar</div>';

                                                             //echo "<input type='submit' value='Disponível' style='background: transparent;border: 0;outline: 0;cursor: pointer;margin-top: 35px;margin-left: 13px;color: green;font-size: 16px;'/>";
                                                             echo "</div>";
                                                         }


                                                     }

                                                        }   

	

		
		
		
                                            }
											elseif(@($_GET['maisum']!='0')){
												
												
												
												 //query pra contar horarios
	                                            $consulta_semana = "SELECT * FROM semana where dia_semana = '$dia_semana'";
                                                $result_parametro_semana = $pdo->query($consulta_semana);
                                                $rows_parametro_semana = $result_parametro_semana->fetchAll();
                                                $total_registros_semana = sizeof($rows_parametro_semana);
                                                         foreach ($rows_parametro_semana as $key => $value){
	                                                     $id_semana_tabela = $value['id_semana'];
	 
	                                                         //$consulta_horarios = mysql_query ("SELECT * FROM horarios where id_semana = '$id_semana_tabela' AND marcou_check ='livre' ");
							                                 $consulta_horarios = "SELECT * FROM horarios where id_semana = '$id_semana_tabela'";
                                                             $result_horarios = $pdo->query($consulta_horarios);
                                                             $rows_horarios = $result_horarios->fetchAll();
                                                             $conta_horarios = sizeof($rows_horarios);


                                                             $horarios_disponiveis1 = $conta_horarios-$conta;
                                                             if($horarios_disponiveis1>=1){
                                                                 echo "<div id='day' style='color:#999;cursor:pointer' onclick='location.href=\"".DIRPAGE."marcar?id_cliente=$id_cliente&&dia_semana=$dia_semana&&dia=$i&&mes=$mes&&ano=$ano\"'>";
                                                                 echo "<div id='dia_n'>".$i.' '.$dia_semana."</div>";
                                                                 echo "<div id='dia_n2'>Marcar</div>";
                                                                 //echo "<div id='dia_n2'>".$horarios_disponiveis1.' Horários<br/>Clique para marcar</div>';

                                                                 //echo "<input type='submit' value='Disponível' style='background: transparent;border: 0;outline: 0;cursor: pointer;margin-top: 35px;margin-left: 13px;color: green;font-size: 16px;'/>";
                                                                 echo "</div>";
                                                             }

                                                         }

	       
		                                                                                         

		                                                                   
												
								
											}	else{}
	
	
	
	
                }	


//$db = mysql_query ("UPDATE semana set dia_semana = 'Sábado' where id_semana = '6'");


?>
	