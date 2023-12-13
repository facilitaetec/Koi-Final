<?php
require_once('pdo.php');

$_SESSION["logado"]=false;

if(isset($_POST["email"], $_POST["password"]))
{
    $email=$_POST["email"];
    $senha=$_POST["password"];
}


// prepara a instrução SQL
$stmt = $conn->prepare("SELECT * FROM tb_usuario WHERE mail_user = :email AND snh_user = :pass");

// vincula o parâmetro :email e :password ao parâmetro do vinculo correspondente
$stmt->bindParam(':email', $email);
$stmt->bindParam(':pass', $senha);

// executa a instrução SQL
$stmt->execute();

// recupera a linha
$row = $stmt->fetch(PDO::FETCH_OBJ);

if($row) {
    // redireciona o usuário para a página desejada
    $_SESSION['nm_user'] = $row->nm_user;
    $_SESSION['user_id'] = $row->cd_user;
    $_SESSION["logado"]=true;
    header("Location: perfilusuario1.php");
} else {
    $_SESSION["logado"]=false;
    echo"Senha errada!";
    // informa o usuário de que as credenciais estão incorretas
}  
?>    