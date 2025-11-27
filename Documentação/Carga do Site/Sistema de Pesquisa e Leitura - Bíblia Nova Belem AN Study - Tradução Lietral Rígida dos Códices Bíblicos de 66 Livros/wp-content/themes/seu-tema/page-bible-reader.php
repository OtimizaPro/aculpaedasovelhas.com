<?php
/*
 Template Name: Bíblia Nova Belém AN Reader
 Description: Página de leitura e navegação bíblica com estrutura inspirada no Bible.com para uso interno do sistema AN Study.
*/
get_header();
?>

<div id="bible-reader" class="nb-reader">

  <header class="nb-header">
    <div class="nb-nav">
      <button id="nb-prev" class="nb-btn">Anterior</button>

      <div class="nb-ref">
        <span id="nb-livro"></span>
        <span id="nb-capitulo"></span>
      </div>

      <button id="nb-next" class="nb-btn">Próximo</button>
    </div>
  </header>

  <main id="nb-texto" class="nb-texto">
    <!-- Versículos renderizados dinamicamente via JS -->
  </main>

  <aside class="nb-side">
    <div class="nb-tools">
      <input type="search" id="nb-busca" placeholder="Buscar na Bíblia…" />
      <button id="nb-toggle-versos" class="nb-btn-alt">Mostrar/Ocultar Numeração</button>
    </div>
  </aside>

</div>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/bible/nb.css" />
<script src="<?php echo get_template_directory_uri(); ?>/bible/nb.js"></script>

<?php get_footer(); ?>
