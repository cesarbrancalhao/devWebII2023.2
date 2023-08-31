<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("persistencia.php");

$livros = buscarDados();

$msgErro = "";

$titulo  = "";
$genero  = "";
$qtd_pag = "";
$autor   = "";

if(isset($_POST['submetido'])) {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $qtd_pag = $_POST['qtd_pag'];
    $autor = $_POST['autor'];

    $erros = array();
    
    //Valida campos obrigatórios
    if(! trim($titulo))
        array_push($erros, "Informe o título!");

    if(! trim($genero))
        array_push($erros, "Informe o gênero!");

    if(! $qtd_pag)
        array_push($erros, "Informe a quantidade de páginas!");
    
    if(! trim($autor))
        array_push($erros, "Informe o autor!");

    if(!$erros) { //Apenas se validou os campos obrigatórios
        //Valida se a quantidade de páginas é maior que 0
        if($qtd_pag <= 0)
            array_push($erros, "A quantidade de páginas deve ser maior que zero!");

        //Valida se o título do livro tem entre 3 e 50 caracateres
        if(strlen($titulo) < 3 || strlen($titulo) > 50)
            array_push($erros, "O título deve ter entre 3 e 50 caracteres!");

        //Encontrar se o título do livro já foi cadastrado
        $tituloExiste = false;
        foreach($livros as $l) {
            if($titulo == $l['titulo']) {
                $tituloExiste = true;
                break;
            }
        }
        if($tituloExiste)
            array_push($erros, "O título deste livro já foi cadastrado!");
    }

    if(!$erros) { //Apenas se passou por todas as validações
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

        //Redireciona para a mesma página a fim de limpar o formulário
        header("location: livros.php");
    
    } else 
        //Seta as mensagens do array de erro para a variável $msgErro
        $msgErro = implode("<br>", $erros);
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
            placeholder="Informe o título"
            value="<?= $titulo ?>" />
        
        <br><br>

        <select name="genero">
            <option value="">---Selecione o gênero---</option>
            <option value="D" <?php if($genero == 'D') echo 'selected'; ?>
                >Drama</option>
            <option value="F" <?php echo ($genero == 'F' ? 'selected' : '') ?>
                >Ficção</option>
            <option value="R" <?php echo ($genero == 'R' ? 'selected' : '') ?>
                >Romance</option>
            <option value="O" <?php echo ($genero == 'O' ? 'selected' : '') ?>
                >Outro</option>
        </select>

        <br><br>

        <input type="number" name="qtd_pag" 
            placeholder="Informe a quantidade de páginas"
            value="<?= $qtd_pag ?>" />

        <br><br>

        <input type="text" name="autor" 
            placeholder="Informe o autor"
            value="<?= $autor ?>" />

        <br><br>

        <input type="hidden" name="submetido" value="1" />

        <button type="submit">Gravar</button>
        <button type="reset">Limpar</button>
    </form>

    <div style="color: red;">
        <?= $msgErro ?>
    </div>

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
                        onclick="return confirm('Confirma a exclusão?');">
                        Excluir</a></td>
            </tr>   
        <?php endforeach; ?>

    </table>
    
</body>
</html>