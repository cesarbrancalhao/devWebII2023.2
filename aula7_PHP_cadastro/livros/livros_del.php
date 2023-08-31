<?php

include_once("persistencia.php");

//Verificar se o ID do livro foi enviado/recebido
$id = "";
if(isset($_GET['id']))
    $id = $_GET['id'];

if(! $id) {
    echo "ID do livro não informado!";
    echo "<br>";
    echo "<a href='livros.php'>Voltar</a>";
    exit;
}

//Carregar o array de livros do arquivo
$livros = buscarDados();

//Encontrar o índice do livro
$index = -1;
for($i=0; $i<count($livros); $i++) {
    if($id == $livros[$i]['id']) {
        $index = $i;
        break;
    }
}

//Verificar se o livro foi encontrado
if($index < 0) {
    echo "ID do livro não encontrado!";
    echo "<br>";
    echo "<a href='livros.php'>Voltar</a>";
    exit;
}

//Excluir o livro
array_splice($livros, $index, 1);
//print_r($livros);

//Persisitir o array sem o livro excluido
salvarDados($livros);

//Redirecionar a página
header("location: livros.php");

