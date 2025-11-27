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

            <!-- Deep Dive Text -->
            <article class="livrinho-deep-dive" style="max-width: 800px; margin: 0 auto 5rem; color: var(--text-muted); line-height: 1.8; font-size: 1.1rem;">
                <h2 style="color: var(--text-primary); font-size: 2rem; margin-bottom: 2rem; text-align: center;">Texto da subpágina O “Livrinho”</h2>

                <p>O “Livrinho”, (βιβλαρίδιον), nome por mim dado a esta Obra, faz referência e paralelismo ao Texto original de “A Revelação de Jesus Cristo”, o Livro da Palavra Direta de Jesus Cristo — aquele que muitos chamam, por engano do grande engano, de (Ap).</p>

                <div style="background: rgba(255,255,255,0.05); padding: 1.5rem; border-left: 4px solid var(--accent); margin: 2rem 0; border-radius: 4px;">
                    <h4 style="color: var(--accent); margin-top: 0;">📌 Nota Técnica:</h4>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 0.5rem;">1. → (Ap) “(Ap) foi mantido neste Livrinho como ref. ao Livro Sagrado “Revelação de Jesus Cristo”, pois a maioria das Bíblias impressas e/ou digitais adota essa forma em todo o Mundo.”</li>
                        <li style="margin-bottom: 0.5rem;">2. → βιβλαρίδιον (biblarídion) é o diminutivo de βιβλίον (biblíon), significando literalmente “Livrinho” ou “Pequeno Livro”.</li>
                        <li style="margin-bottom: 0.5rem;">3. → O termo ocorre em “Revelação de Jesus Cristo” 10:2, 8, 9, 10.</li>
                        <li>4. → No contexto, o Livrinho representa uma revelação específica que João deve comer e profetizar novamente (Ap 10:9-11).</li>
                    </ul>
                </div>

                <div style="margin: 3rem 0;">
                    <h3 style="text-align: center; margin-bottom: 1.5rem;">📖📖📖</h3>
                    <blockquote style="border-left: 2px solid var(--border); padding-left: 1.5rem; font-style: italic; margin: 0;">
                        <p>“E vi outro anjo forte descendo do céu, envolto em nuvem, e o arco-íris sobre a cabeça dele, e o rosto dele como o sol, e os pés dele como colunas de fogo; e tendo em a mão dele um livrinho aberto; e pôs o pé dele o direito sobre o mar, o porém esquerdo sobre a terra; e clamou com voz grande como ruge leão; e quando clamou, falaram as sete trovoadas as vozes delas.</p>
                        
                        <p>E quando falaram as sete trovoadas, eu estava prestes a escrever; e ouvi voz do céu dizendo: Sela o que falaram as sete trovoadas, e não escrevas isto.</p>
                        
                        <p>E o anjo que vi estar sobre o mar e sobre a terra levantou a mão dele direita ao céu, e jurou por Aquele que vive pelos séculos dos séculos, que criou o céu e o que nele há, e a terra e o que nela há, e o mar e o que nele há, que tempo já não haverá; mas nos dias da voz do sétimo anjo, quando estiver para tocar a trombeta, consumar-se-á o mistério de Deus, como anunciou aos servos Dele, os profetas.</p>
                        
                        <p>E a voz que ouvi do céu falou comigo novamente e disse: Vai, toma o livrinho aberto na mão do anjo que está sobre o mar e sobre a terra.</p>
                        
                        <p>E fui ao anjo, dizendo-lhe que me desse o livrinho; e ele me diz: Toma e come-o, e amargará o ventre teu, mas na boca tua será doce como mel. E tomei o livrinho da mão do anjo e o comi, e era na boca minha doce como mel; e quando o comi, o ventre meu se tornou amargo. E dizem-me: É necessário que profetizes novamente acerca de povos, e nações, e línguas, e reis muitos.</p>
                        <footer style="margin-top: 1rem; font-size: 0.9rem; color: var(--accent);">📖 “A Revelação de Jesus Cristo” 📜 10:2 (NA28)</footer>
                    </blockquote>
                </div>

                <p style="background: rgba(250, 204, 21, 0.1); padding: 1rem; border-radius: 4px;"><strong>📌 Nota:</strong> O Livrinho na mão do Anjo, do próprio Deus, pois era ele Jesus, é parte central é a própria “Revelação de Jesus Cristo”, transmitido diretamente ao Profeta João é transmitido por mim aqui na Série “O Livrinho - A Culpa é das Ovelhas” por interpretação textual e análise inspirada.</p>

                <h3 style="color: var(--text-primary); margin-top: 3rem;">Desvelando Palavras desta Profecia</h3>
                <p>📖 “E vi outro anjo forte descendo do céu, envolto em nuvem, e o arco-íris sobre a cabeça dele, e o rosto dele como o sol, e os pés dele como colunas de fogo; e tendo em a mão dele um livrinho aberto; e pôs o pé dele o direito sobre o mar, o porém esquerdo sobre a terra; e clamou com voz grande como ruge leão; e quando clamou, falaram as sete trovoadas as vozes delas.</p>

                <div style="background: rgba(255,255,255,0.05); padding: 1.5rem; border-left: 4px solid var(--accent); margin: 2rem 0; border-radius: 4px;">
                    <h4 style="color: var(--accent); margin-top: 0;">📌 Interpretação:</h4>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 0.5rem;"><strong>Anjo Forte descendo do Céu, envolto em nuvem</strong> = Jesus</li>
                        <li style="margin-bottom: 0.5rem;"><strong>arco-íris</strong> = Aliança com Noé</li>
                        <li style="margin-bottom: 0.5rem;"><strong>rosto dele como o sol</strong> = Rosto de Jesus Glorificado</li>
                        <li><strong>pés dele como colunas de fogo</strong> = Aponta para Jesus; Ele esteve na fornalha, sendo o quarto homem junto de Hananias (Sadraque), Misael (Mesaque) e Azarias (Abede-Nego)</li>
                    </ul>
                </div>

                <p>📌 “E vi Jesus carregando a aliança com Noé, e o rosto dele como o sol, e os pés dele como colunas de fogo; e tendo em a mão dele um livrinho aberto; e pôs o pé dele o direito sobre o mar, o porém esquerdo sobre a terra; e clamou com voz grande como ruge leão; e quando clamou, falaram as sete trovoadas as vozes delas.</p>

                <p>E quando falaram as sete trovoadas, eu estava prestes a escrever; e ouvi voz do céu dizendo: Sela o que falaram as sete trovoadas, e não escrevas isto.</p>

                <h3 style="color: var(--text-primary); margin-top: 4rem; text-align: center;">Nota final sobre este Livrinho</h3>
                
                <p>E disse o Senhor aos fariseus:</p>
                
                <blockquote style="border-left: 2px solid var(--border); padding-left: 1.5rem; font-style: italic; margin: 1.5rem 0;">
                    <p>“Diz-nos, pois, o que te parece: É lícito pagar tributo a César ou não?<br>
                    Jesus, porém, conhecendo-lhes a malícia, respondeu: Por que me experimentais, hipócritas? Mostrai-me a moeda do tributo.<br>
                    Trouxeram-lhe um denário.<br>
                    E perguntou-lhes: De quem é esta imagem e inscrição?<br>
                    Responderam: De César.<br>
                    Então lhes disse: Dai, pois, a César o que é de César e a Deus o que é de Deus.<br>
                    Ouvindo isso, ficaram admirados e, deixando-o, retiraram-se.”</p>
                </blockquote>

                <p>Então digo eu, e dizendo: Entreguemos ao homem da iniquidade o que é dele, pois quem rouba a Noiva merece o castigo que vem.</p>
                
                <ul style="list-style: none; padding: 0; margin: 1.5rem 0; color: var(--accent);">
                    <li>— Emerge a besta-do-mar — Revelação 13</li>
                    <li>— As Quatro Bestas de Daniel — Daniel 7, Revelação 13</li>
                    <li>— Desvelado o Enigma 666 — Revelação 13</li>
                    <li>— Um apóstolo, sim, a besta-do-mar; não Judas, mas o próprio diabo — Revelação 13, Atos 1</li>
                </ul>

                <p>Pedi ao Espírito que também me permita desvelar estes pontos, pois entendi que, em breve, tais achados serão encontrados por arqueólogos, cientistas, historiadores. Eles encontrarão papiros, pergaminhos, pedras, Palavras.</p>

                <p>Eles são usados por Deus para nos servir às Novas Antigas Palavras. Elas permaneceram seladas por Cristo até os dias de hoje, para que no Ano, Dia, Hora e Minuto exatos fossem soltas e cumprissem o seu cumprimento. Entendi também que estes novos antigos achados não refutarão, mas confirmarão as Palavras Reveladas por Cristo neste Livrinho Revelador.</p>

                <p>Pois esta Obra só foi possível mediante as Revelações que me foram entregues — ao meu pedido pedinte, à minha insistência insistente — até que o Espírito Santo determinou que eu, anderson belem costa, as entendesse e as compartilhasse com meus irmãos e irmãs em todo o mundo.</p>

                <p>Vivemos uma época gloriosa, em que a comunicação — placa-mãe das sociedades — alcança seu momento mais acessível e uno, onde muitos falam para muitos, e onde o Branco da Verdade cavalgará vitorioso e vencerá sobre o Arco da Aliança, diante da escuridão do engano que vivenciamos.</p>

                <p>Este é o tempo em que podemos falar muito e a muitos povos, nações e línguas, tão feroz e veloz quanto o Trovão que percorre o mundo, mais rápido que o vento que venta nos quatro cantos da terra.</p>

                <p>Nestes tempos em que fala o Trovão, nenhuma outra informação será mais veiculada, compartilhada, lida, falada e ouvida do que a Palavra Viva — pois Viva sendo, Viveu para aqui estar.</p>

                <p>Por Jesus Cristo, o Único e Eterno Deus Vivo, Rei dos Exércitos, toda a honra e toda a glória. Peço a Deus que nossa fé se mantenha diante dos novos achados historicistas que serão encontrados.</p>

                <p style="text-align: center; font-size: 1.2rem; margin-top: 3rem;">
                    Ela,<br>
                    a Palavra,<br>
                    Esteve,<br>
                    Está e Estará,<br>
                    e em Breve, para Sempre.<br>
                    <strong style="color: var(--accent); font-size: 1.5rem; display: block; margin-top: 1rem;">Amém!</strong>
                </p>
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
