<?php
$config = require __DIR__ . '/config.php';
?>
<!doctype html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Guilherme Gregório — desenvolvimento de sistemas, automações e experiências web. Criador da InterFi.">
        <meta name="theme-color" content="#0047ff">
        <title>Guilherme Gregório — Do mundo real. Para o digital.</title>
        <link rel="stylesheet" href="style.css">
        <script>
            window.SITE_CONFIG = <?= json_encode(
                ['whatsapp' => $config['whatsapp']],
                JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT
            ) ?>;
        </script>
        <script src="script.js" defer></script>
    </head>
<body class="theme-cinematografico">
<div class="progress" aria-hidden="true"></div>
<div class="cursor" aria-hidden="true">↗</div>

<!-- Navegação: edite os links e textos aqui. -->
<header class="header">
    <a class="brand" href="#inicio" aria-label="Guilherme Gregório — início">
        <b>GG</b>
        <span>Guilherme Gregório</span>
    </a>
    <nav aria-label="Navegação principal">
        <a href="#projetos">Projetos</a>
        <a href="#sobre">Sobre</a>
        <a class="button small" href="#contacto">Vamos conversar ↗</a>
    </nav>
</header>
<main>
<section class="hero" id="inicio">
    <div class="hero-copy">
        <p class="eyebrow">DESENVOLVEDOR · CRIADOR DA INTERFI 
            <span class="line"></span>
        </p>
        <h1>
            <span>Do mundo real.</span>
            <span>Para o</span>
            <span class="blue">digital.</span>
        </h1>
        <p class="lead">Transformo operações reais
            <br>em experiências digitais.
        </p>
        <div class="actions">
            <a href="#projetos" class="button">Explorar projetos ↗</a>
            <a href="#contacto" class="button outline">Falar comigo</a>
        </div>
        <a class="scroll" href="#projetos">↓ 
            <span>SCROLL PARA EXPLORAR</span>
        </a>
    </div>
    <div class="portrait">
        <div class="orbit orbit-one"></div>
        <div class="orbit orbit-two"></div>
        <div class="chrome-ring" aria-hidden="true"></div>
        <span class="portrait-note">Código com propósito</span>
        <img src="assets/guilherme.png" alt="Guilherme Gregório" fetchpriority="high">
        <span class="signature">Guilherme<br>Gregório</span>
    </div>
    <span class="hero-side">PESSOAS<br>PROCESSOS<br>TECNOLOGIA<br>RESULTADOS</span>
</section>
<div class="ticker" aria-hidden="true">
    <div>ESTRATÉGIA &nbsp; / &nbsp; DESIGN &nbsp; / &nbsp; CÓDIGO &nbsp; / &nbsp; OPERAÇÃO &nbsp; / &nbsp; ESTRATÉGIA &nbsp; / &nbsp; DESIGN &nbsp; / &nbsp; CÓDIGO &nbsp; / &nbsp; OPERAÇÃO &nbsp; / &nbsp;</div>
</div>
<!-- Case principal: demonstração interativa ilustrativa, sem ligação ao banco de dados. -->
<section id="projetos" class="case-section">
    <div class="case-stage">
        <div class="case-copy reveal">
            <p class="eyebrow">01 / PROJETO EM DESTAQUE</p>
            <h2>InterFi.</h2>
            <h3>Toda a operação. Conectada.</h3>
            <p>Sistema completo de gestão para empresas de transporte. Mecânica, administração e operação ligadas numa única plataforma.</p>
            <div class="tags">
                <span>Mecânica</span>
                <span>Administração</span>
                <span>Operação</span>
            </div>
            <a class="case-link" href="https://www.interfi.net/" target="_blank" rel="noopener noreferrer">Conhecer a InterFi ↗</a>
        </div>
        <div class="real-devices reveal">
            <button class="real-screen main-screen" data-image="assets/interfi-modulos.png" data-caption="InterFi — Mecânica, Administração e Operação" aria-label="Ampliar print dos módulos da InterFi">
                <span class="browser-bar"><i></i><i></i><i></i>
                    <small>InterFi · Gestão</small>
                </span>
                <img src="assets/interfi-modulos.png" alt="Print real dos módulos de mecânica, administração e operação da InterFi">
                <span class="screen-caption">Explorar os módulos ↗</span>
            </button>
            <button class="real-screen login-screen" data-image="assets/interfi-login.png" data-caption="InterFi — acesso à plataforma" aria-label="Ampliar print do acesso à InterFi">
                <img src="assets/interfi-login.png" alt="Ecrã real de acesso à plataforma InterFi">
                <span class="screen-caption">Acesso à plataforma ↗</span>
            </button>
        </div>
    </div>
    <div class="case-details">
        <article class="reveal">
            <small>01</small>
            <h3>O desafio</h3>
            <p>Informação dispersa entre folhas de cálculo, documentos e mensagens. Uma operação que precisa de organização.</p>
        </article>
        <article class="reveal">
            <small>02</small>
            <h3>A solução</h3>
            <p>Reunir manutenção, pneus, frota, abastecimento, documentos, colaboradores e informação operacional.</p>
        </article>
        <article class="reveal">
            <small>03</small>
            <h3>Explore o sistema ↗</h3>
            <p>Amplie os prints reais para conhecer a plataforma. Explore as áreas abaixo ou visite o site da InterFi.</p>
            <a href="https://www.interfi.net/" target="_blank" rel="noopener noreferrer">Visitar plataforma ↗</a>
        </article>
    </div>
</section>
<!-- =====================================================
     CASE 02 — AVV TRAVEL
     ===================================================== -->
<section class="case-section portfolio-showcase case-avv" id="case-avv">
    <div class="case-stage">
        <!-- LADO ESQUERDO: APRESENTAÇÃO -->
        <div class="case-copy reveal">
            <p class="eyebrow">02 / WEBSITE EM DESTAQUE</p>
            <h2>AVV Travel.</h2>
            <h3>Mobilidade com outra experiência.</h3>
            <p>
                Website responsivo e bilingue (PT/EN), com navegação dinâmica, apresentação
                de serviços e frota, formulário de orçamento inteligente e integração direta
                com WhatsApp para pedidos e contactos.
            </p>
            <div class="tags">
                <span>Website</span>
                <span>Reservas</span>
                <span>PT / EN</span>
            </div>
            <a class="case-link"
               href="https://www.avvtravel.com/"
               target="_blank"
               rel="noopener noreferrer">
                Conhecer a AVV Travel ↗
            </a>
        </div>
        <!-- LADO DIREITO: PRINT COM PROFUNDIDADE 3D -->
        <div class="real-devices reveal">
            <button type="button"
                    class="real-screen main-screen"
                    data-image="assets/avv-travel-site.png"
                    data-caption="AVV Travel — Website institucional"
                    aria-label="Ampliar website AVV Travel">
                <span class="browser-bar">
                    <i></i><i></i><i></i>
                    <small>avvtravel.com</small>
                </span>
                <img src="assets/avv-travel-site.png"
                     alt="Captura real do website AVV Travel"
                     loading="lazy">
                <span class="screen-caption">
                    Explorar website ↗
                </span>
            </button>
            <!-- CARTÃO FLUTUANTE SOBREPOSTO -->
            <div class="case-floating" aria-hidden="true">
                <span class="case-floating-label">WEB EXPERIENCE</span>
                <strong>Uma viagem começa online.</strong>
                <span>Orçamentos · WhatsApp · PT/EN</span>
                <span class="case-floating-mark">↗</span>
            </div>

        </div>
    </div>
</section>
<!-- =====================================================
     CASE 03 — ESTÉTICA AGUIAR
     ===================================================== -->
<section class="case-section portfolio-showcase case-aguiar" id="case-aguiar">
    <div class="case-stage">
        <!-- LADO ESQUERDO: APRESENTAÇÃO -->
        <div class="case-copy reveal">
            <p class="eyebrow">03 / WEBSITE EM DESTAQUE</p>
            <h2>Estética<br>Aguiar.</h2>
            <h3>Detalhes que fazem a diferença.</h3>
            <p>
                Website premium e responsivo, com forte impacto visual, navegação intuitiva,
                apresentação clara dos serviços, destaque para resultados e acesso rápido
                ao contacto e pedido de avaliação.
            </p>
            <div class="tags">
                <span>Web Design</span>
                <span>Automóvel</span>
                <span>Experiência Visual</span>
            </div>
            <a class="case-link"
               href="https://www.esteticaguiar.net/"
               target="_blank"
               rel="noopener noreferrer">
                Conhecer a Estética Aguiar ↗
            </a>
        </div>
        <!-- LADO DIREITO: PRINT COM PROFUNDIDADE 3D -->
        <div class="real-devices reveal">
            <button type="button"
                    class="real-screen main-screen"
                    data-image="assets/estetica-aguiar-site.png"
                    data-caption="Estética Aguiar — Website"
                    aria-label="Ampliar website Estética Aguiar">
                <span class="browser-bar">
                    <i></i><i></i><i></i>
                    <small>esteticaguiar.net</small>
                </span>
                <img src="assets/estetica-aguiar-site.png"
                     alt="Captura real do website Estética Aguiar"
                     loading="lazy">
                <span class="screen-caption">
                    Explorar website ↗
                </span>
            </button>
            <!-- CARTÃO FLUTUANTE SOBREPOSTO -->
            <div class="case-floating" aria-hidden="true">
                <span class="case-floating-label">DIGITAL SHOWCASE</span>
                <strong>O detalhe é protagonista.</strong>
                <span>Design · Imagens · Interatividade</span>
                <span class="case-floating-mark">↗</span>
            </div>

        </div>
    </div>
</section>
<section class="about section-pad" id="sobre">
    <div class="about-photo reveal">
        <img src="assets/guilherme.png" alt="Retrato de Guilherme" loading="lazy">
        <span>GUILHERME / GREGÓRIO</span>
    </div>
    <div class="about-title reveal">
        <p class="eyebrow">SOBRE MIM</p>
        <h2>Tecnologia<br>com contexto.</h2>
        <p>Entender o negócio.<br>Desenhar a solução.<br>Construir o que faz falta.</p>
    </div>
    <div class="about-text reveal">
        <p>Sou o Guilherme Gregório, desenvolvedor e criador da InterFi.</p>
        <p>Gosto de transformar problemas reais em ferramentas digitais que simplificam o trabalho. A experiência com operações e gestão de frota dá contexto ao que construo.</p>
        <p>Código, design e processos fazem parte da mesma conversa: como tornar o dia a dia mais simples?</p>
        <a class="text-link" href="#contacto">Vamos falar sobre a sua ideia ↗</a>
    </div>
</section>
<!-- Contacto: a mensagem só é enviada pelo visitante, dentro do WhatsApp. -->
<section class="contact section-pad" id="contacto">
    <div class="section-heading reveal">
        <div>
            <p class="eyebrow">VAMOS TRABALHAR JUNTOS?</p>
            <h2>O que vamos construir?</h2>
        </div>
        <p>Escolha o ponto de partida.<br>Conte-me o que tem em mente.</p>
    </div>
    <div class="choices" role="group" aria-label="Tipo de projeto">
        <button data-type="site" aria-pressed="false">
            <span>◎</span>
            <b>Um site</b>
            <small>Presença digital de alto nível.</small>
            <i>↗</i>
        </button>
        <button data-type="sistema" aria-pressed="true" class="selected">
            <span>◇</span>
            <b>Um sistema</b>
            <small>Soluções para o seu negócio.</small>
            <i>✓</i>
        </button>
        <button data-type="automação" aria-pressed="false">
            <span>ϟ</span>
            <b>Uma automação</b>
            <small>Mais eficiência, menos trabalho.</small>
            <i>↗</i>
        </button>
    </div>
    <form id="brief-form">
        <div class="form-fields">
            <label>Como se chama?<input name="nome" required maxlength="100" autocomplete="name" placeholder="O seu nome"></label>
            <label id="idea-label">Qual é o problema que quer resolver?<textarea name="ideia" required maxlength="2000" rows="2" placeholder="Conte-me um pouco sobre a sua operação…"></textarea></label>
        </div>
        <div class="form-bottom">
            <p>Preparamos a mensagem. Você revê e envia no WhatsApp.</p>
            <button class="button light" type="submit">Vamos conversar ↗</button>
        </div>
    </form>
</section>
<footer class="section-pad">
    <div>
        <h2>Vamos tirar a sua<br>ideia do papel. <a href="#contacto" aria-label="Começar uma conversa">↗</a>
        </h2>
        <p>Tecnologia, estratégia e criatividade<br>para transformar o seu negócio.</p>
        <div class="footer-links">
            <a id="whatsapp-link" class="button outline" href="#contacto">WhatsApp ↗</a>
            <a href="https://www.linkedin.com/in/guilherme95gregorio/" target="_blank" rel="noopener noreferrer" class="button outline">LinkedIn ↗</a>
        </div>
    </div>
    <div class="footer-bottom">
        <span>Guilherme Gregório · Portugal</span>
        <span>© <span id="year">2026</span></span>
        <a href="#inicio">Voltar ao início ↑</a>
    </div>
</footer>
</main>
<dialog id="project-dialog" aria-labelledby="dialog-title">
    <button class="close-dialog" aria-label="Fechar detalhes">×</button>
    <p class="eyebrow" id="dialog-category"></p>
    <h2 id="dialog-title"></h2>
    <p id="dialog-copy"></p>
    <div class="dialog-tags" id="dialog-tags"></div>
    <a id="project-live" class="text-link" target="_blank" rel="noopener noreferrer">Visitar website ↗</a>
    <br><br>
    <a class="button" href="#contacto" id="dialog-cta">Quero conversar sobre um projeto ↗</a>
</dialog>
<dialog id="image-dialog" aria-labelledby="image-caption">
    <button class="close-image" aria-label="Fechar imagem">×</button>
    <img id="expanded-image" alt="">
    <p id="image-caption"></p>
</dialog>
<!-- ==========================================
     BOTÃO VOLTAR AO TOPO
     ========================================== -->
<button
    id="backToTop"
    class="back-to-top"
    type="button"
    aria-label="Voltar ao topo da página"
    title="Voltar ao topo">
    ↑
</button>
</body>
</html>
