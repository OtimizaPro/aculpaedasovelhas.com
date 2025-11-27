</main>

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Brand Column -->
            <div class="footer-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                    A Culpa é das Ovelhas
                </a>
                <p>"Revelando verdades que transformam - para os que tem ouvidos para ouvir."</p>
                
                <div class="footer-social">
                    <a href="https://x.com/" target="_blank" rel="noopener" aria-label="X (Twitter)">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </a>
                    <a href="https://youtube.com/" target="_blank" rel="noopener" aria-label="YouTube">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                    <a href="https://instagram.com/" target="_blank" rel="noopener" aria-label="Instagram">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Content Column -->
            <div class="footer-col">
                <h4>Conteudo</h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/manifesto')); ?>">Manifesto</a></li>
                    <li><a href="<?php echo esc_url(home_url('/o-livrinho')); ?>">O Livrinho</a></li>
                    <li><a href="<?php echo esc_url(home_url('/biblia')); ?>">Biblia Online</a></li>
                    <li><a href="<?php echo esc_url(home_url('/artigos')); ?>">Artigos</a></li>
                </ul>
            </div>
            
            <!-- About Column -->
            <div class="footer-col">
                <h4>Sobre</h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/o-autor')); ?>">O Autor</a></li>
                    <li><a href="<?php echo esc_url(home_url('/an-agent')); ?>">AN Agent</a></li>
                    <li><a href="<?php echo esc_url(home_url('/painel')); ?>">Painel</a></li>
                </ul>
            </div>
            
            <!-- Contact Column -->
            <div class="footer-col">
                <h4>Contato</h4>
                <ul>
                    <li><a href="mailto:contato@aculpaedasovelhas.com">Email</a></li>
                    <li><a href="https://wa.me/" target="_blank">WhatsApp</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> A Culpa é das Ovelhas. Todos os direitos reservados.</p>
            <div>
                <a href="<?php echo esc_url(home_url('/privacidade')); ?>">Politica de Privacidade</a>
            </div>
        </div>
    </div>
</footer>

<script>
// Header scroll effect
const header = document.getElementById('site-header');
window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

// Mobile menu toggle
const menuToggle = document.getElementById('menu-toggle');
const navMenu = document.getElementById('nav-menu');

menuToggle?.addEventListener('click', () => {
    navMenu.classList.toggle('active');
    menuToggle.classList.toggle('active');
});

// Theme toggle
const themeToggle = document.getElementById('theme-toggle');
const prefersDark = window.matchMedia('(prefers-color-scheme: dark)');

function setTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme);
}

// Initialize theme
const savedTheme = localStorage.getItem('theme');
if (savedTheme) {
    setTheme(savedTheme);
} else {
    setTheme(prefersDark.matches ? 'dark' : 'light');
}

themeToggle?.addEventListener('click', () => {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    setTheme(currentTheme === 'dark' ? 'light' : 'dark');
});
</script>

<?php wp_footer(); ?>
</body>
</html>
