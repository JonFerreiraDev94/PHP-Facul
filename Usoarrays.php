<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array manipulador</title>
</head>

<body>
    <?php
    //criar o primeiro array
    print("<strong>criando o primeiro array</strong></br/>");
    $primeiro[0] = 5;
    $primeiro[1] = 10;
    $primeiro[2] = 20;
    $primeiro[3] = 30;
    //exibir cada valor pelo indice
    for ($i = 0; $i < count($primeiro); $i++)
        print("elemento $i e o $primeiro[$i] <br/>");

    $soma = $primeiro[2] + $primeiro[3];
    print("resultado da soma $soma <br/>");

    print("<br/><strong>Criando o segundo array</strong><br/>");

    //Chama a funcao para criar o segundo array
    $segundo = array("zero", "um", "dois", "tres");

    for ($i = 0; $i < count($segundo); $i++)
        print("elemento $i e o $segundo[$i] <br/>");

    print("<br/><strong>criado o terceiro array</strong><br/>");

    //indices não numéricos
    $terceiro["marcelo"] = 21;
    $terceiro["henrique"] = 18;
    $terceiro["eliane"] = 23;
    //nome do elemento e valor
    for (reset($terceiro); $element = key($terceiro); next($terceiro))
        print("$element tem a idade de $terceiro[$element] anos </br/>");

    print("<br/><strong>criando o quarto array </strong><br/>");

    //criando o array atraves da função array
    //texto em forma de indices
    $quarto = array(
        "January"       => "first", "February" => "Second",
        "March"        => "third", "April"    => "fourth",
        "May"         => "fifth",   "june"    => "sixth",
        "September"     => "ninth",  "october"    => "tenth",
        "November"     => "eleventh",  "december"    => "twelfth",
    );

    //Exibindo
    foreach ($quarto as $element => $value)
        print("$element é o $value mês <br/>");

    ?>
</body>

</html>