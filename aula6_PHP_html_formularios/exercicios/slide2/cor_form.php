<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleção de cor</title>
</head>
<body>
    <h2>Selecione a cor:</h2>

    <form method="POST" action="cor_exec.php">
        <select name="cor">
            <option value="">---Selecione a cor---</option>
            <option value="Tomato">Tomato</option>
            <option value="Orange">Orange</option>
            <option value="SlateBlue">SlateBlue</option>
            <option value="MediumSeaGreen">MediumSeaGreen</option>
        </select>

        <br><br>

        <input type="submit" value="Enviar" />
    </form>

    
</body>
</html>