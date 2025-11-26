document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('artigos-search');
    const filterChips = document.querySelectorAll('.chip');
    const artigoCards = document.querySelectorAll('.artigo-card');

    // Search functionality
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            filterArticles(searchTerm, getActiveCategory());
        });
    }

    // Filter chips
    filterChips.forEach(chip => {
        chip.addEventListener('click', function() {
            filterChips.forEach(c => c.classList.remove('active'));
            this.classList.add('active');
            
            const category = this.dataset.category;
            const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
            filterArticles(searchTerm, category);
        });
    });

    function getActiveCategory() {
        const activeChip = document.querySelector('.chip.active');
        return activeChip ? activeChip.dataset.category : 'all';
    }

    function filterArticles(searchTerm, category) {
        artigoCards.forEach(card => {
            const title = card.querySelector('.card-title')?.textContent.toLowerCase() || '';
            const excerpt = card.querySelector('.card-excerpt')?.textContent.toLowerCase() || '';
            const categories = card.dataset.categories?.toLowerCase() || '';
            
            const matchesSearch = !searchTerm || title.includes(searchTerm) || excerpt.includes(searchTerm);
            const matchesCategory = category === 'all' || categories.includes(category.toLowerCase());
            
            if (matchesSearch && matchesCategory) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }
});