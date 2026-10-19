<?php
$config = require __DIR__ . '/config.php';
// Idioma do URL tem prioridade; o cookie mantém a preferência para visitas seguintes.
$requestedLang = $_GET['lang'] ?? null;
$lang = in_array($requestedLang, ['pt', 'en'], true)
    ? $requestedLang
    : (($_COOKIE['site_lang'] ?? 'pt') === 'en' ? 'en' : 'pt');
if (in_array($requestedLang, ['pt', 'en'], true)) {
    setcookie('site_lang', $lang, [
        'expires' => time() + 31536000,
        'path' => '/',
        'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
}
$translations = json_decode(file_get_contents(__DIR__ . '/lang/' . $lang . '.json'), true, 512, JSON_THROW_ON_ERROR);
function tr(string $key): string {
    global $translations;
    return htmlspecialchars((string)($translations[$key] ?? $key), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
// Preserve apenas as quebras de linha e espaços HTML usados nos textos de apresentação.
function tr_html(string $key): string {
    return str_replace(['&lt;br&gt;', '&amp;nbsp;'], ['<br>', '&nbsp;'], tr($key));
}
?>
<!doctype html>
<html lang="<?= $lang ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?= tr('seo.description') ?>">
        <meta name="theme-color" content="#0047ff">
        <title><?= tr('seo.title') ?></title>
        
        <!-- SEO: URLs dos idiomas -->
        <link rel="canonical"
            href="https://guilhermegregorio.com/?lang=<?= $lang ?>">
        <link rel="alternate" hreflang="pt-PT"
            href="https://guilhermegregorio.com/?lang=pt">
        <link rel="alternate" hreflang="en"
            href="https://guilhermegregorio.com/?lang=en">
        <link rel="alternate" hreflang="x-default"
            href="https://guilhermegregorio.com/">
        <!-- Open Graph: partilhas em redes sociais -->
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Guilherme Gregório">
        <meta property="og:locale"
            content="<?= $lang === 'en' ? 'en_US' : 'pt_PT' ?>">
        <meta property="og:title"
            content="<?= tr('seo.title') ?>">
        <meta property="og:description"
            content="<?= tr('seo.description') ?>">
        <meta property="og:url"
            content="https://guilhermegregorio.com/?lang=<?= $lang ?>">
        <meta property="og:image"
            content="https://guilhermegregorio.com/assets/guilherme.png">
        <!-- Pré-visualização para X/Twitter -->
        <meta name="twitter:card" content="summary">
        
        <!-- Dados estruturados: identidade profissional -->
        <script type="application/ld+json">
        <?= json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Person',
            'name' => 'Guilherme Gregório',
            'url' => 'https://guilhermegregorio.com/',
            'image' => 'https://guilhermegregorio.com/assets/guilherme.png',
            'jobTitle' => $lang === 'en'
                ? 'Web Developer and Software Creator'
                : 'Desenvolvedor Web e Criador de Software',
            'description' => $translations['seo.description']
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) ?>
        </script>

        <link rel="stylesheet" href="style.css">
        <script>
            window.SITE_CONFIG = <?= json_encode(
                ['whatsapp' => $config['whatsapp']],
                JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT
            ) ?>;
        </script>
        <script>
            // Textos dos componentes interativos e das mensagens do WhatsApp.
            window.SITE_I18N = <?= json_encode($translations, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
        </script>
        <script src="script.js" defer></script>
    </head>
    <body class="theme-cinematografico">
        <div class="progress" aria-hidden="true"></div>
        <div class="cursor" aria-hidden="true">↗</div>

        <!-- Navegação: edite os links e textos aqui. -->
        <header class="header">
            <a class="brand" href="#inicio" aria-label="<?= tr('brand.aria') ?>">
                <b>GG</b>
                <span>Guilherme Gregório</span>
            </a>
            <nav aria-label="<?= tr('nav.aria') ?>">
                <a href="#projetos"><?= tr('nav.projects') ?></a>
                <a href="#sobre"><?= tr('nav.about') ?></a>
                <a class="button small" href="#contacto"><?= tr('nav.contact') ?></a>
                <!-- Seletor de idioma. Os links funcionam mesmo sem JavaScript. -->
                <div class="language-switcher" role="group" aria-label="Language / Idioma">
                    <a href="?lang=pt" lang="pt" hreflang="pt" <?= $lang === 'pt' ? 'class="active" aria-current="true"' : '' ?>>PT</a>
                    <span aria-hidden="true">/</span>
                    <a href="?lang=en" lang="en" hreflang="en" <?= $lang === 'en' ? 'class="active" aria-current="true"' : '' ?>>EN</a>
                </div>
            </nav>
        </header>
        <main>
        <section class="hero" id="inicio">
            <div class="hero-copy">
                <p class="eyebrow"><?= tr('hero.eyebrow') ?> 
                    <span class="line"></span>
                </p>
                <h1>
                    <span><?= tr('hero.title1') ?></span>
                    <span><?= tr('hero.title2') ?></span>
                    <span class="blue"><?= tr('hero.title3') ?></span>
                </h1>
                <p class="lead"><?= tr('hero.lead1') ?>
                    <br><?= tr('hero.lead2') ?>
                </p>
                <div class="actions">
                    <a href="#projetos" class="button"><?= tr('hero.explore') ?></a>
                    <a href="#contacto" class="button outline"><?= tr('hero.message') ?></a>
                </div>
                <a class="scroll" href="#projetos">↓ 
                    <span><?= tr('hero.scroll') ?></span>
                </a>
            </div>
            <div class="portrait">
                <div class="orbit orbit-one"></div>
                <div class="orbit orbit-two"></div>
                <div class="chrome-ring" aria-hidden="true"></div>
                <span class="portrait-note"><?= tr('hero.note') ?></span>
                <img src="assets/guilherme.png" alt="Guilherme Gregório" fetchpriority="high">
                <span class="signature">Guilherme<br>Gregório</span>
            </div>
            <span class="hero-side"><?= tr_html('hero.side') ?></span>
        </section>
        <div class="ticker" aria-hidden="true">
            <div><?= tr_html('hero.ticker') ?></div>
        </div>
        <!-- Case principal: demonstração interativa ilustrativa, sem ligação ao banco de dados. -->
        <section id="projetos" class="case-section">
            <div class="case-stage">
                <div class="case-copy reveal">
                    <p class="eyebrow"><?= tr('interfi.label') ?></p>
                    <h2>InterFi.</h2>
                    <h3><?= tr('interfi.subtitle') ?></h3>
                    <p><?= tr('interfi.copy') ?></p>
                    <div class="tags">
                        <span><?= tr('tag.maintenance') ?></span>
                        <span><?= tr('tag.administration') ?></span>
                        <span><?= tr('tag.operations') ?></span>
                    </div>
                    <a class="case-link" href="https://www.interfi.net/" target="_blank" rel="noopener noreferrer"><?= tr('interfi.link') ?></a>
                </div>
                <div class="real-devices reveal">
                    <button class="real-screen main-screen" data-image="assets/interfi-modulos.png" data-caption="<?= tr('interfi.caption') ?>" aria-label="<?= tr('interfi.zoom') ?>">
                        <span class="browser-bar"><i></i><i></i><i></i>
                            <small><?= tr('interfi.browser') ?></small>
                        </span>
                        <img src="assets/interfi-modulos.png" alt="<?= tr('interfi.imgalt') ?>">
                        <span class="screen-caption"><?= tr('interfi.explore') ?></span>
                    </button>
                    <button class="real-screen login-screen" data-image="assets/interfi-login.png" data-caption="<?= tr('interfi.login.caption') ?>" aria-label="<?= tr('interfi.login.zoom') ?>">
                        <img src="assets/interfi-login.png" alt="<?= tr('interfi.login.imgalt') ?>">
                        <span class="screen-caption"><?= tr('interfi.login') ?></span>
                    </button>
                </div>
            </div>
            <div class="case-details">
                <article class="reveal">
                    <small>01</small>
                    <h3><?= tr('interfi.challenge') ?></h3>
                    <p><?= tr('interfi.challenge.copy') ?></p>
                </article>
                <article class="reveal">
                    <small>02</small>
                    <h3><?= tr('interfi.solution') ?></h3>
                    <p><?= tr('interfi.solution.copy') ?></p>
                </article>
                <article class="reveal">
                    <small>03</small>
                    <h3><?= tr('interfi.explore.system') ?></h3>
                    <p><?= tr('interfi.explore.copy') ?></p>
                    <a href="https://www.interfi.net/" target="_blank" rel="noopener noreferrer"><?= tr('interfi.visit') ?></a>
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
                    <p class="eyebrow"><?= tr('web.label') ?></p>
                    <h2>AVV Travel.</h2>
                    <h3><?= tr('avv.subtitle') ?></h3>
                    <p>
                        <?= tr('avv.copy') ?>
                    </p>
                    <div class="tags">
                        <span>Website</span>
                        <span><?= tr('avv.bookings') ?></span>
                        <span>PT / EN</span>
                    </div>
                    <a class="case-link"
                    href="https://www.avvtravel.com/"
                    target="_blank"
                    rel="noopener noreferrer">
                        <?= tr('avv.link') ?>
                    </a>
                </div>
                <!-- LADO DIREITO: PRINT COM PROFUNDIDADE 3D -->
                <div class="real-devices reveal">
                    <button type="button"
                            class="real-screen main-screen"
                            data-image="assets/avv-travel-site.png"
                            data-caption="<?= tr('avv.caption') ?>"
                            aria-label="<?= tr('avv.zoom') ?>">
                        <span class="browser-bar">
                            <i></i><i></i><i></i>
                            <small>avvtravel.com</small>
                        </span>
                        <img src="assets/avv-travel-site.png"
                            alt="<?= tr('avv.imgalt') ?>"
                            loading="lazy">
                        <span class="screen-caption">
                            <?= tr('avv.explore') ?>
                        </span>
                    </button>
                    <!-- CARTÃO FLUTUANTE SOBREPOSTO -->
                    <div class="case-floating" aria-hidden="true">
                        <span class="case-floating-label">WEB EXPERIENCE</span>
                        <strong><?= tr('avv.floating') ?></strong>
                        <span><?= tr('avv.floating2') ?></span>
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
                    <p class="eyebrow"><?= tr('aguiar.label') ?></p>
                    <h2>Estética<br>Aguiar.</h2>
                    <h3><?= tr('aguiar.subtitle') ?></h3>
                    <p>
                        <?= tr('aguiar.copy') ?>
                    </p>
                    <div class="tags">
                        <span>Web Design</span>
                        <span><?= tr('aguiar.auto') ?></span>
                        <span><?= tr('aguiar.visual') ?></span>
                    </div>
                    <a class="case-link"
                    href="https://www.esteticaguiar.net/"
                    target="_blank"
                    rel="noopener noreferrer">
                        <?= tr('aguiar.link') ?>
                    </a>
                </div>
                <!-- LADO DIREITO: PRINT COM PROFUNDIDADE 3D -->
                <div class="real-devices reveal">
                    <button type="button"
                            class="real-screen main-screen"
                            data-image="assets/estetica-aguiar-site.png"
                            data-caption="<?= tr('aguiar.caption') ?>"
                            aria-label="<?= tr('aguiar.zoom') ?>">
                        <span class="browser-bar">
                            <i></i><i></i><i></i>
                            <small>esteticaguiar.net</small>
                        </span>
                        <img src="assets/estetica-aguiar-site.png"
                            alt="<?= tr('aguiar.imgalt') ?>"
                            loading="lazy">
                        <span class="screen-caption">
                            <?= tr('avv.explore') ?>
                        </span>
                    </button>
                    <!-- CARTÃO FLUTUANTE SOBREPOSTO -->
                    <div class="case-floating" aria-hidden="true">
                        <span class="case-floating-label">DIGITAL SHOWCASE</span>
                        <strong><?= tr('aguiar.floating') ?></strong>
                        <span><?= tr('aguiar.floating2') ?></span>
                        <span class="case-floating-mark">↗</span>
                    </div>

                </div>
            </div>
        </section>
        <section class="about section-pad" id="sobre">
            <div class="about-photo reveal">
                <img src="assets/guilherme.png" alt="<?= tr('about.imgalt') ?>" loading="lazy">
                <span>GUILHERME / GREGÓRIO</span>
            </div>
            <div class="about-title reveal">
                <p class="eyebrow"><?= tr('about.label') ?></p>
                <h2><?= tr_html('about.title') ?></h2>
                <p><?= tr_html('about.steps') ?></p>
            </div>
            <div class="about-text reveal">
                <p><?= tr('about.intro') ?></p>
                <p><?= tr('about.copy1') ?></p>
                <p><?= tr('about.copy2') ?></p>
                <a class="text-link" href="#contacto"><?= tr('about.link') ?></a>
            </div>
        </section>
        <!-- Contacto: a mensagem só é enviada pelo visitante, dentro do WhatsApp. -->
        <section class="contact section-pad" id="contacto">
            <div class="section-heading reveal">
                <div>
                    <p class="eyebrow"><?= tr('contact.label') ?></p>
                    <h2><?= tr('contact.title') ?></h2>
                </div>
                <p><?= tr_html('contact.instructions') ?></p>
            </div>
            <div class="choices" role="group" aria-label="<?= tr('contact.group') ?>">
                <button data-type="site" aria-pressed="false">
                    <span>◎</span>
                    <b><?= tr('contact.site') ?></b>
                    <small><?= tr('contact.site.copy') ?></small>
                    <i>↗</i>
                </button>
                <button data-type="sistema" aria-pressed="true" class="selected">
                    <span>◇</span>
                    <b><?= tr('contact.system') ?></b>
                    <small><?= tr('contact.system.copy') ?></small>
                    <i>✓</i>
                </button>
                <button data-type="automação" aria-pressed="false">
                    <span>ϟ</span>
                    <b><?= tr('contact.automation') ?></b>
                    <small><?= tr('contact.automation.copy') ?></small>
                    <i>↗</i>
                </button>
            </div>
            <form id="brief-form">
                <div class="form-fields">
                    <label><?= tr('contact.name.label') ?><input name="nome" required maxlength="100" autocomplete="name" placeholder="<?= tr('contact.name.placeholder') ?>"></label>
                    <label id="idea-label"><?= tr('contact.idea.label') ?><textarea name="ideia" required maxlength="2000" rows="2" placeholder="<?= tr('contact.idea.placeholder') ?>"></textarea></label>
                </div>
                <div class="form-bottom">
                    <p><?= tr('contact.disclaimer') ?></p>
                    <button class="button light" type="submit"><?= tr('nav.contact') ?></button>
                </div>
            </form>
        </section>
        <footer class="section-pad">
            <div>
                <h2><?= tr_html('footer.title') ?> <a href="#contacto" aria-label="<?= tr('footer.start') ?>">↗</a>
                </h2>
                <p><?= tr_html('footer.copy') ?></p>
                <div class="footer-links">
                    <a id="whatsapp-link" class="button outline" href="#contacto">WhatsApp ↗</a>
                    <a href="https://github.com/djgregui" target="_blank" rel="noopener noreferrer" class="button outline">GitHub ↗</a>
                    <a href="https://www.linkedin.com/in/guilherme95gregorio/" target="_blank" rel="noopener noreferrer" class="button outline">LinkedIn ↗</a>
                </div>
            </div>
            <div class="footer-bottom">
                <span>Guilherme Gregório · Portugal</span>
                <span>© <span id="year">2026</span></span>
                <a href="#inicio"><?= tr('footer.top') ?></a>
            </div>
        </footer>
        </main>
        <dialog id="project-dialog" aria-labelledby="dialog-title">
            <button class="close-dialog" aria-label="<?= tr('dialog.close') ?>">×</button>
            <p class="eyebrow" id="dialog-category"></p>
            <h2 id="dialog-title"></h2>
            <p id="dialog-copy"></p>
            <div class="dialog-tags" id="dialog-tags"></div>
            <a id="project-live" class="text-link" target="_blank" rel="noopener noreferrer"><?= tr('dialog.visit') ?></a>
            <br><br>
            <a class="button" href="#contacto" id="dialog-cta"><?= tr('dialog.cta') ?></a>
        </dialog>
        <dialog id="image-dialog" aria-labelledby="image-caption">
            <button class="close-image" aria-label="<?= tr('dialog.close.image') ?>">×</button>
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
            aria-label="<?= tr('top.back') ?>"
            title="<?= tr('top.title') ?>">
            ↑
        </button>
    </body>
</html>
