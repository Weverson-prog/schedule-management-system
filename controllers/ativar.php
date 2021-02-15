<?php \Classes\ClassLayoutAgendamento2::setHeadRestrito("manager");   ?>

<?php include 'controllers/config.php';
$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$cpf = filter_input(INPUT_POST, 'cpf');
$dataNascimento = filter_input(INPUT_POST, 'dataNascimento');
$telefone = filter_input(INPUT_POST, 'telCelular');




$result_usuario = "UPDATE users SET  status='Ativo' WHERE id='$id'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);

if(mysqli_affected_rows($conexao)){
    if($_SESSION['login'] == 1){
            echo
            "<script>
                alert('Usuário Ativado!');
                window.location.href='".DIRPAGE."adminClientes?id_cliente=$id&&nome_cliente=$nome';
            </script>";

        }else{   
            echo
            "<script>
                alert('Usuário Ativado!');
                window.location.href='".DIRPAGE."perfil?id_cliente=$id&&nome_cliente=$nome';
            </script>";
        }}
        else{
            echo
            "<script>
                alert('Ediçao não realizada!');
            </script>";
        }