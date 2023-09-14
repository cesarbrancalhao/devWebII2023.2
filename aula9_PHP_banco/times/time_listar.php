<?php

require_once("Connection.php");

$conn = Connection::getConnection();

//$sql = "SELECT id, nome, cidade FROM times";
$sql = "SELECT * FROM times";
$stm = $conn->prepare($sql);
$stm->execute();

$result = $stm->fetchAll();
//echo "<pre>" . print_r($result, true) . "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Times</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th></th>
        </tr>
        <?php foreach($result as $r): ?>
            <tr>
                <td><?= $r["id"] ?></td>
                <td><?= $r["nome"] ?></td>
                <td><?= $r["cidade"] ?></td>
                <td><a 
                    href="time_excluir.php?id=<?= $r["id"] ?>"
                    onclick="return confirm('Confirma a exclusão?');"
                    >Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>