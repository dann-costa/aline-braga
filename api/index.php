<?php

/**
 * api/index.php — Entrypoint exigido pela runtime PHP da Vercel
 * (vercel-community/php: https://github.com/vercel-community/php).
 * ------------------------------------------------------------------
 * A Vercel só reconhece funções PHP dentro de /api, então este
 * arquivo existe só por causa disso — ele não tem lógica própria,
 * apenas delega para o index.php real, na raiz do projeto, que
 * continua sendo o front controller de verdade (usado também no
 * Apache/cPanel via .htaccess). Nada muda na estrutura da LP.
 * ------------------------------------------------------------------
 */

require __DIR__ . '/../index.php';
