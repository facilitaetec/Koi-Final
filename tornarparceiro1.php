<?php
    $servername = "localhost";
    $username = "root";
    $password = "usbw";
    $dbkoi = "bd_koi";
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbkoi", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["email"], $_POST["password"]))
    {
        // Obtém os dados do formulário
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $number = $_POST['number'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $agency = $_POST['agency'];
        $account = $_POST['account'];
        
        // Verifica se as senhas são iguais
        if ($password != $confirmPassword) {
        die("As senhas não coincidem");
        }
    
        // Insere os dados no banco de dados
        $sql = "INSERT INTO tb_parceiro (nm_parc, mail_parc, ender_parc, tel_parc, snh_parc, agencia_parc, conta_parc) VALUES ('$name', '$email', '$address', '$number', '$password', '$agency', '$account')";
        
        if ($conn->query($sql)) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar: ";
        }
        exit;
    }    
    ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/koilogo.png" type="png" sizes="12x12 16x16 32x32 48x48">
        <title>Torne-se parceiro!</title>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: sans-serif;
    }

    body {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #fcf3e4;
    }

    .container {
        width: 80%;
        height: 80vh;
        display: flex;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.212);
    }

    .form-image {
        width: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #d74a05;
        padding: 1rem;
        border-radius: 5px;
    }

    .form-image img {
        width: 31rem;
    }

    .form {
        width: 50%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #fcf3e4;
        padding: 3rem;
    }

    .form-header {
        margin-bottom: 1rem;
        display: flex;
        justify-content: space-between;
        margin-top: 9%;
    }

    .login-button {
        display: flex;
        align-items: center;
    }

    .login-button button {
        border: 2px solid #d74a05 !important;
        background-color: #fcf3e4;
        padding: 0.4rem 1rem;
        border-radius: 5px;
        cursor: pointer;
        
        
    }
    .login-button button:hover {
        background-color: #d74a05;
        color: #fcf3e4;
    }

    .login-button button:hover a{
        background-color: #d74a05;
        color: #fcf3e4;
        font-weight: bold;
    }
            
            

    .login-button button a {
        text-decoration: none;
        font-weight: 500;        
        background: #fcf3e4;
        color: #d74a05;
        font-weight: bold;
        
    }

    .form-header h1::after {
        content: '';
        display: block;
        width: 5rem;
        height: 0.3rem;
        background-color: #d74a05;
        margin: 0 auto;
        position: absolute;
        border-radius: 10px;
    }

    .input-group {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 1rem 0;
        height: 60%;
    }

    .input-box {
        display: flex;
        flex-direction: column;
        margin-bottom: 1.1rem;
    }

    .input-box input {
        margin: 0.6rem 0;
        padding: 0.8rem 1.2rem;
        border: none;
        border-radius: 10px;
        box-shadow: 1px 1px 6px #190600;
        font-size: 0.8rem;
    }

    .input-box input:hover {
        background-color: #fcf3e4;
        
    }

    .input-box input:focus-visible {
        outline: 1px solid #d74a05;
    }

    .input-box label,
    .gender-title h6 {
        font-size: 0.75rem;
        font-weight: 600;
        color: #190600;
    }

    .input-box input::placeholder {
        color: #190600;
    }


    .continue-button button {
        width: 100%;
        margin-top: 2.5rem;
        border: none;
        background-color: #d74a05;
        padding: 0.62rem;
        border-radius: 5px;
        cursor: pointer;
    }

    .continue-button button:hover  {
        background-color: #fcf3e4;
        border: 2px solid #d74a05 ;
        color: #d74a05 !important;
    }

    .continue-button button a {
        text-decoration: none;
        font-size: 0.93rem;
        font-weight: 500;
        color: #fcf3e4;
        font-weight: bold;
    }
    .continue-button button:hover a{
        color: #d74a05;
        font-weight: bold;
    }

    @media screen and (max-width: 1330px) {
        .form-image {
            display: none;
        }
        .container {
            width: 50%;
        }
        .form {
            width: 100%;
        }
    }

    @media screen and (max-width: 1064px) {
        .container {
            width: 90%;
            height: auto;
        }
        .input-group {
            flex-direction: column;
            z-index: 5;
            padding-right: 5rem;
            max-height: 10rem;
            overflow-y: scroll;
            flex-wrap: nowrap;
        }
        .gender-inputs {
            margin-top: 2rem;
        }
        .gender-group {
            flex-direction: column;
        }
        .gender-title h6 {
            margin: 0;
        }
        .gender-input {
            margin-top: 0.5rem;
        }
    }
</style>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="img/koilogo.png" alt="">
        </div>
        <div class="form">
            <form method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Torne-se parceiro</h1>
                    </div>
                </div>
                <div class="input-group">

                    <div class="input-box">
                        <label for="name">Digite seu nome completo</label>
                        <input id="name" type="text" name="name" placeholder="Digite seu nome completo" required>
                    </div>

                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="input-box">
                        <label for="address">Endereço</label>
                        <input id="address" type="text" name="address" placeholder="Digite seu endereço" required>
                    </div>

                    <div class="input-box">
                        <label for="number">Celular</label>
                        <input id="number" type="tel" name="number" placeholder="(xx) xxxx-xxxx" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
                    </div>


                    <div class="input-box">
                        <label for="confirmPassword">Confirme sua Senha</label>
                        <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Digite a senha novamente" required>
                    </div>

                    <div class="input-box">
                        <label for="agency">Agência</label>
                        <input id="agency" type="agency" name="agency" placeholder="Digite o número de sua agência" required>
                    </div>


                    <div class="input-box">
                        <label for="account">Conta</label>
                        <input id="account" type="account" name="account" placeholder="Digite o número de sua conta" required>
                    </div>

                </div>


                <div class="continue-button">
                    <button><a href="perfilparceiro.html">Continuar</a> </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>