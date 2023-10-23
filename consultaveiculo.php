<?php 
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bancodados = "concessionaria";

    extract ($_POST);
    $fabricante = $_POST["ffabricante"];

    //criar conexao
    $conexao = new mysqli($servidor, $usuario, $senha, $bancodados);

    //verificar
    if ($conexao->connect_error) {
        # code...
        die("conexao falhou: " .$conexao->connect_error);
    }

    $sql = "SELECT * from veiculos where fabricante = '$fabricante'";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows>0) {
        # code...
        //saida e dados
        while($linha = $resultado->fetch_assoc()){
            echo "carro: " .$linha["descricao"]. " fabricante: " .$linha["fabricante"]. "". "<br>";
            
        }
    } else {
        # code...
        echo "zero resultados";
    }
    $conexao->close();
       


?>