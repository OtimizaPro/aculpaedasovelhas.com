<?php
/* LEITURA OBRIGATÓRIA: ./DEFINICOES_DO_PROJETO.md */
/**
 * Template Name: O Autor
 * Description: Página de Biografia do Autor
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> | O Autor</title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class('autor-page'); ?>>

    <!-- Navigation -->
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

    <section class="hero-banner" style="min-height: 50vh; display: flex; align-items: center;">
        <div class="hero-inner" style="text-align: center; display: block;">
            <div class="hero-copy" style="margin: 0 auto; max-width: 800px;">
                <span class="hero-pill">Biografia</span>
                <h1>O Autor</h1>
                <p style="margin: 1.5rem auto; font-size: 1.5rem; color: var(--text-primary);">Anderson Belem</p>
            </div>
        </div>
        <div class="hero-noise" aria-hidden="true"></div>
    </section>

    <main class="livrinho-content">
        <div class="content-wrapper">
            
            <article class="bio-content" style="max-width: 800px; margin: 0 auto 5rem; color: var(--text-muted); line-height: 1.8; font-size: 1.1rem;">
                
                <h2 style="color: var(--text-primary); margin-top: 3rem;">Infância e primeiros passos na fé</h2>
                <p>Nasci em 11 de outubro de 1981, no Rio de Janeiro. Fui criado dentro da fé católica, fiz o catecismo e a primeira comunhão. Durante a crisma, porém, algo em mim se rompeu. Afastei-me da Igreja Católica Apostólica Romana e iniciei uma caminhada de busca — uma jornada espiritual e intelectual que me levaria por muitos caminhos antes de voltar a Jesus Cristo.</p>
                <p>Mesmo afastado, conservei respeito pelas tradições da minha infância. Batizei meus dois primeiros filhos, Jéssica e Nicolas Belém, e me casei no dia do meu aniversário de 22 anos, em 11 de outubro de 2003, na Paróquia São Roque de Vila Valqueire, Zona Oeste do Rio.</p>

                <h2 style="color: var(--text-primary); margin-top: 3rem;">Juventude e primeiras decepções religiosas</h2>
                <p>Na adolescência, frequentei uma igreja batista em Honório Gurgel, subúrbio do Rio. Buscava respostas e comunhão, mas me decepcionei com a ênfase exagerada em dízimos e com o que percebia como imitação de manifestações pentecostais — muita gritaria, supostas línguas angelicais sem entendimento e canções cheias de citações bíblicas mal compreendidas. Eu via emoção, mas pouca verdade espiritual.</p>

                <h2 style="color: var(--text-primary); margin-top: 3rem;">Vida adulta e nova busca</h2>
                <p>Na vida adulta, minha esposa se batizou em uma igreja neopentecostal de parede preta, voltada à prosperidade. Apresentamos nossa filha caçula, Antonella Belém, ali. Contudo, novamente me desiludi. Vi mais teatro do que ministério — um “show” religioso em vez de pregação do arrependimento. Mesmo assim, registrei alguns versículos mencionados pelo pastor, que na prática agia mais como ator de stand-up do que como servo de Deus.</p>

                <h2 style="color: var(--text-primary); margin-top: 3rem;">O milagre da Páscoa</h2>
                <p>Durante a pandemia de COVID-19, minha filha Antonella foi acometida por uma doença autoimune sem diagnóstico inicial. Seu quadro piorava dia após dia. Ela emagreceu, não conseguia colocar os pés no chão e ficou abatida. Na Semana Santa, chegamos ao limite.</p>
                <p>Mas no Domingo da Ressurreição, algo mudou. O diagnóstico finalmente veio, o tratamento médico correto começou e, naquele mesmo domingo, ela comeu chocolate — com o olhar vivo, sem olheiras, o rosto renovado. Na quarta-feira, já estava em casa, brincando. Foi um milagre.</p>
                <p>Entendi naquele dia que Cristo havia me chamado de volta. Era como se Ele dissesse: “Estou aqui, como sempre estive.”</p>

                <h2 style="color: var(--text-primary); margin-top: 3rem;">Retorno a Cristo</h2>
                <p>Aquele episódio me fez olhar para Jesus novamente após três décadas mergulhado em filosofia, gnosticismo, misticismo, espiritualismo, cabala, budismo e hermetismo. Tudo o que eu buscava estava diante de mim o tempo todo: a verdade viva da Palavra de Deus.</p>
                <p>Nos anos seguintes, enfrentei depressão profunda e recebi diagnóstico de TDAH e síndromes tardias. Depois de 15 anos na Polícia do Estado do Rio de Janeiro, me afastei para me dedicar ao empreendedorismo tecnológico. Foram anos de reestruturação interior e espiritual.</p>
                <p>Em meio a isso, Jesus Cristo começou a me revelar um novo entendimento das Escrituras — não fatos inéditos sobre o futuro, mas a leitura correta do que sempre esteve escrito.</p>

                <h2 style="color: var(--text-primary); margin-top: 3rem;">A transformação de “A Culpa é das Ovelhas”</h2>
                <p>Eu já escrevia o livro “A Culpa é das Ovelhas”, originalmente concebido como crítica sociológica sobre sistemas de poder, manipulação e comunicação de massa. Inspirado por ideias de Carlos Nepomuceno, cuja palestra assisti em 2014, mergulhei no estudo da comunicação como estrutura civilizacional. Sou aluno por seis anos da Escola Bimodal, onde aprendi que a descentralização da comunicação humana é essencial para a liberdade.</p>
                <p>Contudo, com o tempo e com as revelações recebidas, compreendi algo maior: a descentralização humana não é a solução. A verdadeira libertação está na centralização em Jesus Cristo — o único Centro legítimo, o único capaz de sustentar a verdade, a justiça e a vida.</p>
                <p>Assim, “A Culpa é das Ovelhas” deixou de ser apenas uma análise de sistemas humanos e se tornou uma obra espiritual, onde Cristo é o foco. O capítulo que tratava da Bíblia e das ovelhas se tornou o coração de todo o livro — e também o centro da minha própria vida.</p>

                <h2 style="color: var(--text-primary); margin-top: 3rem;">Batismo no Espírito Santo e revelações</h2>
                <p>Em dado momento, percebi que um louvor antigo ecoava na minha mente havia décadas: a canção “João Viu”. Coloquei-a para tocar e, naquele instante, fui batizado pelo Espírito Santo.</p>
                <p>Chorei de forma incontrolável, sem entender o motivo, até perceber que o Espírito me fazia reconhecer que eu vinha recebendo revelações diretas do Livro da Revelação de Jesus Cristo, chamado erroneamente de Apocalipse.</p>
                <p>A partir desse dia, recebi revelações sobre a data do retorno de Jesus, conforme as profecias de Daniel. Compreendi o número da besta, os nomes das bestas da terra e do mar, identifiquei o primeiro anticristo, o falso profeta, as duas testemunhas, o dragão, a mulher prostituta, a grande Babilônia, o cavaleiro branco e as bestas de Daniel.</p>
                <p>Desde então, continuo recebendo revelações diárias sobre a interpretação correta da Bíblia, sempre confirmadas pelo próprio Texto Sagrado.</p>

                <h2 style="color: var(--text-primary); margin-top: 3rem;">Propósito e missão</h2>
                <p>Minha base é exclusivamente a Escritura. Dela retiro tudo o que ensino e escrevo.</p>
                <p>Uno o que aprendi na faculdade de Literatura Brasileira — minha paixão por texto, palavra, comunicação e poesia — com o Texto Sagrado, para construir uma nova visão: uma leitura que revela o homem da iniquidade e expõe o grande engano amplamente disseminado na internet e no meio escatológico.</p>
                <p>Essa é minha missão: usar o dom da Comunicação, da Palavra e da Revelação para apontar e testemunhar sobre as coisas de Deus, as coisas de Jesus Cristo de Nazaré, o Deus que nasceu em Belém, o centro de toda a Verdade e o início de toda a vida.</p>

            </article>

            <hr style="border: 0; border-top: 1px solid var(--border); margin: 0 auto 4rem; max-width: 200px;">

        </div>
    </main>

    <?php wp_footer(); ?>
</body>
</html>
