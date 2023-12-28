<?php
try {
    include __DIR__ . '/../models/CursoModel.php';
    include __DIR__ . '/../models/CursosSenacModel.php';
    $CursoModel = new CursoModel();
    $CursosSenacModel = new CursosSenacModel();
    $cursos = $CursoModel->fetchAll();
    $cursos_senac = $CursosSenacModel->fetchAll();
} catch (\Exception $e) {
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Falha ao carregar página!</strong>
    <a class="btn btn-danger mx-3" href="http://tecconnect.website/app/pages/home">Regarregar</a>
    </div>';
    exit;
}

?>
<div id="fade" class="hide"></div>
<div id="modal" class="hide">
    <div class="modal-body">
        <div class="box">
            <form id="inscricao_form">
                <fieldset>
                    <legend><b>INSCREVA - SE</b></legend>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="nome_completo" id="nome_completo" class="inputUser" required autocomplete="off">
                        <label for="nome_completo" class="labelInput">Nome Completo</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <label for="id_curso_senac">Informe o seu Curso:</label>
                        <select name="id_curso_senac" id="id_curso_senac" class="inputUser" required>
                            <option value="" selected>Selecione</option>
                            <?php foreach ($cursos_senac as $curso) : ?>
                                <option value="<?= $curso->id_curso_senac ?>"><?= $curso->nome_curso_senac . ' - ' . $curso->codigo ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <label for="turno">Informe o seu Turno:</label>
                        <select name="turno" id="turno" class="inputUser" required>
                            <option value="" selected>Selecione</option>
                            <?php $turnos = array('Matutino', 'Vespertino', 'Noturno'); ?>
                            <?php foreach ($turnos as $turno) : ?>
                                <option value="<?= $turno ?>"><?= $turno ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <label for="id_curso">Selecione o curso desejado:</label>
                        <select name="id_curso" id="id_curso" class="inputUser" required>
                            <option value="" selected>Selecione</option>
                            <?php foreach ($cursos as $curso) : ?>
                                <?php if ($curso->vagas_disponiveis >= 1) : ?>
                                    <option value="<?= $curso->id_curso ?>"><?= $curso->nome_curso ?></option>
                                <?php else : ?>
                                    <option disabled value="<?= $curso->id_curso ?>"><?= $curso->nome_curso ?> - Sem vagas!</option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br><br><br>
                    <input type="submit" name="submit" class="submit" id="submit">
                </fieldset>
            </form> <br>
            <button id="close-modal" class="bn">Fechar</button>
        </div>
    </div>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <h1>Status da Inscrição</h3>
            <span id="inscrito_request_status">ulos complexos e análises de d</span>
            <div>
                <button class="modal_close_button" onclick="hideModal()">Fechar</button>
            </div>
    </div>
</div>

<section class="sc">
    <article class="detail-container excel" id="excel3">
        <h3><img class="icon-middle" src="../statics/icons/spreadsheets.png" alt=""> Microsoft Excel</h1>
            <p>Acontecerá no dia 29 na sala 1</p>
            <hr>
            <h2 class="h2">O que você aprenderá <img class="icon" src="../statics/icons/learning.png" alt=""></h2>
            <ul class="1">
                <li>
                    <p>Criar e formatar planilhas profissionais;</p>
                </li>
                <li>
                    <p>Realizar cálculos complexos e análises de dados;</p>
                </li>
            </ul>

            <ul class="2">
                <li>
                    <p>Construir gráficos e visualizações impressionantes;</p>
                </li>
                <li>
                    <p>Automatizar tarefas com fórmulas e macros;</p>
                </li>
                <li>
                    <p>Gerenciar grandes conjuntos de dados com facilidade</p>
                </li>
            </ul>

            <hr>
            <h2 class="h2">Público Alvo <img class="icon" src="../statics/icons/target.png" alt=""></h2>
            <p>Este curso é perfeito para iniciantes e intermediários que desejam se destacar no uso do Excel no ambiente de trabalho. Nossos instrutores experientes o guiarão passo a passo, e você sairá do curso com as habilidades necessárias para se tornar um especialista em Excel.</p>

            <div class="center">
                <button class="btn open-modal">Garanta sua vaga!</button>
            </div>
    </article>

    <article class="detail-container canva" id="canva3">
        <h3><img class="icon-middle" src="../statics/icons/design.png" alt=""> Canva</h3>
        <p>Acontecerá no dia 28 na sala 2</p>
        <hr>
        <h2 class="h2">O que você aprenderá <img class="icon" src="../statics/icons/learning.png" alt=""></h2>
        <ul>
            <li>
                <p>Aprenda a criar designs incríveis;</p>
            </li>
            <li>
                <p>Domine as ferramentas e recursos do Canva;</p>
            </li>
            <li>
                <p>Crie apresentações visualmente impressionantes;</p>
            </li>
            <li>
                <p>Personalize imagens e gráficos.</p>
            </li>
        </ul>

        <hr>
        <h2 class="h2">Público Alvo <img class="icon" src="../statics/icons/target.png" alt=""></h2>
        <p>Este curso é perfeito para iniciantes e intermediários que desejam se destacar no uso do Canva em suas atividades profissionais. Nossos instrutores experientes o guiarão passo a passo, e você sairá do curso com as habilidades necessárias para se tornar um especialista no Canva.</p>

        <div class="center">
            <button class="btn open-modal">Garanta sua vaga!</button>
        </div>
    </article>

    <article class="detail-container Windows" id="windows3">
        <h3><img class="icon-middle" src="../statics/icons/computer.png" alt=""> Microsoft Windows</h3>
        <p>Acontecerá no dia 29 na sala 2</p>
        <hr>
        <h2 class="h2">O que você aprenderá <img class="icon" src="../statics/icons/learning.png" alt=""></h2>
        <ul>
            <li>
                <p>Domine a navegação e configuração do Windows;</p>
            </li>
            <li>
                <p>Aprenda a solucionar problemas comuns do Windows;</p>
            </li>
            <li>
                <p>Explore recursos avançados do sistema operacional;</p>
            </li>
            <li>
                <p>Personalize e otimize seu ambiente de trabalho.</p>
            </li>
        </ul>

        <hr>
        <h2 class="h2">Público Alvo <img class="icon" src="../statics/icons/target.png" alt=""></h2>
        <p>Este curso é perfeito para iniciantes e intermediários que desejam aprimorar suas habilidades no uso do Windows. Nossos instrutores experientes o guiarão passo a passo, e você sairá do curso com as habilidades necessárias para se tornar um especialista no Microsoft Windows.</p>

        <div class="center">
            <button class="btn open-modal">Garanta sua vaga!</button>
        </div>
    </article>

    <article class="nuvem detail-container" id="nuvem3">
        <h3><img class="icon-middle" src="../statics/icons/cloud.png" alt="">Armazenamento em Nuvem</h3>
        <p>Acontecerá no dia 28 na sala 1</p>
        <hr>
        <h2 class="h2">O que você aprenderá <img class="icon" src="../statics/icons/learning.png" alt=""></h2>
        <ul>
            <li>
                <p>Aprenda a criar e gerenciar recursos na nuvem;</p>
            </li>
            <li>
                <p>Implemente soluções escaláveis para suas necessidades de negócios;</p>
            </li>
            <li>
                <p>Compreenda os conceitos de segurança na nuvem;</p>
            </li>
            <li>
                <p>Utilize serviços de provedores de nuvem líderes do mercado.</p>
            </li>
        </ul>
        <hr>
        <h2 class="h2">Público Alvo <img class="icon" src="../statics/icons/target.png" alt=""></h2>
        <p>Este curso é perfeito para pessoas que desejam compreender o armazenamento em nuvem e alavancar sua vantagem competitiva. Nossos instrutores experientes o guiarão passo a passo, e você sairá do curso com as habilidades necessárias para compreender e realizar tarefas basicas para o armazenamento em nuvem de forma segura.</p>

        <div class="center">
            <button class="btn open-modal">Garanta sua vaga!</button>
        </div>
    </article>
</section>