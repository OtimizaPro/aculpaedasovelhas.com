<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Culpa é das Ovelhas - Reportagem Especial</title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <nav>
            <div class="logo">A Culpa é das Ovelhas</div>
            <ul>
                <li><a href="<?php echo home_url(); ?>">Início</a></li>
                <li><a href="<?php echo home_url('/o-livrinho'); ?>">O Livrinho</a></li>
                <li><a href="<?php echo home_url('/artigos'); ?>">Artigos</a></li>
                <li><a href="<?php echo home_url('/comunidade'); ?>">Comunidade</a></li>
                <li><a href="<?php echo home_url('/biblia'); ?>">Bíblia</a></li>
                <li><a href="<?php echo home_url('/an-agent'); ?>">AN Agent</a></li>
                <li><a href="<?php echo home_url('/apoie'); ?>" class="btn-subscribe">APOIE</a></li>
            </ul>
        </nav>
    </header>

    <main class="article-layout">
        <section class="article-hero">
            <div class="breadcrumb">
                <a href="<?php echo home_url(); ?>">Início</a>
                <span>&gt;</span>
                <a href="<?php echo home_url('/artigos'); ?>">Reportagens</a>
                <span>&gt;</span>
                <span>Edição Especial</span>
            </div>
            <span class="article-tag">Edição Especial</span>
            <h1>Jessica e Pedro</h1>
            <h2>Nas suas mãos, o poder de decidir.</h2>
            <p class="hero-lede">Um portal dedicado à Verdade, à Fé e à Liberdade.</p>
            <div class="article-meta">
                <img src="https://via.placeholder.com/64" alt="Anderson Belem">
                <div>
                    <span class="author-name">Anderson Belem</span>
                    <span class="meta-role">Fundador e editor responsável</span>
                    <span class="meta-date">Atualizado em <?php echo date('d \d\e F \d\e Y'); ?></span>
                </div>
            </div>
        </section>

        <section class="article-cover">
            <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=1400&q=80" alt="Editorial A Culpa é das Ovelhas">
            <p class="caption">Movimento independente para salvaguardar fé, liberdade e responsabilidade individual com tecnologia e comunidade.</p>
        </section>

        <section class="article-share">
            <?php
                $share_title = urlencode('Jessica e Pedro — A Culpa é das Ovelhas');
                $share_url = urlencode(home_url());
            ?>
            <span>Compartilhar</span>
            <a class="share-button" href="https://api.whatsapp.com/send?text=<?php echo $share_title . '%20' . $share_url; ?>" target="_blank" rel="noreferrer">WhatsApp</a>
            <a class="share-button" href="https://t.me/share/url?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank" rel="noreferrer">Telegram</a>
            <a class="share-button" href="https://twitter.com/intent/tweet?text=<?php echo $share_title; ?>&url=<?php echo $share_url; ?>" target="_blank" rel="noreferrer">X (Twitter)</a>
            <a class="share-button" href="mailto:?subject=<?php echo $share_title; ?>&body=<?php echo $share_url; ?>" target="_blank" rel="noreferrer">E-mail</a>
        </section>

        <article class="article-body">
            <p>
                Jessica e Pedro simbolizam as famílias que acompanham a verdade sem ruído. Ao colocar suas histórias no centro desta edição especial,
                reafirmamos que cada leitor tem o poder de decidir o futuro da nação ao buscar informação precisa, sólida e fundamentada em fé.
            </p>

            <blockquote>
                “No princípio era o Verbo, e o Verbo estava com Deus, e o Verbo era Deus.” — João 1:1
            </blockquote>

            <p>
                A cobertura premium da A Culpa é das Ovelhas adota metodologia semelhante aos grandes portais, mas mantém o compromisso com a honestidade.
                Aqui você encontra investigações autorais, projetos comunitários e tecnologia aplicada à leitura bíblica, tudo dentro da estética azul e dourada que já conhece.
            </p>

            <h3>White Paper: Texto de manifesto</h3>
            <p>
                O manifesto “O Livrinho” apresenta a refundação da fé em Cristo e pode ser lido na íntegra.
                Acesse o documento completo, acompanhe as próximas revelações e entenda o chamado desta obra cristocêntrica.
            </p>
            <p>
                <a class="inline-link" href="<?php echo home_url('/o-livrinho'); ?>">Ler o White Paper completo</a>
            </p>

            <h3>Comunidade: rede social própria</h3>
            <p>
                A plataforma comunitária está em desenvolvimento para reunir leitores, colunistas e intercessores em um mesmo espaço digital.
                Será possível compartilhar estudos, organizar grupos locais e fortalecer a cultura de discipulado responsável.
            </p>

            <h3>Apoie: assinatura e contribuição</h3>
            <p>
                Assinaturas mantêm os projetos Livros Livrinho, Artigos, Otimize-se e Somente Jesus faz por você.
                Também é possível enviar ofertas únicas para acelerar a produção editorial e técnica.
            </p>
            <ul>
                <li>Planos mensais com acesso antecipado aos conteúdos;</li>
                <li>Contribuições anuais com economia e e-books exclusivos;</li>
                <li>Apoio pontual direcionado a iniciativas específicas.</li>
            </ul>

            <h3>Bíblia: nova tradução literal rígida</h3>
            <p>
                O projeto bíblico aplica estudo linguístico em hebraico, aramaico e grego, com apoio de IA para manter fidelidade absoluta ao texto fonte.
                Cada versículo é documentado com transliterações, contexto histórico e notas técnicas abertas ao público.</p>

            <h3>AN Agent: estudo bíblico com IA</h3>
            <p>
                O AN Agent reúne um banco de dados completo das Escrituras e oferece buscas semânticas, correlação entre traduções e guias de estudo personalizados.
                É a aplicação prática de tecnologia para aprofundar a fé, mantendo auditoria humana e supervisão teológica.</p>

            <p>
                Todos esses pilares apontam para o mesmo destino: fortalecer Jessica, Pedro e cada leitor em sua jornada espiritual, intelectual e cívica.
                Permanecemos compromissados com a excelência editorial sem abrir mão do temor a Deus.
            </p>
        </article>

        <section class="article-related">
            <h3>Projetos em destaque</h3>
            <div class="related-grid">
                <a class="related-card" href="<?php echo home_url('/o-livrinho'); ?>">
                    <span class="related-label">Manifesto</span>
                    <h4>O Livrinho</h4>
                    <p>Leia a versão integral do White Paper que fundamenta o movimento.</p>
                </a>
                <a class="related-card" href="<?php echo home_url('/comunidade'); ?>">
                    <span class="related-label">Rede Social</span>
                    <h4>Comunidade</h4>
                    <p>Conheça o projeto da plataforma que conecta leitores e intercessores.</p>
                </a>
                <a class="related-card" href="<?php echo home_url('/apoie'); ?>">
                    <span class="related-label">Assinaturas</span>
                    <h4>Apoie</h4>
                    <p>Contribua com assinaturas ou doações únicas para manter o jornalismo independente.</p>
                </a>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-grid">
            <div class="footer-col">
                <h4>A Culpa é das Ovelhas</h4>
                <p>Um portal independente comprometido com a verdade.</p>
            </div>
            <div class="footer-col">
                <h4>Institucional</h4>
                <ul>
                    <li><a href="<?php echo home_url('/comunidade'); ?>">Quem Somos</a></li>
                    <li><a href="<?php echo home_url('/artigos'); ?>">Artigos</a></li>
                    <li><a href="<?php echo home_url('/apoie'); ?>">Assine</a></li>
                    <li><a href="<?php echo home_url('/contato'); ?>">Fale Conosco</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Legal</h4>
                <ul>
                    <li><a href="#">Termos de Uso</a></li>
                    <li><a href="#">Política de Privacidade</a></li>
                </ul>
            </div>
        </div>
        <div style="text-align: center; margin-top: 3rem; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 2rem;">
            <p>&copy; <?php echo date('Y'); ?> A Culpa é das Ovelhas. Todos os direitos reservados.</p>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>