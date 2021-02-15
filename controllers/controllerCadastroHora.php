<?php include 'calendar_cli/conexao.php';


$sql = "INSERT INTO horarios(id_semana,hora_disp) VALUES (:id_semana,:hora_disp)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id_semana', $_POST['id_dia_semana'], PDO::PARAM_STR);
$stmt->bindParam(':hora_disp', $_POST['hora_disp'], PDO::PARAM_STR);
$stmt->execute();


echo "<script>location.href='".DIRPAGE."adminHr2?id_dia_semana=".$_POST['id_dia_semana']."&&dia_semana=".$_POST['dia_semana']."'</script>";
?>