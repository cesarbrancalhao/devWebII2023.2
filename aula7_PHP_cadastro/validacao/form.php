<?php 
$nome = "";
$idade = "";
$msgErro = "";

if(isset($_POST['submetido'])) {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    if(! trim($nome))
        $msgErro = 'Informe o nome!';

    else if(! $idade)
        $msgErro = 'Informe a idade!';

    else {
        echo $nome . " - " . $idade;
        $nome = '';
        $idade = '';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação</title>
</head>
<body>
    <h1>Formulário a validar</h1>

    <!-- Validação front-end -->
    <!-- <form method="POST" onsubmit="return validar()" > -->
    
    <!-- Validação back-end -->
    <form method="POST">
        <input type="text" name="nome" id="nome"
            placeholder="Nome:"
            value="<?= $nome ?>" />
            
        <br><br>

        <input type="number" name="idade" id="idade"
            placeholder="Idade:"
            value="<?= $idade ?>" />

        <br><br>    

        <button type="submit">Enviar</button>
        <input type="hidden" name="submetido" value="1" />
    </form>

    <div id="divMsg" style="color: red;">
        <?= $msgErro ?>
    </div>

    <script src="validacao.js"></script>
</body>
</html>