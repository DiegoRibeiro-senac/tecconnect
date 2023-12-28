<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../statics/css/acordeon.css">
    <link rel="stylesheet" href="../statics/css/estilo.css">
    <link rel="stylesheet" href="../statics/css/footer.css">
    <link rel="stylesheet" href="../statics/css/formulario.css">
    <link rel="stylesheet" href="../statics/css/modal-request.css">
    <title>TEC CONNECT</title>
</head>

<body>
    <header>
<!-- popup -->
        <div id="overlay"></div>

        <div id="popup">
            <img id="imagem-popup" class="imagem-popup" src="../statics/img/PopUp.png" alt="Imagem do Pop-up">
            <div id="fechar" onclick="fecharPopup()">X</div>
            <div id="fechar-final" onclick="fecharPopup()">Fechar</div>
        </div>
<!-- fim -->


        <div class="logo">
            <a href="index.html">
                <img class="img" src="../statics/img/logo.svg" alt="">
            </a>
        </div>

        
        <ul id="ul" class="links">
            
            <li id="li">
                <a href="#curso">Cursos</a>
            </li>
            
            <li id="li">
                <a href="#" class="ingresso open-modal">Inscrição</a>
            </li>
        </ul>
    </header>
    
    <img src="../statics/img/banner.jpg" class="banner" alt="banner">

    <main class="main">
        <section class="section">
            <div class="texto1">
                <h1>
                    EVENTOS DE CURSOS, <br> E INOVAÇÃO DO <br> TÉCNICO EM INFORMÁTICA <br> PARA O SENAC
                </h1>

                <p class="subtitle">
                    <strong>27, 28, 29 de setembro</strong> <br>
                    Rua: Governador Florentino Ávidos, 80 – Bairro - Nossa Sra. da Conceição, Linhares - ES
                </p>
            </div>
        </section>
    </main>

    <!-- letreiro -->
    <div class="letreiro">
        <div class="texto">Inovação</div>
        <div class="texto">Conexão</div>
        <div class="texto">Inovação</div>
        <div class="texto">Conexão</div>
        <div class="texto">Inovação</div>
        <div class="texto">Conexão</div>
        <div class="texto">Inovação</div>
        <div class="texto">Conexão</div>
        <div class="texto">Inovação</div>
        <div class="texto">Conexão</div>
        <div class="texto">Inovação</div>
        <div class="texto">Conexão</div>
    </div>


    
    <div class="container">

        <video class="video" autoplay loop muted>
        <source src="../statics/img/video.mp4" type="video/mp4">
        </video>

        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a class="first" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Por que participar do Tec Connect ?
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <p>Participar do Tec Connect é uma escolha inteligente para todos os amantes da tecnologia. É uma oportunidade para aprender com especialistas, <br> fazer conexões valiosas, explorar inovações e preparar-se para um futuro empolgante. Não perca a chance de se envolver com a tecnologia de forma prática e divertida. Junte-se a nós e faça parte desta experiência única!</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Para quem é o Tec connect?
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Para todos os alunos que visam se aperfeiçoar ou conhecer uma nova área e almejam um futuro próspero de novas oportunidades.</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    O que é o Tec Connect ?
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>O Tec Connect é uma iniciativa da turma de técnico em informática para internet que consiste em conectar pessoas a cursos relacionada a tecnologias, propondo conhecimento necessário para prosperar em um mundo movido pela tecnologia, Comprometemo-nos com a excelência no ensino e no conteúdo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    
    <div class="cont1" id="curso">

        <div class="cont">
            <div class="estatico">Aprenda</div>
            <ul class="dinamico">
                <li><span>Canva</span></li>
                <li><span>Excel</span></li>
                <li><span>Windows</span></li>
                <li><span>Nuvem</span></li>
            </ul>
        </div>
        
    <div class="cont-card">
        <div class="card">
            <img class="icone" src="../statics/img/canva-logo.svg" alt="">
            <div class="content">
                <h3>Canva</h3>
                <p>Aprenda a usar o Canva uma ferramenta essencial para qualquer pessoa que lida com design, desde designers gráficos até empreendedores que desejam criar conteúdo visual atraente.</p>
                <a href="#canva3" class="mais">Saiba mais..</a>
            </div>
        </div>

        <div class="card">
            <img class="icone3" src="../statics/img/excel.png" alt="">
            <div class="content">
                <h3>Excel</h3>
                <p>Aprenda Excel uma ferramenta essencial para qualquer pessoa que lida com dados, desde profissionais de finanças até analistas de marketing.</p>
                <a href="#excel3"class="mais">Saiba mais..</a>
            </div>
        </div>

        <div class="card">
            <img class="icone2" id="img" src="../statics/img/Windows.png" alt="">
            <div class="content">
                <h3>Windows</h3>
                <p>Aprenda a mexer no Microsoft Windows um sistema operacional essencial para qualquer pessoa que use computadores, desde usuários domésticos até profissionais de TI.</p>
                <a href="#windows3"class="mais">Saiba mais..</a>
            </div>
        </div>
        
        <div class="card">
            <img class="icone1" src="../statics/img/nuvem.png" alt="">
            <div class="content">
                <h3>Nuvem</h3>
                <p>Entenda o funcionamento basico do armazenamento em nuvem feito par aqueles desejam aproveitar a flexibilidade e eficiência da tecnologia.</p>
                <a href="#nuvem3"class="mais">Saiba mais..</a>
            </div>
        </div>
    </div>
</div>

<?php include './detail-container.php' ?>
<link rel="stylesheet" href="../statics/css/detail-container.css">

<!-- FOOTER  -->
<footer>
    <div id="footer_content">
        <div id="footer_contacts">
            <img class="logo" src="../statics/img/logo.svg" alt="">
            <h1>Tec Connect</h1>
        </div>
        <ul class="footer-list">
            <li>
                <h3 class="cl">Front-Ends</h3>
            </li>
            <li>
                <a class="footer-link">Arthur Meireles</a>
            </li>
            <li>
                <a class="footer-link">Caio Oliveira</a>
            </li>
            <li>
                <a class="footer-link">Matheus Meireles</a>
            </li>
            <li>
                <a class="footer-link">Pedro Vieira</a>
            </li>
            <li>
                <a class="footer-link">Roney Jacinto</a>
            </li>
            <li>
                <a class="footer-link">Tiago Teixeira</a>
            </li>
            <li>
                <a class="footer-link">Vinícius Maradones</a>
            </li>
        </ul>
        <ul class="footer-list">
            <li>
                <h3 class="cl">Back-End</h3>
            </li>
            <li>
                <a class="footer-link">Christian Morati</a>
            </li>
            <li>
                <a class="footer-link">Deivid Vieira</a>
            </li>
            <li>
                <a class="footer-link">Pablo Ouverney</a>
            </li>
            <li>
                <a class="footer-link">Vitor Carvalho</a>
            </li>
        </ul>
        <div id="footer_subscribe">
            <ul class="footer-list">
            <h3>Scrum Master</h3>
            <li>
                <a class="footer-link">Raianny Aguilar</a>
            </li>
            </ul>
            
                <ul class="footer-list">
                <h3>Product Owner</h3>
                <li>
                    <a class="footer-link">Prof. Diego Ribeiro</a>
                </li>
                </ul>
        </div>
    </div>
    <div id="footer_copyright">
        &#169
        2023 Todos Direitos Reservado para Técnico de Informática para Internet - Turma 44/23 
    </div>

</footer>



<chat-bot platform_id="46382c67-ae50-4166-8c89-d2efd865db34" user_id="a5e44ffb-71c0-4988-8e77-c027c9184010" chatbot_id="2d75130b-7b25-47fa-a22f-6e05e8fd75b9"><a href="https://www.chatsimple.ai/?utm_source=widget&utm_medium=referral">[chatbot]</a></chat-bot><script src="https://chatsimple-widget.s3.us-east-2.amazonaws.com/chat-bot-loader.js" defer></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

    <script type="text/javascript"  src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../statics/js/vanilla-tilt.js"></script>

    <script type="text/javascript" src="../js-modules/inscritoModule.js"></script>

    <script>
        VanillaTilt.init(document.querySelectorAll(".card"), {
            max:10,
            speed:900,
        });
    </script>

    <script src="../statics/js/script.js"></script>
</body>

</html>