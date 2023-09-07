<?php

include_once("Connection.php");

//Recebe os nome e cidade do time por parâmetro GET
if(! isset($_GET['nome']) || ! isset($_GET['cidade'])) {
    echo "Informe os parâmetros GET 'nome' e 'cidade'!";
    exit;
}

$nome = $_GET['nome'];
$cidade = $_GET['cidade'];

//Pega a conexão com a base de dados e cria a statement para inserir o time
$conn = Connection::getConnection();

$sql = "INSERT INTO times (nome, cidade) VALUES (?, ?)";
$stm = $conn->prepare($sql);
$stm->execute([$nome, $cidade]);

//Mensagem para exibir que o time foi inserido
echo "Time inserido no banco de dados!";
