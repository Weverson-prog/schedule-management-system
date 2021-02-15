<?php \Classes\ClassLayout::setHeadRestrito("");   ?>

<?php include 'controllers/config.php';
$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$cpf = filter_input(INPUT_POST, 'cpf');
$dataNascimento = filter_input(INPUT_POST, 'dataNascimento');
$telefone = filter_input(INPUT_POST, 'telCelular');


$result_usuario = "UPDATE users SET nome='$nome', cpf='$cpf', dataNascimento='$dataNascimento', telCelular='$telefone' WHERE id='$id'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);

if(mysqli_affected_rows($conexao)){
    if($_SESSION['login'] == 1){
            echo
            "<script>
                alert('Ediçao realizada com sucesso!');
                window.location.href='".DIRPAGE."alterarAdm?id_cliente=$id&&nome_cliente=$nome';
            </script>";

        }else{   
            echo
            "<script>
                alert('Ediçao realizada com sucesso!');
                window.location.href='".DIRPAGE."perfil?id_cliente=$id&&nome_cliente=$nome';
            </script>";
        }}
        else{
            echo
            "<script>
                alert('Ediçao não realizada!');
            </script>";
        }






