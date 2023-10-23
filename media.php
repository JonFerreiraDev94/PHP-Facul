<!DOCTYPE html>
<html >
<head>
    <title>Document</title>
</head>
<body>
    <?php 
        //Trabalhando com variáveis
        $aluno = "Henrique";
        $notaUm = 10;
        $notaDois = 6.5;
        $notaTres = 10;
        $media;
        $media = ($notaUm + $notaDois + $notaTres) / 3;
        echo "O estudante $aluno ficou com nota $media ";
        echo " nota com arredondamento " .number_format($media, 2);
    ?>
    
</body>
</html>