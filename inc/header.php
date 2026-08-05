<?php
$pageTitle = $pageTitle ?? 'Dra. Aline Braga';
$pageDescription = $pageDescription ?? 'Nutrição clínica e esportiva em São José dos Campos para emagrecimento com comida de verdade.';
$robots = $robots ?? 'index, follow';
$canonicalUrl = $canonicalUrl ?? '[INSERIR URL FINAL]';
$logoHref = $logoHref ?? '/';
$ctaHref = $ctaHref ?? 'https://wa.me/5512996847645?text=Ol%C3%A1%2C%20Dra.%20Aline!%20Vi%20seu%20site%20e%20gostaria%20de%20saber%20como%20funciona%20o%20acompanhamento%20nutricional.';
?>
<!DOCTYPE html><html lang="pt-BR"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title><?= htmlspecialchars($pageTitle) ?> | Dra. Aline Braga</title>
<meta name="description" content="<?= htmlspecialchars($pageDescription) ?>"><meta name="robots" content="<?= htmlspecialchars($robots) ?>">
<link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>"><link rel="icon" href="/assets/images/favicon.svg">
<meta property="og:type" content="website"><meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?> | Dra. Aline Braga"><meta property="og:description" content="<?= htmlspecialchars($pageDescription) ?>"><meta property="og:image" content="/assets/images/aline-profile.webp"><meta property="og:locale" content="pt_BR">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/tailwind.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer">
<link rel="stylesheet" href="/assets/css/style.css">
<script type="application/ld+json">{"@context":"https://schema.org","@type":"MedicalBusiness","name":"Dra. Aline Braga - Nutricionista","telephone":"+55 12 99684-7645","address":{"@type":"PostalAddress","streetAddress":"R. Armando D'Oliveira Cobra, 50 - Sala 910","addressLocality":"São José dos Campos","addressRegion":"SP","postalCode":"12246-002","addressCountry":"BR"},"aggregateRating":{"@type":"AggregateRating","ratingValue":"5.0","reviewCount":"332"}}</script>
</head><body><a class="skip-link" href="#conteudo">Pular para o conteúdo</a>
<header id="site-header" class="site-header"><div class="container-page header-inner"><a href="<?= htmlspecialchars($logoHref) ?>" aria-label="Página inicial"><img src="/assets/images/logo-aline.svg" alt="Dra. Aline Braga - Nutricionista"></a><nav><a href="/#acompanhamento">Acompanhamento</a><a href="/#resultados">Resultados</a><a href="/#depoimentos">Depoimentos</a><a href="/#sobre">Sobre</a><a class="btn btn-small" href="<?= htmlspecialchars($ctaHref) ?>" target="_blank" rel="noopener">Agendar consulta</a></nav></div></header>
