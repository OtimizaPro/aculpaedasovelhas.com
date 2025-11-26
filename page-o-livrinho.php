<?php
/* LEITURA OBRIGATÓRIA: ./DEFINICOES_DO_PROJETO.md */
/**
 * Template Name: O Livrinho
 * Description: Página do Livrinho - Manifesto e Download
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> | O Livrinho</title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class('livrinho-page'); ?>>

    <!-- Navigation (Simplified for consistency) -->
    <nav class="ms-header" style="position: absolute; width: 100%; background: transparent; border: none;">
        <div class="ms-header-content">
            <div class="ms-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            </div>
            <div class="ms-user-menu" style="display: flex; gap: 1rem; align-items: center;">
                <button id="theme-toggle" class="theme-toggle-btn" aria-label="Alternar tema">☀️</button>
                <a href="<?php echo esc_url(home_url('/artigos')); ?>" style="color: var(--text-muted); text-decoration: none; font-size: 0.9rem;">Voltar ao Painel</a>
            </div>
        </div>
    </nav>

    <section class="hero-banner" style="min-height: 60vh; display: flex; align-items: center;">
        <div class="hero-inner" style="text-align: center; display: block;">
            <div class="hero-copy" style="margin: 0 auto; max-width: 800px;">
                <span class="hero-pill">Manifesto</span>
                <h1>O Livrinho</h1>
                <p style="margin: 1.5rem auto;">A síntese do Evangelho e as chaves da responsabilidade civil em uma única folha. Uma mensagem que cabe no bolso e muda uma vida.</p>
                
                <div class="hero-ctas" style="justify-content: center;">
                    <a class="btn-hero-primary" href="#download">Baixar PDF</a>
                    <a class="btn-hero-secondary" href="#leitura">Ler Online</a>
                </div>
            </div>
        </div>
        <div class="hero-noise" aria-hidden="true"></div>
    </section>

    <main id="leitura" class="livrinho-content">
        <div class="content-wrapper">
            
            <!-- Intro Text -->
            <article class="livrinho-intro-text" style="max-width: 800px; margin: 0 auto 5rem; color: var(--text-muted); line-height: 1.8; font-size: 1.1rem;">
                <h2 style="color: var(--text-primary); font-size: 2rem; margin-bottom: 2rem; text-align: center;">🔐 Verdades Ocultas e verdades ocultadas</h2>
                
                <p>Por <strong>Verdades Ocultas</strong> eu chamo aquilo que fez parte do Plano de Deus para que a Obra dele, Jesus Cristo fosse Boa!</p>

                <p>Parte central deste plano é a Revelação do Livrinho, aquele aberto na mão do Anjo que pisava sobre terra e água e as Mãos Levantaram aos Céus Jurando Juramento ao Eterno.</p>

                <p>Teólogos, religiosos, pesquisadores, historiadores, fiéis, passaram os séculos que nos sucederam buscando explicação ou revelação para as profecias sobre os fins dos tempos. O que conhecemos como escatologia.</p>

                <p>A escatologia se propõe portanto a isto, estudar as Revelações, as profecias para os chamados fins dos tempos. Neste sentido eu posso dizer que este é um Livro escatologico, me colocando portanto no centro das Revelações aqui contidas em decorrência dos estudos que realizei e que me propus a compartilhar nesta Obra. Entretanto, caso esta Obra seja considerada por você como Verdadeira, não tenha dúvida, o Verdadeiro Autor é o Espírito Santo, o Próprio Jesus Cristo e eu apenas o seu instrumento, assim como fora o Profeta João ao escrever (Ap), ou Em Verdade, o próprio Deus Vivo Jesus Cristo.</p>

                <p>E como esta Obra fala de Revelação da Verdade, eis que aqui vai a primeira e mais importante de Todas. <strong>A Verdade sobre a Verdade!</strong></p>

                <p>Caro Leitor, aqui eu te entrego a Primeira Chave desta Revelação sobre a Revelação. Ela foi entregue a mim, como dito, pelo Espírito que me Ordenou entregar a você!</p>

                <p>Conheça esta Chave, reúna-a com as Demais Chaves e destranque baús de Tesouros e Portas de Conhecimento da Palavra Viva de Deus!</p>

                <p>Esta Chave, pela implicação de sua relevância, por ser essencial para acesso ao conhecimento, foi escondida de você todo este tempo por satanás.</p>

                <p>E não se engane, satanás possui inteligência e capacidades e estratagemas superiores às nossas capacidades humanas. Há apenas uma arma capaz de, empenhada por mãos humanas, derrotar este inimigo: e se chama <strong>Palavra Viva de Deus!</strong></p>

                <p>É por isto que você foi enganado até aqui, satanás e Jesus disputaram uma disputa, guerrearam em Tabuleiro Celeste e terreno, mas o oponente do diabo é Implacável e o tempo dele esgotado!</p>

                <p>O tempo está no fim, a hora é a última e por isto você receberá a Verdade Oculta e as Verdades Ocultadas sobre Revelação de Jesus.</p>

                <p>Este é o tempo da Palavra Viva a Falar e eu e você somos muito abençoados por isto.</p>

                <p>Você está com os ouvidos abertos? Então ouça o Espírito Soprando Através das Igrejas. Jesus Cristo está voltando, se prepare para que tudo vejas! E esta visão começa aqui, com este Livrinho, pequeno, mas muito Poderoso!</p>

                <p>Nele eu irei entregar, através do meu testemunho sobre o Testemunho de Jesus, dois tipos de materiais úteis, duas ferramentas, uma armadura completa.</p>

                <p>São elas <strong>frameworks</strong> e <strong>Chaves</strong>.</p>

                <p>Os frameworks se dividem em dois tipos, defensivos e ofensivos e ambos pertencem às bestas, besta da terra e besta do mar.</p>

                <p>Já as <strong style="color: var(--accent);">{Chaves}</strong> estas são Únicas e pertencem a JESUS CRISTO que as concede a mim e a você agora.</p>
            </article>
            
            <hr style="border: 0; border-top: 1px solid var(--border); margin: 0 auto 4rem; max-width: 200px;">

            <div class="ms-page-header" style="text-align: center; margin-bottom: 4rem;">
                <h2>Os 4 Pilares</h2>
                <p class="ms-subtitle" style="margin: 0 auto;">A estrutura fundamental da mensagem.</p>
            </div>
            
            <div class="content-blocks">
                <div class="content-block">
                    <span class="block-number">1</span>
                    <div>
                        <h3>O Problema</h3>
                        <p>Todos pecaram e estão destituídos da glória de Deus. O pecado não é apenas um erro moral, é uma desconexão fundamental da fonte da Vida, gerando morte física e espiritual.</p>
                    </div>
                </div>

                <div class="content-block">
                    <span class="block-number">2</span>
                    <div>
                        <h3>A Solução</h3>
                        <p>Deus amou o mundo de tal maneira que deu seu Filho unigênito. A cruz não foi um acidente, foi o pagamento judicial e substitutivo pela nossa dívida.</p>
                    </div>
                </div>

                <div class="content-block">
                    <span class="block-number">3</span>
                    <div>
                        <h3>A Resposta</h3>
                        <p>Arrependimento e fé. Não é sobre religião ou rituais, mas sobre uma mudança de mente (metanoia) e confiança total na obra consumada de Cristo.</p>
                    </div>
                </div>

                <div class="content-block">
                    <span class="block-number">4</span>
                    <div>
                        <h3>A Promessa</h3>
                        <p>Quem crê no Filho tem a vida eterna. Uma nova natureza é implantada, e a responsabilidade civil do Reino começa agora.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <section id="download" class="livrinho-download">
        <div class="download-content">
            <h2>Leve com você</h2>
            <p>O formato original foi desenhado para ser impresso em uma folha A4 e dobrado.</p>
            
            <div class="download-options">
                <a href="#" class="download-btn primary">
                    <span class="btn-icon">⬇️</span>
                    <span class="btn-text">
                        <strong>Download PDF</strong>
                        <small>Versão para Impressão (A4)</small>
                    </span>
                </a>
            </div>

            <div class="print-specs" style="margin-top: 3rem;">
                <h3>Instruções</h3>
                <ul style="text-align: left;">
                    <li>1. Imprima em papel A4 (Sulfite ou Couché).</li>
                    <li>2. Dobre ao meio na horizontal.</li>
                    <li>3. Dobre ao meio na vertical duas vezes (formato sanfona).</li>
                </ul>
            </div>
        </div>
    </section>

    <?php wp_footer(); ?>
</body>
</html>
