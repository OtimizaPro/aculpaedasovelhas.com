document.addEventListener('DOMContentLoaded', () => {
    const grid = Array.from(document.querySelectorAll('.bible-card'));
    const searchInput = document.querySelector('#bible-search');
    const chips = Array.from(document.querySelectorAll('.filter-chip'));

    const filterCards = () => {
        const query = (searchInput?.value || '').toLowerCase();
        const activeChip = chips.find((chip) => chip.classList.contains('is-active'));
        const statusFilter = activeChip ? activeChip.getAttribute('data-filter') : 'all';

        grid.forEach((card) => {
            const book = card.getAttribute('data-book');
            const status = card.getAttribute('data-status');
            const insight = card.querySelector('.bible-card__insight')?.textContent.toLowerCase() || '';
            const matchesText = !query || book.includes(query) || insight.includes(query);
            const matchesStatus = statusFilter === 'all' || status === statusFilter;
            card.style.display = matchesText && matchesStatus ? '' : 'none';
        });
    };

    chips.forEach((chip) => {
        chip.addEventListener('click', () => {
            chips.forEach((c) => c.classList.remove('is-active'));
            chip.classList.add('is-active');
            filterCards();
        });
    });

    searchInput?.addEventListener('input', () => {
        window.requestAnimationFrame(filterCards);
    });

    document.querySelectorAll('[data-book-insight]').forEach((button) => {
        button.addEventListener('click', () => {
            const card = button.closest('.bible-card');
            if (!card) {
                return;
            }
            card.classList.add('is-highlighted');
            card.scrollIntoView({ behavior: 'smooth', block: 'center' });
            window.setTimeout(() => card.classList.remove('is-highlighted'), 1800);
        });
    });
});
