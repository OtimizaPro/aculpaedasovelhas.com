<?php
/*
Template Name: O Livrinho
*/
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Livrinho: A Culpa é das Ovelhas</title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <nav>
            <div class="logo">A Culpa é das Ovelhas</div>
            <ul>
                <li><a href="<?php echo home_url(); ?>">Início</a></li>
                <li><a href="<?php echo home_url('/o-livrinho'); ?>" class="active">O Livrinho</a></li>
                <li><a href="<?php echo home_url('/artigos'); ?>">Artigos</a></li>
                <li><a href="<?php echo home_url('/sobre'); ?>">O Autor</a></li>
                <li><a href="<?php echo home_url('/comunidade'); ?>">Comunidade</a></li>
                <li><a href="<?php echo home_url('/biblia'); ?>">Bíblia</a></li>
                <li><a href="<?php echo home_url('/an-agent'); ?>">AN Agent</a></li>
                <li><a href="<?php echo home_url('/apoie'); ?>" class="btn-subscribe">APOIE</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <article class="manifesto-content" style="margin-top: 4rem;">
            <header class="entry-header">
                <h1 class="entry-title">O “Livrinho”</h1>
                <h2 class="entry-subtitle">(βιβλαρίδιον) nome por mim dado a esta Obra</h2>
            </header>

            <div class="entry-content">
                <p>Faz referência e Paralelismo ao Texto original de — “A Revelação de Jesus Cristo” o Livro da Palavra Direta de Jesus Cristo a que muitos chamam por engano do grande engano de (Ap).</p>

                <div class="technical-note" style="background: #f9f9f9; padding: 1.5rem; border-left: 4px solid var(--primary-color); margin: 2rem 0;">
                    <h3 style="margin-top: 0;">📌 Nota</h3>
                    <ul style="list-style: none; padding-left: 0;">
                        <li style="margin-bottom: 0.5rem;">→ (Ap) “(Ap) foi mantido neste Livrinho como ref. ao Livro Sagrado “Revelação de Jesus Cristo”, pois a maioria das Bíblias impressas e/ou digitais adota essa forma em todo o Mundo.”</li>
                        <li style="margin-bottom: 0.5rem;">→ βιβλαρίδιον (biblarídion) é o diminutivo de βιβλίον (biblíon), significando literalmente “Livrinho” ou “Pequeno Livro”.</li>
                        <li style="margin-bottom: 0.5rem;">→ O termo ocorre em “Revelação de Jesus Cristo” 10:2, 8, 9, 10.</li>
                        <li>→ No contexto, o Livrinho representa uma revelação específica que João deve comer e profetizar novamente (Ap 10:9-11).</li>
                    </ul>
                </div>

                <blockquote style="border-left: 4px solid var(--accent-color); padding-left: 1.5rem; margin: 2rem 0; font-style: italic;">
                    <p>❗ “E vi outro anjo forte descendo do céu, envolto em nuvem, e o arco-íris sobre a cabeça dele, e o rosto dele como o sol, e os pés dele como colunas de fogo; e tendo em a mão dele um livrinho aberto; e pôs o pé dele o direito sobre o mar, o porém esquerdo sobre a terra; e clamou com voz grande como ruge leão; e quando clamou, falaram as sete trovoadas as vozes delas.</p>
                    <p>E quando falaram as sete trovoadas, eu estava prestes a escrever; e ouvi voz do céu dizendo: Sela o que falaram as sete trovoadas, e não escrevas isto.</p>
                    <p>E o anjo que vi estar sobre o mar e sobre a terra levantou a mão dele direita ao céu, e jurou por Aquele que vive pelos séculos dos séculos, que criou o céu e o que nele há, e a terra e o que nela há, e o mar e o que nele há, que tempo já não haverá; mas nos dias da voz do sétimo anjo, quando estiver para tocar a trombeta, consumar-se-á o mistério de Deus, como anunciou aos servos Dele, os profetas.</p>
                    <p>E a voz que ouvi do céu falou comigo novamente e disse: Vai, toma o livrinho aberto na mão do anjo que está sobre o mar e sobre a terra.</p>
                    <p>E fui ao anjo, dizendo-lhe que me desse o livrinho; e ele me diz: Toma e come-o, e amargará o ventre teu, mas na boca tua será doce como mel.</p>
                    <p>E tomei o livrinho da mão do anjo e o comi, e era na boca minha doce como mel; e quando o comi, o ventre meu se tornou amargo.</p>
                    <p>E dizem-me: É necessário que profetizes novamente acerca de povos, e nações, e línguas, e reis muitos.”</p>
                    <footer style="margin-top: 1rem; font-weight: bold; text-align: right;">
                        📖 “A Revelação de Jesus Cristo”<br>
                        📜 10:2 (NA28)
                    </footer>
                </blockquote>

                <div class="technical-note" style="background: #f9f9f9; padding: 1rem; border-left: 4px solid var(--primary-color); margin: 2rem 0;">
                    <p><strong>📌 Nota:</strong> Assim, o “Livrinho na mão do Anjo” não este, é parte central da “Revelação de Jesus Cristo”, transmitido diretamente ao Profeta João.</p>
                </div>

                <div style="margin-top: 3rem; text-align: center;">
                    <a href="<?php echo home_url('/chaves-e-frameworks'); ?>" class="btn-primary" style="display: inline-block; padding: 1rem 2rem; text-decoration: none;">Ler sobre Chaves e Frameworks →</a>
                </div>
            </div>
        </article>
    </main>

    <footer>
        <div style="text-align: center; padding: 2rem; border-top: 1px solid #eee;">
            <p>&copy; <?php echo date('Y'); ?> A Culpa é das Ovelhas</p>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>