<?php
require_once('pdo.php');

    // Verifica se o usuário está logado
    if (isset($_SESSION['logado']) && $_SESSION['logado']==true) {

        // Obtém o resultado
        $username = $_SESSION['nm_user'];
    } else {
        // Caso o usuário não esteja logado, redirecione para a página de login
        header("Location: login.html");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Perfil</title>

    <link rel="icon" href="img/koilogo.png" type="png" sizes="12x12 16x16 32x32 48x48">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,600;1,100;1,200;1,300;1,400;1,500;1,600&family=Oswald&family=Poppins:ital,wght@0,500;0,600;0,700;0,900;1,400&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            cursor: pointer;
            text-decoration: none;
            font-family:  sans-serif;
            text-align: center;
        }

        body {
            background-color: #fcf3e4;
            color: #190600;
            font-family:  sans-serif;
        }

        .navbar,
        footer {
            background-color: #d74a05;
            color: #fcf3e4;
            padding: 10px;
        }
       

        li {
            font-weight: bold;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            justify-content: flex-end; /* Alterado para flex-end */
        }

        .nav-menu li {
            list-style: none;
            display: inline-block;
        }

        .nav-menu button {
            background: #d74a05;
            border: none;
            color: #fcf3e4;
            cursor: pointer;
            padding: 10px;
            font-size: 16px;
            flex: 1;
            margin: 0 3px ;
            transition: background-color 0.3s ease;
            font-weight: bold;
            justify-content: flex-end !important;
        }

        .nav-menu button:hover {
            background-color: #fcf3e4;
            color: #d74a05;
        }

        section {
            background-color: #d74a05 0.5;
            width: 80%;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(17, 17, 17, 0.2);
        }
        #koilogonavbar{
            width:10% ;
            height: 45px;
            float: left;
            
        }

        @media(max-width: 1200px) {
            section {
                width: 100%;
            }
        }

        footer {
            margin-top: 20px;
            height: 20vh;
            padding: 2%;
            /* Justifique footer */
        }

        /* Adicionado estilo para remover a decoração de texto dos links no footer */
        footer a {
            text-decoration: none;
            color: #fcf3e4;
        }

        /* Adicionado estilo para remover o sublinhado específico para a palavra "Sobre Nós" no footer */
        footer #sobrenostitulo {
            text-decoration: none;
            color: #fcf4e4;
            border-bottom: none;
        }

        #resumo {
            text-align: justify;
        }
        .botao {
            background-color: #d74a05;
            color: #fcf3e4;
            border: none;
            margin-left: 2%;
            margin-right: 2%;
            display: inline-flex;
            
            
        }
        .botao :hover{
            background-color: white;
            color: #d74a05;
            border-radius: 10px;
        }
        .botao a{
            color: #fcf3e4;
        }
        .img-fluid {
            margin-top: 6%;
            border-radius: 10px;
            margin-bottom: 3%;
        }
        .classificacao {
            background-color: #FFE2B1;
            width: 584px;
            height: 494px;
            flex-shrink: 0;
            border-radius: 10px;
            margin-left: 30%;
        }
        .servicos-text {
            width: 441px;
            height: 38px;
            flex-shrink: 0;
            color: #454545;
            text-align: center;
            font-size: 30px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            letter-spacing: 1.5px;
            margin-left: 35%;
        }
        .situacao {
            color: #009688;
            text-align: center;
            font-size: 26px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }
        .card {
            width: 564px;
            height: 213px;
            flex-shrink: 0;
            border-radius: 20px;
            background: #FFE2B1;
            border: none;
            text-align: justify;
        }
        .transacoes-tittle {
            color: #D74A05;
            font-size: 48px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            letter-spacing: 9.6px;
            margin-top: 10%;
        }
        .transacoes-espaco {
            width: 1208px;
            height: 183px;
            flex-shrink: 0;
            background: #FFE2B1;
            margin-top: 4%;
            margin-bottom: 4%;
        }
        section {
            box-shadow: none;
        }
        .tittle-servico {
            color: #000;
            font-size: 28px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            letter-spacing: 1.4px;
            margin-left: 20%;
            margin-top: -10%;
            text-align: justify;
        }

    </style>
</head>

<body>

    
<header>
    <div class="navbar" style="gap: 10px;">
        <img src="img/koilogo.png" style="width: 6%;margin-left: 10%;">
        <div style="width: 50%; display: inline-flex;gap: 10%;">
            <button class="botao"><a href="postagensarea.html"><b>Serviços</b></a></button>
            <button class="botao"><a href="sobre.html"><b>Sobre</a></b></button>
            <button class="botao"><a href="tornarparceiro1.php"><b>Alterar perfil</b></a></button>
        </div>
        
    </div>

</header>

<div class="...">
    <img src="img/makedit.jpg" class="img-fluid" alt="...">
</div>
    <!-- informacoes -->
<div class="..." style="margin-right: 60%;">
    <h1 style="display: inline-flex;"><b><?php echo $username; ?></b></h1>
    <p style="margin-right: 6%;margin-top: 2%;font-size: 130%;margin-bottom: -2%;"><b>
        Membro desde de 14 / 02 / 2023
    </b></p>
</div>

<span>
    <svg xmlns="http://www.w3.org/2000/svg" width="1182" height="5" viewBox="0 0 1182 5" fill="none">
        <path d="M0.5 2.5H1182" stroke="#D74A05" stroke-width="4"/>
      </svg>
</span>
<br>
<span class="local" style="margin-left: -63%;font-size: 130%;">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="33" viewBox="0 0 25 33" fill="none">
        <path d="M11.2154 32.3495C1.75586 19.0853 0 17.724 0 12.8492C0 6.17185 5.59642 0.758789 12.5 0.758789C19.4036 0.758789 25 6.17185 25 12.8492C25 17.724 23.2441 19.0853 13.7846 32.3495C13.1639 33.2169 11.8361 33.2168 11.2154 32.3495ZM12.5 17.8869C15.3765 17.8869 17.7083 15.6315 17.7083 12.8492C17.7083 10.067 15.3765 7.81155 12.5 7.81155C9.6235 7.81155 7.29167 10.067 7.29167 12.8492C7.29167 15.6315 9.6235 17.8869 12.5 17.8869Z" fill="black"/>
      </svg>
    Itanhaém - Jardim Suarão / SP
</span>

<!-- quadrado da classificação -->
<div class="classificacao" style="margin-top: 4%;padding: 1%;">

    <p class="titulo" style="margin-left: 3%;">
        Classificação
    </p>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="50" viewBox="0 0 45 50" fill="none">
        <path d="M34.7919 49.43C34.2572 49.43 33.7251 49.2416 33.2672 48.8662L22.5003 40.0011L11.7334 48.8662C10.8162 49.6199 9.58531 49.6199 8.6734 48.8541C7.76149 48.0958 7.37766 46.7495 7.71913 45.5201L11.7347 30.6405L1.06444 22.0079C0.157821 21.2405 -0.219385 19.8911 0.127379 18.6603C0.476791 17.4325 1.47208 16.5982 2.59708 16.5891L15.8125 16.5663L20.02 2.05597C20.3747 0.826644 21.374 0 22.5003 0C23.6266 0 24.6259 0.828164 24.9819 2.05597L29.1179 16.5663L42.4009 16.5891C43.5298 16.5982 44.5264 17.434 44.8719 18.6603C45.22 19.8911 44.8428 21.2405 43.9348 22.0079L33.2645 30.6405L37.2801 45.5201C37.6242 46.7495 37.2365 48.0958 36.3272 48.8541C35.8679 49.24 35.3306 49.43 34.7919 49.43Z" fill="#D74A05"/>
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" width="45" height="50" viewBox="0 0 45 50" fill="none">
        <path d="M34.7919 49.43C34.2572 49.43 33.7251 49.2416 33.2672 48.8662L22.5003 40.0011L11.7334 48.8662C10.8162 49.6199 9.58531 49.6199 8.6734 48.8541C7.76149 48.0958 7.37766 46.7495 7.71913 45.5201L11.7347 30.6405L1.06444 22.0079C0.157821 21.2405 -0.219385 19.8911 0.127379 18.6603C0.476791 17.4325 1.47208 16.5982 2.59708 16.5891L15.8125 16.5663L20.02 2.05597C20.3747 0.826644 21.374 0 22.5003 0C23.6266 0 24.6259 0.828164 24.9819 2.05597L29.1179 16.5663L42.4009 16.5891C43.5298 16.5982 44.5264 17.434 44.8719 18.6603C45.22 19.8911 44.8428 21.2405 43.9348 22.0079L33.2645 30.6405L37.2801 45.5201C37.6242 46.7495 37.2365 48.0958 36.3272 48.8541C35.8679 49.24 35.3306 49.43 34.7919 49.43Z" fill="#D74A05"/>
      </svg><svg xmlns="http://www.w3.org/2000/svg" width="45" height="50" viewBox="0 0 45 50" fill="none">
        <path d="M34.7919 49.43C34.2572 49.43 33.7251 49.2416 33.2672 48.8662L22.5003 40.0011L11.7334 48.8662C10.8162 49.6199 9.58531 49.6199 8.6734 48.8541C7.76149 48.0958 7.37766 46.7495 7.71913 45.5201L11.7347 30.6405L1.06444 22.0079C0.157821 21.2405 -0.219385 19.8911 0.127379 18.6603C0.476791 17.4325 1.47208 16.5982 2.59708 16.5891L15.8125 16.5663L20.02 2.05597C20.3747 0.826644 21.374 0 22.5003 0C23.6266 0 24.6259 0.828164 24.9819 2.05597L29.1179 16.5663L42.4009 16.5891C43.5298 16.5982 44.5264 17.434 44.8719 18.6603C45.22 19.8911 44.8428 21.2405 43.9348 22.0079L33.2645 30.6405L37.2801 45.5201C37.6242 46.7495 37.2365 48.0958 36.3272 48.8541C35.8679 49.24 35.3306 49.43 34.7919 49.43Z" fill="#D74A05"/>
      </svg><svg xmlns="http://www.w3.org/2000/svg" width="45" height="50" viewBox="0 0 45 50" fill="none">
        <path d="M34.7919 49.43C34.2572 49.43 33.7251 49.2416 33.2672 48.8662L22.5003 40.0011L11.7334 48.8662C10.8162 49.6199 9.58531 49.6199 8.6734 48.8541C7.76149 48.0958 7.37766 46.7495 7.71913 45.5201L11.7347 30.6405L1.06444 22.0079C0.157821 21.2405 -0.219385 19.8911 0.127379 18.6603C0.476791 17.4325 1.47208 16.5982 2.59708 16.5891L15.8125 16.5663L20.02 2.05597C20.3747 0.826644 21.374 0 22.5003 0C23.6266 0 24.6259 0.828164 24.9819 2.05597L29.1179 16.5663L42.4009 16.5891C43.5298 16.5982 44.5264 17.434 44.8719 18.6603C45.22 19.8911 44.8428 21.2405 43.9348 22.0079L33.2645 30.6405L37.2801 45.5201C37.6242 46.7495 37.2365 48.0958 36.3272 48.8541C35.8679 49.24 35.3306 49.43 34.7919 49.43Z" fill="#D74A05"/>
      </svg><svg xmlns="http://www.w3.org/2000/svg" width="45" height="50" viewBox="0 0 45 50" fill="none">
        <path d="M34.7919 49.43C34.2572 49.43 33.7251 49.2416 33.2672 48.8662L22.5003 40.0011L11.7334 48.8662C10.8162 49.6199 9.58531 49.6199 8.6734 48.8541C7.76149 48.0958 7.37766 46.7495 7.71913 45.5201L11.7347 30.6405L1.06444 22.0079C0.157821 21.2405 -0.219385 19.8911 0.127379 18.6603C0.476791 17.4325 1.47208 16.5982 2.59708 16.5891L15.8125 16.5663L20.02 2.05597C20.3747 0.826644 21.374 0 22.5003 0C23.6266 0 24.6259 0.828164 24.9819 2.05597L29.1179 16.5663L42.4009 16.5891C43.5298 16.5982 44.5264 17.434 44.8719 18.6603C45.22 19.8911 44.8428 21.2405 43.9348 22.0079L33.2645 30.6405L37.2801 45.5201C37.6242 46.7495 37.2365 48.0958 36.3272 48.8541C35.8679 49.24 35.3306 49.43 34.7919 49.43Z" fill="#D74A05"/>
      </svg>
    <br>
    <br>
    <p>
        Essa pessoa tem boa avaliação em nossa plataforma!
    </p>

</div>

<!-- histórico de serviços -->

<div class="..." style="margin-top: 10%;">

    <h2 class="servicos-text">
        SERVIÇOS
    </h2>
    <section style="display: inline-flex;box-shadow: none;gap: 60%;margin-left: 18%;">
        <span class="situacao">Em aberto</span>

        <span class="situacao">Finalizados</span>
    </section>

    <section style="box-shadow: none;width: 50%;margin-left:5%;display: inline-flexbox;">   
        <div style="display: inline-flex;gap: 10%; width: 100%;margin-top: 8%;">
            
            <section class="..." style="width: 564px;height: 213px;flex-shrink: 0;border-radius: 20px;
            background: #FFE2B1;padding: 2%;">

                <svg xmlns="http://www.w3.org/2000/svg" width="79" height="77" viewBox="0 0 79 77" fill="none" style="margin-right: 80%;">
                    <ellipse cx="39.5" cy="38.5" rx="39.5" ry="38.5" fill="#EFEFEF"/>
                  </svg>
                <p class="tittle-servico">Carpinagem</p>

            </section>

            <section class="..." style="width: 564px;height: 213px;flex-shrink: 0;border-radius: 20px;
            background: #FFE2B1;padding: 2%;">

                <svg xmlns="http://www.w3.org/2000/svg" width="79" height="77" viewBox="0 0 79 77" fill="none" style="margin-right: 80%;">
                    <ellipse cx="39.5" cy="38.5" rx="39.5" ry="38.5" fill="#EFEFEF"/>
                  </svg>
                <p class="tittle-servico">Conserto de telhado</p>

            </section>

        </div>
    </section>




</div>

    <h1 class="transacoes-tittle">Transações</h1>  
    <svg xmlns="http://www.w3.org/2000/svg" width="1182" height="5" viewBox="0 0 1182 5" fill="none">
        <path d="M0.5 2.5H1182" stroke="#D74A05" stroke-width="4"/>
      </svg>

    <div class="...">

        <section class="transacoes-espaco">
            <svg xmlns="http://www.w3.org/2000/svg" width="124" height="120" viewBox="0 0 124 120" fill="none" style="margin-left: -85%;">
                <ellipse cx="62" cy="60" rx="62" ry="60" fill="#D9D9D9"/>
              </svg>
            <div style="margin-top: -7%;line-height: 40%;width: 70%;margin-left: 15%;">
                <p style="text-align: justify;"><b>Situação do pagamento:</b> Em análise</p>
                <p style="text-align: justify;" ><b>Detalhes:</b> Em espera da conclusão do serviço requerido com exito.</p>
                <p style="text-align: justify;"><b>Prazo:</b> XX / XX / XXXX </p>
                <p style="text-align: justify;"><b>Valor:</b> R$ XXX , XX</p>
            </div>
            
        </section>

    </div>
    
<footer>
        
    <span style="display: inline-flex;width: 40%;margin-top: 3%;text-align: center;gap: 10%;font-size: large;">

        <!-- <button class="botao"><a h><b>Entre em contato</b></a></button> -->
            
    </span>
          
</footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
