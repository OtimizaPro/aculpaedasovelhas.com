<?php
/* LEITURA OBRIGATÓRIA: ./DEFINICOES_DO_PROJETO.md */
/**
 * Template: Front Page
 * Description: Microsoft Account Inspired Layout
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> | Painel</title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class('ms-account-page'); ?>>

    <header class="ms-header">
        <div class="ms-header-content">
            <div class="ms-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            </div>
            <div class="ms-user-menu">
                <!-- Placeholder for user icon -->
                <div class="ms-user-avatar"></div>
            </div>
        </div>
    </header>

    <main class="ms-main-content">
        <div class="ms-content-wrapper">
            <div class="ms-page-header">
                <h1>Bem-vindo ao seu painel</h1>
                <p class="ms-subtitle">Gerencie seu conteúdo, explore as ferramentas e acompanhe o desenvolvimento do manifesto.</p>
            </div>

            <div class="ms-card-grid">
                <div class="ms-card">
                    <div class="ms-card-icon">📜</div>
                    <div class="ms-card-content">
                        <h3>O Livrinho</h3>
                        <p>Acesse o manifesto completo, com todas as chaves e revelações.</p>
                        <a href="<?php echo esc_url(home_url('/o-livrinho')); ?>" class="ms-card-link">Ler agora &rarr;</a>
                    </div>
                </div>

                <div class="ms-card">
                    <div class="ms-card-icon">📰</div>
                    <div class="ms-card-content">
                        <h3>Artigos Recentes</h3>
                        <p>Explore os últimos estudos, contestações e insights publicados.</p>
                        <a href="<?php echo esc_url(home_url('/artigos')); ?>" class="ms-card-link">Ver todos &rarr;</a>
                    </div>
                </div>

                <div class="ms-card">
                    <div class="ms-card-icon">📖</div>
                    <div class="ms-card-content">
                        <h3>Bíblia Online</h3>
                        <p>Navegue pela tradução proprietária e comentada da Revelação.</p>
                        <a href="<?php echo esc_url(home_url('/biblia')); ?>" class="ms-card-link">Acessar a Bíblia &rarr;</a>
                    </div>
                </div>

                <div class="ms-card">
                    <div class="ms-card-icon">🤖</div>
                    <div class="ms-card-content">
                        <h3>AN Agent</h3>
                        <p>Interaja com a IA para estudos assistidos e aprofundados.</p>
                        <a href="<?php echo esc_url(home_url('/an-agent')); ?>" class="ms-card-link">Ativar AN Agent &rarr;</a>
                    </div>
                </div>
                
                <div class="ms-card">
                    <div class="ms-card-icon">✉️</div>
                    <div class="ms-card-content">
                        <h3>Contato</h3>
                        <p>Envie suas perguntas, sugestões ou feedback para a equipe.</p>
                        <a href="#" class="ms-card-link">Entrar em contato &rarr;</a>
                    </div>
                </div>

                 <div class="ms-card">
                    <div class="ms-card-icon">⚙️</div>
                    <div class="ms-card-content">
                        <h3>Em Breve</h3>
                        <p>Novas ferramentas e seções serão adicionadas aqui.</p>
                        <a href="#" class="ms-card-link">Saiba mais &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php wp_footer(); ?>
</body>
</html>
