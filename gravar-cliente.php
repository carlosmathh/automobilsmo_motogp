<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'followmotors';

//endereço servidor, nome do usuario, senha do usuario, nome do banco de dados//
$con = new mysqli('localhost', 'root', '', 'followwmotors');

  if ($con->connect_error) {
    die("Falha na conexão: " . $con->connect_error);
 }
 $nome = $email = $telefone = $datanascimento = $cidade = $estado = '';

 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recuperar dados do formulário
    $nome = isset($_POST['nome']) ? $con->real_escape_string($_POST['nome']) : '';
    $email = isset($_POST['email']) ? $con->real_escape_string($_POST['email']) : '';
    $telefone = isset($_POST['telefone']) ? $con->real_escape_string($_POST['telefone']) : '';
    $datanascimento = isset($_POST['datanascimento']) ? $con->real_escape_string($_POST['datanascimento']) : '';
    $cidade = isset($_POST['cidade']) ? $con->real_escape_string($_POST['cidade']) : '';
    $estado = isset($_POST['estado']) ? $con->real_escape_string($_POST['estado']) : '';

    echo "Nome: " . $nome . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Telefone: " . $telefone . "<br>";
    echo "Data de Nascimento: " . $datanascimento . "<br>";
    echo "Cidade: " . $cidade . "<br>";
    echo "Estado: " . $estado . "<br>";
    
    if (empty($nome) || empty($email) || empty($telefone) || empty($datanascimento) || empty($cidade) || empty($estado)) {
        die("Erro: Todos os campos são obrigatórios."); 
    }
 }

    $sql = "INSERT INTO clientes (nome, email, telefone, datanascimento, cidade, estado) VALUES ('".$nome. "', '".$email."', '".$telefone."',
     '".$datanascimento."', '".$cidade. "', '".$estado."')";

     if ($con->query($sql) === TRUE) {
        echo "Dados Gravados com Sucesso!";
    } else {
        die("Erro ao gravar dados: " . $sql . "<br>" . $con->error);
    }
    $con->close();
?>