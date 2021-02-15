<?php

$servidor = 'localhost';
$usuario = 'root';
$password = '';
$bd = 'calendario';

//conecção com o banco de dados
$conexao = new mysqli($servidor, $usuario, $password, $bd);

//definição da linguagem 
$conexao->set_charset('utf8');

//verifica se tem erro e mostra |errno = nome e número do erro| 
if ($conexao->connect_errno) {
    echo "Erro ao conectar com o banco de dados {$conexao->connect_erro}";
} 

// Url da onde está o projeto, deve terminar com "/" no final
$base_url = "http://localhost/";

try{
    $pdo = new PDO( 'mysql:host=' . $servidor . ';dbname=' . $bd, $usuario, $password );
}
catch ( PDOException $e ) {
    echo "nao conecta" ;
}

?>