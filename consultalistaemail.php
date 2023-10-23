<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Resultado da pesquisa ao banco de dados lista email</title>
    <style type="text/css">
        body {
            font-family: arial, sans-serif;
            background-color: lightblue
        }

        h3 {
            color: white;
        }

        table {
            background-color: lightgrey;
        }

        td {
            padding-top: 2px;
            padding-bottom: 2px;
            padding-left: 6px;
            padding-right: 6px;
            border-width: 1px;
            border-style: outset;
        }
    </style>
</head>

<body>
    <?php
    extract($_POST);
    //Conectar com o banco de dados MySQL
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bancodados = "listaemail";

    $conexao = new mysqli($servidor, $usuario, $senha, $bancodados);

    //verificar
    if ($conexao->connect_error) {
        die("conexão falhou: " . $conexao->connect_error);
    }
    $sql = "select * from contatos";
    $resultado = $conexao->query($sql);
    ?>
    <!--fim do php-->

    <h3>Lista novos contatos</h3>
    <table>
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Sobrenome</td>
            <td>E-mail</td>
            <td>Fone</td>
        </tr>
        <?php
        //busca cada registro em um conjunto de resultados
        while ($linha = $resultado->fetch_assoc()) {
            //constroi a tabela com os resiultados 
            print("<tr>");
            foreach ($linha as $key => $value)
                print("<td>$value</td>");

            print("</tr>");
            //fim do while
        }
        $conexao->close();


        ?><!--fim do script php-->

    </table>
</body>

</html>