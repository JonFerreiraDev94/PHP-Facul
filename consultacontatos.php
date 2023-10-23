<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Formulario</title>
    <style type="text/css">
        div {
            text-align: center;
        }

        div div {
            font-size: larger;
        }

        .prompt {
            color: blue;
        }

        .avisoerro {
            color: red;
        }

        .smalltext {
            font-size: smaller;
        }

        .error {
            color: red;
            font-size: smaller;
        }
    </style>
</head>

<body>
    <?php
        extract($_POST);
        $falha = false;

        // Array de livros
        $listalivros = array("Java como programar", "Use a cabeça Java", "C# como programar", "Use a cabeça C#");

        // Array com os sistemas operacionais
        $listasistemas = array("Windows XP", "Windows Vista", "Mac OS X", "Linux", "Other");

        // Array com os campos de texto
        $campoform = array("fname" => "Nome", "lname" => "Sobrenome", "email" => "Email", "phone" => "Fone");

        // Garantir que todos os campos foram preenchidos corretamente
        if (isset($submit)) {
            $formerrors["fnameerror"] = false;
            if ($fname == "") {
                $formerrors["fnameerror"] = true;
                $falha = true;
            }
            $formerrors["lnameerror"] = false;
            if ($lname == "") {
                $formerrors["lnameerror"] = true;
                $falha = true;
            }
            $formerrors["emailerror"] = false;
            if ($email == "") {
                $formerrors["emailerror"] = true;
                $falha = true;
            }
            $formerrors["phoneerror"] = false;
            if ( $phone == "") {
                $formerrors["phoneerror"] = true;
                $falha = true;
            }
        }

        if (!$falha) {
            $servidor = "localhost";
            $usuario = "root";
            $senha = "";
            $bancodados = "contatos";

            // Criar a conexão
            $conexao = new mysqli($servidor, $usuario, $senha, $bancodados);

            // Verificar a conexão
            if ($conexao->connect_error) {
                die("Conexão falhou: " . $conexao->connect_error);
            }

            $inserir = "INSERT INTO contato (nome, sobrenome, email, fone, publicacao, sistema)
                        VALUES ('$fname', '$lname', '$email', '$phone', '$livros', '$os')";

            if ($conexao->query($inserir) === true) {
                echo "<span class='prompt'>Dados inseridos com sucesso!</span>";
            } else {
                echo "Erro: " . $inserir . "<br>" . $conexao->error;
            }

            $conexao->close();
        }

        print("<h1>Registro de dados</h1>
            Por favor, preencha todos os campos e clique em Registrar.</br></br>");

        if ($falha) {
            print("<br /><span class='avisoerro'>
                Os campos com * são obrigatórios.</span>");
        }

        print("<!--posta os dados no form.php-->
            <form method='post' action='consultacontatos.php'>
            <h3>Informações do usuário</h3>
            </br></br>
            <span class='prompt'>
            Por favor, preencha os campos abaixo. </br></span>
            <!--cria os quatros campos de texto, campos do form, entradas, alternativas-->");
        foreach ($campoform as $inputname => $inputalt) {
            print("$inputalt <input type='text'
                name='$inputname' value='" . (isset($$inputname) ? $$inputname : '') . "'/>");

            if (isset($formerrors) && $formerrors[($inputname) . "error"] == true) {
                print("<span class='error'>*</span>");
            }

            print("<br/>");
        } //fim do foreach

        if (isset($formerrors) && $formerrors["phoneerror"]) {
            print("<span class='error'>");
        } else {
            print("<span class='smalltext'");
        }
        print("Este deve ser o formato correto (555)555-555
                </span><br/><br/>
                <h3>Publicações</h3>
                <span class='prompt'>
                Qual livro gostaria de informações?
                </span><br/>
                <!--Criar a lista drop down com nomes dos livros-->
                <select name = 'livros'> ");
      
              foreach ($listalivros as $livrocorrente)
              {
                  print ("<option");
                  if (isset($livros) && ($livrocorrente == $livros))
                  print (" select = 'true'");
      
                  print (">$livrocorrente</option>");
              } //fim do for each

        print("</select><br /><br/>
            <h3>Sistemas operacionais</h3>
            <br/><span class='prompt'>
            Qual sistema operacional você está usando atualmente?
            <br/></span>
            <!--Cria cinco botoes de radio-->");

        $counter = 0;

        foreach ($listasistemas as $sistemacorrente) {
            print("<input type='radio' name='os'
                value='$sistemacorrente'");

            if (isset($os) && ($sistemacorrente == $os)) {
                print("checked='checked'");
            } elseif (isset($os) && !$os && $counter == 0) {
                print("checked='checked'");
            }
            print("/>$sistemacorrente");

            //colocar uma quebra de linha na lista de SO
            if ($counter == 1) {
                print("<br/>");
            }
            ++$counter;
        } // fim do foreach
        print("<!--criar o botao enviar-->
            <br/><input type='submit' name='submit'
            value='Registrar' /></form></body></html>");
    ?>
