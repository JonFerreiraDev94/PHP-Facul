<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibe informações vinda do formulário</title>
</head>
<body>
    <?php 
        extract ($_POST);

        $soma = $valorum + $valordois;
        echo "Soma dos valores<br>";
        echo( "primeiro valor $valorum, segundo valor $valordois, resultado $soma");
    ?>
    
</body>
</html>