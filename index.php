<?php
/**
 * index.php — Front controller (estilo WordPress)
 * ------------------------------------------------------------------
 * TODA requisição que não seja um arquivo real (assets, imagens etc.)
 * cai aqui, via a regra única no .htaccess. As rotas em si ficam em
 * config/routes.php — este arquivo só resolve a URL pedida e monta
 * a página (header + conteúdo + footer).
 * ------------------------------------------------------------------
 */

$routes = require __DIR__ . '/config/routes.php';

// Pega o caminho da URL (sem querystring) e remove as barras das pontas.
// "/", "/termos-de-uso/" e "/termos-de-uso" viram, respectivamente: "", "termos-de-uso", "termos-de-uso"
$slug  = trim((string) parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$route = $routes[$slug] ?? null;

// ----- Rota não encontrada: 404 simples, com a mesma identidade visual -----
if ($route === null) {
  http_response_code(404);
  $pageTitle = 'Página não encontrada';
  $robots    = 'noindex, nofollow';
  require __DIR__ . '/inc/header.php';
  ?>
  <main class="legal-page">
    <div class="container-page text-center">
      <span class="eyebrow eyebrow-static">ERRO 404</span>
      <h1 class="section-title mx-auto mt-4">Página não encontrada</h1>
      <p class="mt-4 text-slate-400 max-w-xl mx-auto">O endereço acessado não existe ou foi movido.</p>
      <a href="/" class="btn-primary mt-7 inline-flex">VOLTAR PARA A PÁGINA INICIAL</a>
    </div>
  </main>
  <?php
  require __DIR__ . '/inc/footer.php';
  exit;
}

// ----- Rota válida: monta as variáveis que inc/header.php e inc/footer.php esperam -----
$pageTitle         = $route['title'];
$pageDescription   = $route['description'];
$robots            = $route['robots'] ?? 'index, follow';
$showProductSchema = $route['showProductSchema'] ?? false;
$showMobileCtaBar  = $route['showMobileCtaBar'] ?? false;
if (isset($route['logoHref'])) { $logoHref = $route['logoHref']; }
if (isset($route['ctaHref']))  { $ctaHref  = $route['ctaHref']; }

require __DIR__ . '/inc/header.php';
require $route['file'];
require __DIR__ . '/inc/footer.php';
