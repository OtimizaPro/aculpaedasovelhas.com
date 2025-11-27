<?php
/**
 * Lightweight data source for the Bíblia Online section.
 */

function otimiza_bible_get_books()
{
    return [
        [
            'book' => 'Mateus',
            'slug' => 'mateus',
            'category' => 'Evangelhos',
            'testament' => 'novo',
            'chapters' => 28,
            'commented' => 22,
            'status' => 'Comentário ativo',
            'audio' => true,
            'insight' => 'Genealogia traduzida com ênfase profética e notas sobre as parábolas do Reino.',
            'last_update' => 'Nov/2025',
        ],
        [
            'book' => 'Marcos',
            'slug' => 'marcos',
            'category' => 'Evangelhos',
            'testament' => 'novo',
            'chapters' => 16,
            'commented' => 16,
            'status' => 'Versão pronta',
            'audio' => true,
            'insight' => 'Narrativa enxuta destacando cada intervenção messiânica em ritmo de operação.',
            'last_update' => 'Out/2025',
        ],
        [
            'book' => 'Lucas',
            'slug' => 'lucas',
            'category' => 'Evangelhos',
            'testament' => 'novo',
            'chapters' => 24,
            'commented' => 12,
            'status' => 'Tradução em revisão',
            'audio' => false,
            'insight' => 'Investigações históricas cruzando manuscritos gregos com chaves do manifesto.',
            'last_update' => 'Set/2025',
        ],
        [
            'book' => 'João',
            'slug' => 'joao',
            'category' => 'Evangelhos',
            'testament' => 'novo',
            'chapters' => 21,
            'commented' => 9,
            'status' => 'Nova revelação',
            'audio' => false,
            'insight' => 'Camadas místicas alinhadas ao "Radar Espiritual" para discipulado avançado.',
            'last_update' => 'Nov/2025',
        ],
        [
            'book' => 'Atos',
            'slug' => 'atos',
            'category' => 'Histórico',
            'testament' => 'novo',
            'chapters' => 28,
            'commented' => 18,
            'status' => 'Comentário ativo',
            'audio' => true,
            'insight' => 'Mapeamento apostólico com camadas estratégicas para missões urbanas.',
            'last_update' => 'Ago/2025',
        ],
        [
            'book' => 'Romanos',
            'slug' => 'romanos',
            'category' => 'Cartas',
            'testament' => 'novo',
            'chapters' => 16,
            'commented' => 11,
            'status' => 'Comentário ativo',
            'audio' => false,
            'insight' => 'Tratado jurídico-espiritual traduzido para linguagem civil e legislativa.',
            'last_update' => 'Nov/2025',
        ],
        [
            'book' => '1 Coríntios',
            'slug' => '1-corintios',
            'category' => 'Cartas',
            'testament' => 'novo',
            'chapters' => 16,
            'commented' => 16,
            'status' => 'Versão pronta',
            'audio' => true,
            'insight' => 'Framework disciplinar completo com guias para comunidades em crise.',
            'last_update' => 'Set/2025',
        ],
        [
            'book' => 'Apocalipse',
            'slug' => 'apocalipse',
            'category' => 'Profético',
            'testament' => 'novo',
            'chapters' => 22,
            'commented' => 6,
            'status' => 'Nova revelação',
            'audio' => false,
            'insight' => 'Cartografia profética alinhada ao manifesto para análises geopolíticas.',
            'last_update' => 'Nov/2025',
        ],
    ];
}

function otimiza_bible_get_summary()
{
    $books = otimiza_bible_get_books();
    $totalChapters = 0;
    $commentedChapters = 0;
    $ready = 0;

    foreach ($books as $book) {
        $totalChapters += $book['chapters'];
        $commentedChapters += $book['commented'];
        if ($book['status'] === 'Versão pronta') {
            $ready++;
        }
    }

    return [
        'books' => count($books),
        'ready' => $ready,
        'progress' => $totalChapters ? round(($commentedChapters / $totalChapters) * 100) : 0,
    ];
}
