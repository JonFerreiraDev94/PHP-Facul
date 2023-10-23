<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodados = "lojainformatica";

//conexao
$conexao = new mysqli($servidor,$usuario, $senha, $bancodados);
//verificar
if($conexao->connect_error){
    die("Conexão falhou: " .$conexao->connect_error);

}

$sql = "SELECT cpf, nome, celular FROM cliente";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {

    //pesquisa dados
    while($linhas = $resultado->fetch_assoc()){
        echo "cpf: " .$linhas["cpf"]." - Nome:" .$linhas["nome"]. "-celular: ". $linhas["celular"]. "<br>";

    }
}else{
    echo "0 resultados";
}
$conexao->close();

?>