<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Culpa é das Ovelhas - Portal</title>
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
                <li><a href="#assinar" class="btn-subscribe">ASSINAR</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Nas suas mãos, o poder de decidir.</h1>
            <p class="hero-subtitle">Um portal dedicado à Verdade, à Fé e à Liberdade.</p>
            <a href="#assinar" class="btn-primary" style="background-color: var(--accent-gold); color: var(--primary-blue);">ASSINE AGORA</a>
        </div>
    </section>

    <main>
        <!-- Whitepaper Section (Destaque) -->
        <section id="whitepaper" class="section-container whitepaper-teaser">
            <h2 class="section-title">Whitepaper - A Verdade</h2>
            <div class="manifesto-content">
                <h3 style="text-align: center; margin-bottom: 2rem;">“O Livrinho: A Culpa é das Ovelhas”</h3>
                <blockquote>
                    “No princípio era o Verbo, e o Verbo estava com Deus, e o Verbo era Deus.” — João 1:1
                </blockquote>
                <p>A Obra “O Livrinho. A Culpa é das Ovelhas” nasce com propósito singular e grandioso: restabelecer a Verdade sobre a Verdadeira Igreja de Cristo...</p>
                <div style="text-align: center; margin-top: 2rem;">
                    <a href="<?php echo home_url('/o-livrinho'); ?>" class="btn-primary">LER O MANIFESTO COMPLETO</a>
                </div>
            </div>
        </section>

        <!-- Colunistas Section -->
        <section id="colunistas" class="section-container" style="background-color: white;">
            <h2 class="section-title">Nossos Colunistas</h2>
            <div class="columnists-grid">
                <!-- Colunista 1 -->
                <div class="columnist-card">
                    <img src="https://via.placeholder.com/150" alt="Anderson Belem" class="columnist-avatar">
                    <h3 class="columnist-name">Anderson Belem</h3>
                    <p>Fundador & CEO Otimiza.pro. Escreve sobre Fé, Tecnologia e Sociedade.</p>
                </div>
                <!-- Colunista 2 (Placeholder) -->
                <div class="columnist-card">
                    <img src="https://via.placeholder.com/150" alt="Colunista Convidado" class="columnist-avatar">
                    <h3 class="columnist-name">Colunista Convidado</h3>
                    <p>Espaço reservado para vozes que edificam.</p>
                </div>
                <!-- Colunista 3 (Placeholder) -->
                <div class="columnist-card">
                    <img src="https://via.placeholder.com/150" alt="Colunista Convidado" class="columnist-avatar">
                    <h3 class="columnist-name">Colunista Convidado</h3>
                    <p>Análises profundas sobre o cenário atual.</p>
                </div>
            </div>
        </section>

        <!-- Assinar / Planos Section -->
        <section id="assinar" class="section-container">
            <h2 class="section-title">Escolha o plano ideal para você</h2>
            <div class="pricing-grid">
                <!-- Plano Digital -->
                <div class="pricing-card">
                    <h3>Plano Digital</h3>
                    <div class="price">R$ 27,90<span>/mês</span></div>
                    <ul style="text-align: left; margin: 2rem 0; list-style: none;">
                        <li>✅ Acesso ilimitado a notícias</li>
                        <li>✅ Colunas exclusivas</li>
                        <li>✅ Comentários liberados</li>
                    </ul>
                    <a href="#" class="btn-primary">ASSINAR</a>
                </div>

                <!-- Plano Premium (Destaque) -->
                <div class="pricing-card featured">
                    <div class="pricing-badge">MAIS POPULAR</div>
                    <h3>Plano Premium</h3>
                    <div class="price">R$ 44,90<span>/mês</span></div>
                    <ul style="text-align: left; margin: 2rem 0; list-style: none;">
                        <li>✅ <strong>Tudo do Digital</strong></li>
                        <li>✅ Navegação sem anúncios</li>
                        <li>✅ E-books e Cursos exclusivos</li>
                        <li>✅ Acesso antecipado ao Whitepaper</li>
                    </ul>
                    <a href="#" class="btn-primary">ASSINAR PREMIUM</a>
                </div>

                <!-- Plano Anual -->
                <div class="pricing-card">
                    <h3>Plano Anual</h3>
                    <div class="price">R$ 21,00<span>/mês</span></div>
                    <p style="font-size: 0.9rem; color: #666;">Cobrado anualmente (R$ 252,00)</p>
                    <ul style="text-align: left; margin: 2rem 0; list-style: none;">
                        <li>✅ Economia de 25%</li>
                        <li>✅ Todos os benefícios do Digital</li>
                    </ul>
                    <a href="#" class="btn-primary">ASSINAR ANUAL</a>
                </div>
            </div>
        </section>

        <!-- Quem Somos Section -->
        <section id="quem-somos" class="section-container" style="background-color: white;">
            <h2 class="section-title">Quem Somos</h2>
            <div style="max-width: 800px; margin: 0 auto; text-align: center;">
                <p style="font-size: 1.2rem; margin-bottom: 2rem;">
                    A "A Culpa é das Ovelhas" é mais que um portal, é um movimento. 
                    Reconhecemos a dignidade intrínseca de cada vida humana e buscamos a Verdade acima de tudo.
                </p>
                <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 200px;">
                        <h4>Dignidade Humana</h4>
                        <p>Valorizamos a vida desde a concepção.</p>
                    </div>
                    <div style="flex: 1; min-width: 200px;">
                        <h4>Liberdade</h4>
                        <p>Acreditamos na liberdade individual e responsabilidade.</p>
                    </div>
                    <div style="flex: 1; min-width: 200px;">
                        <h4>Verdade</h4>
                        <p>Compromisso inegociável com os fatos.</p>
                    </div>
                </div>
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
                    <li><a href="#quem-somos">Quem Somos</a></li>
                    <li><a href="#colunistas">Colunistas</a></li>
                    <li><a href="#assinar">Assine</a></li>
                    <li><a href="#">Fale Conosco</a></li>
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