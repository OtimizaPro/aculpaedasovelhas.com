document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('artigos-search');
    const filterPills = document.querySelectorAll('.filter-pill');
    const artigoCards = document.querySelectorAll('.artigo-card');

    // Search functionality
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            filterArticles(searchTerm, getActiveCategory());
        });
    }

    // Filter pills
    filterPills.forEach(pill => {
        pill.addEventListener('click', function() {
            filterPills.forEach(p => p.classList.remove('active'));
            this.classList.add('active');
            
            const category = this.dataset.category;
            const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
            filterArticles(searchTerm, category);
        });
    });

    function getActiveCategory() {
        const activePill = document.querySelector('.filter-pill.active');
        return activePill ? activePill.dataset.category : 'all';
    }

    function filterArticles(searchTerm, category) {
        artigoCards.forEach(card => {
            const title = card.querySelector('.card-title')?.textContent.toLowerCase() || '';
            const excerpt = card.querySelector('.card-excerpt')?.textContent.toLowerCase() || '';
            const cardCategory = card.dataset.category || '';
            
            const matchesSearch = !searchTerm || title.includes(searchTerm) || excerpt.includes(searchTerm);
            const matchesCategory = category === 'all' || cardCategory === category;
            
            if (matchesSearch && matchesCategory) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Newsletter form
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            alert('Obrigado por se inscrever! Em breve você receberá nossos artigos em: ' + email);
            this.reset();
        });
    }
});
