<!DOCtyPE html>
<html lang="pt-br">

<head>
    
    <meta charset="utf-8"/>
    <title>Desafio 3 </title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    
</head>
<body>

    <?php 

        include("clientes.php");
    ?>

    <h1>Cadastrar Cliente</h1>

    <form method="POST" action="">

        <label>Nome: </label>
        <input type="text" name="nome" required placeholder="Digite o nome do cliente"><br>

        <label>E-mail: </label>
        <input type="email" name="email" required placeholder="Digite o e-mail do cliente"><br>

        <label>Telefone: </label>
        <input type="phone" name="telefone" required placeholder="Digite o telefone do cliente"><br>

        <input class="limpar" type="reset" value="Limpar"> 
        <input class="botao" type="submit" value="Cadastrar">

    </form>

    <h1> Tabela de Clientes </h1>

    <table border=5px solid black width=40%>

        <tr>
            <th>Nome </hd>
            <th>E-mail </hd>
            <th>Telefone </hd>
        </tr>

        <?php
            for($i=0; $i < count($clientes); $i++) {

                montaTr($clientes, $i);
            }
        ?>

    </table>

</body>
</html>