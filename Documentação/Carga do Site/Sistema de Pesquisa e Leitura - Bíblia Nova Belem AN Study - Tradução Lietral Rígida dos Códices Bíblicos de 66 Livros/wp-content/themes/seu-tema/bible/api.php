<?php
// Registro da API da Bíblia Nova Belém AN

add_action('rest_api_init', function () {
    register_rest_route('anbible/v1', '/capitulo', [
        'methods'  => 'GET',
        'callback' => 'anbible_get_capitulo',
        'permission_callback' => '__return_true',
    ]);
});

/**
 * Retorna o capítulo solicitado
 * Exemplo: /wp-json/anbible/v1/capitulo?livro=JHN&cap=1
 */
function anbible_get_capitulo($req)
{
    $livro = sanitize_text_field($req->get_param('livro'));
    $cap   = intval($req->get_param('cap'));

    if (!$livro || !$cap) {
        return [
            'erro' => 'Parâmetros obrigatórios: livro (string), cap (int)',
        ];
    }

    $file = get_template_directory() . "/bible/data/{$livro}/{$cap}.json";

    if (!file_exists($file)) {
        return [
            'erro' => 'Capítulo não encontrado',
        ];
    }

    $json = json_decode(file_get_contents($file), true);

    if (!is_array($json)) {
        return [
            'erro' => 'Arquivo de capítulo inválido',
        ];
    }

    return [
        'livro' => $livro,
        'capitulo' => $cap,
        'versos' => $json,
    ];
}
