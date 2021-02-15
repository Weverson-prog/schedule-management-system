<?php include 'calendar_cli/conexao.php';
$id_h = $_GET['id_dia'];

$sql_up = "DELETE FROM dia where id_dia='$id_h'";
$pdo->query($sql_up);


echo "<script>location.href='".DIRPAGE."controleCli'</script>";