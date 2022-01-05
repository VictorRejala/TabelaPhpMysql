<?php

include("conexao.php");

$clientes = [
        
    0 => [

        'nome' => "Leandro",
        'email' => "leandro@tinsights.com.br",
        'telefone' => 71988770022
    ],
    1 => [

        'nome' => "Victor",
        'email' => "victorrejala@gmail.com",
        'telefone' => 71920000173
    ],
    2 => [

        'nome' => "Emilia",
        'email' => "emiliasherlock@hotmail.com",
        'telefone' => 71940028922
    ],
    3 => [

        'nome' => "João",
        'email' => "joaosalvador@outlook.com",
        'telefone' => 71988210687
    ]
];

function montaTr ($cliente, $i) {

    $nome = ucfirst($cliente[$i]['nome']);
    $email = strtolower($cliente[$i]['email']);
    $telefone = $cliente[$i]['telefone'];

    echo "<tr>";
    echo "<td>$nome </td>";
    echo "<td>$email </td>";
    echo "<td>$telefone </td>";
    echo "</tr>";
}

function verificaNaTabela($clientes, $telefone) {

    $telefoneCadastrado = False;
    $telefonesCadastrados = array();

    for($i=0; $i < count($clientes);$i++) {

    
        $telefonesCadastrados[$i] = ($clientes[$i]['telefone']);
    }
    if (in_array($telefone, $telefonesCadastrados)) {

        $telefoneCadastrado = True;
    }

    return $telefoneCadastrado;
}

//Pegando os dados do Banco de Dados
$sql = 'SELECT * FROM clientes.cadastro';
if($res=mysqli_query($conn, $sql)) {

    $nomeBd = array();
    $emailBd = array();
    $telefoneBd = array();

    for($i=0; $reg=mysqli_fetch_assoc($res); $i++) {

        $nomeBd[$i] = $reg['NOME'];
        $emailBd[$i] = $reg['EMAIL'];
        $telefoneBd[$i] = $reg['TELEFONE'];

        $clienteCadastrado[$i] = verificaNaTabela($clientes, $telefoneBd[$i]);

        if (!$clienteCadastrado[$i]) {

            $clientes[] = [

                'nome' => $nomeBd[$i],
                'email' => $emailBd[$i],
                'telefone' => $telefoneBd[$i]
                ];
        }
    }
}

//Pegando os dados quando cadastrar
if($_POST) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $clienteExiste = verificaNaTabela($clientes, $telefone);

    if ($clienteExiste) {

        echo ("<p style=color:red;font-size:1.5em>Cliente já cadastrado!</p>");
    } else {

        echo ("<p style=color:green;font-size:1.5em>Cliente cadastrado com sucesso!</p>");
        $clientes[] = [

            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone
        ];
    }

    $result_cliente = "INSERT INTO clientes.cadastro (NOME, EMAIL, TELEFONE) 
        VALUES ('$nome', '$email', '$telefone')";

    mysqli_query($conn, $result_cliente);
}
