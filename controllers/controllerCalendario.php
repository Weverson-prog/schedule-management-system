<style>
#day{float: left;width: 115px;background: #FFF ;height: 115px;border-radius:25px;  border: 2px solid #3399FF;padding: 9px 12px 12px 7px; font-weight: bold;font-size: 16px;font-family: arial;margin-left: 10px;margin-top: 10px;}
#dia_n{text-align: center;margin-top: 9px;color: #3399FF;}
#dia_n2{text-align: center;margin-top: 25px;padding: 15px;color: #3399FF;}

@media only screen and (max-width: 900px) {
    #day{float: left;width: 43%;height: 125px;border-radius:23px;border: 2px solid #3399FF;padding: 5px 10px 10px 5px; font-size: 17px;font-family: arial;margin-left: 15px;margin-top: 15px;}

}
</style>

<?php

$consulta_cliente = "SELECT * FROM users order by nome ASC";
			 
			 if(isset($_GET['nome'])){
				$consulta_cliente = "SELECT * FROM users where nome like '%".$_GET['nome']."%' order by nome ASC";
			 }

            $result_parametro = $pdo->query($consulta_cliente);
            $rows_parametro = $result_parametro->fetchAll();

                            foreach ($rows_parametro as $key => $value){
                                 $id_cliente = $value['id'];
                                 $nome_cliente = $value['nome'];
								 
								 //$dia_semana = $linha_cliente['dia_semana'];
								 
							  
							 }
			
			




$sql = "SELECT * FROM users where id = '".$_GET['id_cliente']."'";
$result_parametro = $pdo->query($sql);
$rows_parametro = $result_parametro->fetchAll();
$total_registros = sizeof($rows_parametro);
if($total_registros==1){

    foreach ($rows_parametro as $key => $value){
        $id_cliente = $value['id'];
    }
}
$conta_horarios = 0; $orbtal = 1;
   $id_cliente = $value['id'];
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
		
		
		               echo "<center><p style='font-size: 23px;color: #009eff;margin: 1em 0em 1em 0em;'>
<a href='".DIRPAGE."agendamentoAdm?menosum=$orbtal&&id_cliente=$id_cliente'><img src='../images/setamesleft.png'/></a> &nbsp; ".$mes." / ". $ano." &nbsp; 
<a href='".DIRPAGE."agendamentoAdm?maisum=$orbtal&&id_cliente=$id_cliente'><img src='../images/setamesrigth.png'/></a></p>";
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
                                                 $consulta_cliente = "SELECT * FROM users order by nome ASC";
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
                                                             echo "<div id='day' style='color:#999;' onclick='location.href=\"".DIRPAGE."horarios3?id_cliente=$id_cliente&&dia_semana=$dia_semana&&dia=$i&&mes=$mes&&ano=$ano\">";
                                                             echo "<div id='dia_n'>".$i.' '.$dia_semana."</div>";
                                                             echo "<div id='dia_n2'>".$horarios_disponiveis1.' Horários<br/>Marcar</div>';
                                                             echo "<input type='submit' value='Indisponível' style='background: transparent;border: 0;outline: 0;margin-top: 35px;margin-left: 7px;color: red;font-size: 16px;'/>";
                                                             echo "</div>";
                                                         }


                                                     }



                                                     else{

                                                         $horarios_disponiveis1 = $conta_horarios-$conta;
                                                         if($horarios_disponiveis1>=1){
                                                             echo "<div id='day' style='color:#999;cursor:pointer' onclick='location.href=\"".DIRPAGE."horarios3?id_cliente=$id_cliente&&dia_semana=$dia_semana&&dia=$i&&mes=$mes&&ano=$ano\"'>";
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
                                                                 echo "<div id='day' style='color:#999;cursor:pointer' onclick='location.href=\"horarios3?id_cliente=$id_cliente&&dia_semana=$dia_semana&&dia=$i&&mes=$mes&&ano=$ano\"'>";
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
	