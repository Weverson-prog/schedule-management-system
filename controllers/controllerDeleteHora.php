<?php include 'calendar_cli/conexao.php';
$id_h = $_GET['id_h'];

$sql_up = "DELETE FROM horarios where id_h='$id_h'";
$pdo->query($sql_up);



echo "<script>location.href='".DIRPAGE."adminHr2?id_dia_semana=".$_GET['id_dia_semana']."&&dia_semana=".$_GET['dia_semana']."'</script>";
