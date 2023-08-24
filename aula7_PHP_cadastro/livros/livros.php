<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("persistencia.php");

$livros = buscarDados();

if(isset($_POST['submetido'])) {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $qtd_pag = $_POST['qtd_pag'];
    $autor = $_POST['autor'];

    $id = vsprintf( '%s%s-%s-%s-%s-%s%s%s',
            str_split(bin2hex(random_bytes(16)), 4) );

    $livro = array('id' => $id,
                   'titulo' => $titulo,
                   'genero' => $genero,
                   'paginas' => $qtd_pag,
                   'autor' => $autor);
    array_push($livros, $livro);

    //Persistir o array livros no arquivo
    salvarDados($livros);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>
</head>
<body>

    <h1>Cadastro de livros</h1>

    <h3>Formulário de livros</h3>
    <form action="" method="POST">
        <input type="text" name="titulo" 
            placeholder="Informe o título" />
        
        <br><br>

        <select name="genero">
            <option value="">---Selecione o gênero---</option>
            <option value="D">Drama</option>
            <option value="F">Ficção</option>
            <option value="R">Romance</option>
            <option value="O">Outro</option>
        </select>

        <br><br>

        <input type="number" name="qtd_pag" 
            placeholder="Informe a quantidade de páginas" />

        <br><br>

        <input type="text" name="autor" 
            placeholder="Informe o autor" />

        <br><br>

        <input type="hidden" name="submetido" value="1" />

        <button type="submit">Gravar</button>
        <button type="reset">Limpar</button>
    </form>

    <h3>Listagem de livros</h3>
    <table border="1">
        <tr>
            <td>Título</td>
            <td>Gênero</td>
            <td>Páginas</td>
            <td>Autor</td>
            <td></td>
        </tr>

        <?php foreach($livros as $l): ?>
            <tr>
                <td><?= $l['titulo'] ?></td>
                <td><?php 
                    switch($l['genero']) {
                        case 'D':
                            echo 'Drama';
                            break;
                        
                        case 'F':
                            echo 'Ficção';
                            break;

                        case 'R':
                            echo 'Romance';
                            break;

                        case 'O':
                            echo 'Outro';
                            break;

                        default:
                            echo $l['genero'];
                    } 
                ?></td>
                <td><?= $l['paginas'] ?></td>
                <td><?= $l['autor'] ?></td>
                <td><a href="livros_del.php?id=<?= $l['id'] ?>" 
                        onclick="return confirm('Confirma a exclusão do livro?')">
                        Excluir</a></td>
            </tr>   
        <?php endforeach; ?>

    </table>
    
</body>
</html>