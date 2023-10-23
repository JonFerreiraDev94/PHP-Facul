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
            font-family: sans-serif;
            font-size: smaller;
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

        //Array de titulos de livros
        $listalivros = array("Java como programar", "Use a cabeça java", 
        "C# como programar", "Use a cabeça C#");

        //Array com os sistemas operacionais
        $listasistema = array("Windows XP", "Windows vista", "Mac Os X",
        "Linux", "Outros");

        //Array com o campo de texto
        $campoform = array ("fname" => "Nome", "lname" => "Sobrenome" , 
        "email" => "Email", "phone" => "fone" );

        //Garantir que todos os campos foram preenchidos corretamente
        if (isset ($submit))
        {
            $formerrors ["fnameerror"] = false;
            if ($fname == "")
            {
                $formerrors ["fnameerror"] = true;
                $falha = true;

            }
            $formerrors["lnameerror"] = false;
            if ($lname == "")
            {
                $formerrors["lnameerror"] = true;
                $falha = true;
            }
            $formerrors["emailerror"] = false;
            if ($email == "")
            {
                $formerrors["emailerror"] = true;
                $falha = true;
            }
            $formerrors ["phoneerror"] = false;
            if(!preg_match("/^\([0-9]{3}\) [0-9]{3} [0-9]{4}$/", $phone))
            {
                
                $formerrors["phoneerror"] = true;
                $falha = true;
            }
            if ( !$falha )
            {
            }   //fim do if
            }   //fim do if
    print ("<h1>Registro de dados.</h1>
        Por favor, preencha todos os campos e clique em registrar.");
            if ($falha)
            {
                print( "<br /><span class = 'avisoerro'>
                    Os campos com * são obrigatórios.</span>");
            }
            print ("<!--posta os dados no form.php-->
                <form method = 'post' action = 'testeform.php'>");
    print("<h3>Informações do usuário</h3>
            <span class = 'prompt'>
            Por favor, preencha os campos abaixo. <br/></span>");
            
            #cria os quatro campos de texto, campos de form, entradas, alternativas
            foreach ($campoform as $inputname => $inputalt)
            {
                print( " $inputalt <input type = 'text'
                    name = '$inputname' value = '". (isset($$inputname) ? $$inputname: '')."'/>");

                    if (isset($formerrors) && $formerrors [($inputname)."error"] == true)
                        print("<span class = 'error'>*</span>");
                        print ("<br/>");    
            } // fim do foreach

            if (isset ($formerrors) && $formerrors["phoneerror"])
                print("<span class = 'error'>");
            else
                print("<span class = 'smalltext'>");
    print ("Este deve ser o formato correto (555)555-555
        </span><br/><br/>
         <h3>Publicações</h3>
          Qual livro gostaria de informações?
          <span class = 'prompt'>
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
    
    print ("</select><br /><br/>
            <h3>Sistemas operacionais</h3>
            <br/><span class = 'prompt'>
            Qual sistema operacional você está usando atualmente?
            <br/></span>

            <!--cria cinco botões de rádio --> ");
    
    $counter = 0;

    foreach ($listasistema as $sistemacorrente)
    {
        print("<input type = 'radio' name = 'os'
            value = '$sistemacorrente'");
        
        if (isset($os) && ($sistemacorrente == $os))
            print("checked = 'checked'");
            elseif (isset($os) && !$os && $counter == 0)
            print("checked = 'checked'");
        
        print (" />$sistemacorrente");

        //colocar uma quebra de linha na lista de sitemas operacinais
        if ($counter == 1) print ("<br/>");
        ++$counter;

    }   //fim do foreach
    print ( "<!--criar o botão de enviar-->
        <br/><input type = 'submit' name = 'submit'
        value = 'Registrar' /></form></body></html>");
        
                 
    ?>

