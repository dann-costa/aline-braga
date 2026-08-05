/**
 * assets/js/main.js
 * JavaScript puro (sem dependências) para a landing page IA Produtiva.
 * Todas as consultas ao DOM são protegidas contra elementos ausentes.
 */

(function () {
  'use strict';

  var prefersReducedMotion = window.matchMedia
    ? window.matchMedia('(prefers-reduced-motion: reduce)').matches
    : false;

  /* ------------------------------------------------------------------ */
  /* 1. Rolagem suave para âncoras (com compensação do header fixo)      */
  /* ------------------------------------------------------------------ */
  function initSmoothScroll() {
    var header = document.getElementById('site-header');
    var headerOffset = header ? header.offsetHeight : 0;

    var anchors = document.querySelectorAll('a[href^="#"]');
    anchors.forEach(function (link) {
      link.addEventListener('click', function (event) {
        var targetId = link.getAttribute('href');
        if (!targetId || targetId === '#') return;

        var target = document.querySelector(targetId);
        if (!target) return;

        event.preventDefault();

        var top = target.getBoundingClientRect().top + window.pageYOffset - (headerOffset + 12);

        window.scrollTo({
          top: top,
          behavior: prefersReducedMotion ? 'auto' : 'smooth'
        });

        target.setAttribute('tabindex', '-1');
        target.focus({ preventScroll: true });
      });
    });
  }

  /* ------------------------------------------------------------------ */
  /* 2. Accordion do FAQ                                                  */
  /* ------------------------------------------------------------------ */
  function initFaqAccordion() {
    var triggers = document.querySelectorAll('.faq-trigger');
    if (!triggers.length) return;

    triggers.forEach(function (trigger) {
      trigger.addEventListener('click', function () {
        var expanded = trigger.getAttribute('aria-expanded') === 'true';
        var panelId = trigger.getAttribute('aria-controls');
        var panel = panelId ? document.getElementById(panelId) : null;
        var item = trigger.closest('.faq-item');

        if (!panel) return;

        if (expanded) {
          trigger.setAttribute('aria-expanded', 'false');
          panel.style.maxHeight = '0px';
          if (item) item.classList.remove('is-open');
        } else {
          trigger.setAttribute('aria-expanded', 'true');
          panel.style.maxHeight = panel.scrollHeight + 'px';
          if (item) item.classList.add('is-open');

          trackEvent('faq_open', { question: trigger.textContent.trim() });
        }
      });
    });

    // Recalcula o máximo de altura de painéis abertos ao redimensionar a janela.
    window.addEventListener('resize', function () {
      document.querySelectorAll('.faq-trigger[aria-expanded="true"]').forEach(function (trigger) {
        var panelId = trigger.getAttribute('aria-controls');
        var panel = panelId ? document.getElementById(panelId) : null;
        if (panel) panel.style.maxHeight = panel.scrollHeight + 'px';
      });
    });
  }

  /* ------------------------------------------------------------------ */
  /* 3. Header com comportamento discreto ao rolar                       */
  /* ------------------------------------------------------------------ */
  function initHeaderScrollBehavior() {
    var header = document.getElementById('site-header');
    if (!header) return;

    var lastScrollY = window.pageYOffset;
    var ticking = false;

    function onScroll() {
      var currentScrollY = window.pageYOffset;

      header.classList.toggle('is-scrolled', currentScrollY > 8);

      if (currentScrollY > lastScrollY && currentScrollY > header.offsetHeight * 2) {
        header.classList.add('is-hidden');
      } else {
        header.classList.remove('is-hidden');
      }

      lastScrollY = currentScrollY;
      ticking = false;
    }

    window.addEventListener('scroll', function () {
      if (!ticking) {
        window.requestAnimationFrame(onScroll);
        ticking = true;
      }
    });
  }

  /* ------------------------------------------------------------------ */
  /* 4 e 5. Barra de CTA fixa no mobile (some quando a oferta é visível)  */
  /* ------------------------------------------------------------------ */
  function initMobileCtaBar() {
    var bar = document.getElementById('mobile-cta-bar');
    var hero = document.querySelector('main #topo, main');
    var offerSection = document.getElementById('oferta');

    if (!bar || !window.IntersectionObserver) return;

    var heroPastThreshold = false;
    var offerVisible = false;

    function syncVisibility() {
      var shouldShow = heroPastThreshold && !offerVisible;
      bar.hidden = false;
      bar.classList.toggle('is-visible', shouldShow);
    }

    // Considera "passou do hero" quando o topo sai da tela.
    var heroSentinel = document.querySelector('main section'); // primeira seção (hero)
    if (heroSentinel) {
      var heroObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          heroPastThreshold = !entry.isIntersecting;
          syncVisibility();
        });
      }, { threshold: 0, rootMargin: '-64px 0px 0px 0px' });
      heroObserver.observe(heroSentinel);
    }

    if (offerSection) {
      var offerObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          offerVisible = entry.isIntersecting;
          syncVisibility();
          if (entry.isIntersecting) {
            trackEvent('offer_view', {});
          }
        });
      }, { threshold: 0.25 });
      offerObserver.observe(offerSection);
    }
  }

  /* ------------------------------------------------------------------ */
  /* 6. Eventos preparados para analytics                                 */
  /* ------------------------------------------------------------------ */
  function trackEvent(eventName, detail) {
    // Ponto único de integração com ferramentas de analytics.
    // Substituir pelo disparo real (Meta Pixel, GA4, etc.) quando configurado.
    // Exemplo: window.gtag && window.gtag('event', eventName, detail);
    try {
      window.dispatchEvent(new CustomEvent('ia-produtiva:' + eventName, { detail: detail }));
    } catch (err) {
      /* Ambientes sem suporte a CustomEvent simplesmente ignoram o disparo. */
    }
  }

  function initAnalyticsHooks() {
    document.querySelectorAll('[data-event]').forEach(function (el) {
      el.addEventListener('click', function () {
        trackEvent(el.getAttribute('data-event'), {
          location: el.getAttribute('data-event-location') || null
        });
      });
    });
  }

  /* ------------------------------------------------------------------ */
  /* 7. IntersectionObserver para animações leves de entrada              */
  /* ------------------------------------------------------------------ */
  function initRevealAnimations() {
    if (prefersReducedMotion || !window.IntersectionObserver) return;

    var targets = document.querySelectorAll(
      '.glass-card, .timeline-card'
    );
    if (!targets.length) return;

    targets.forEach(function (el) {
      el.setAttribute('data-animate', '');
    });

    var observer = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });

    targets.forEach(function (el) {
      observer.observe(el);
    });
  }

  /* ------------------------------------------------------------------ */
  /* Botão flutuante: voltar ao topo                                      */
  /* ------------------------------------------------------------------ */
  function initBackToTop() {
    var button = document.getElementById('back-to-top');
    if (!button) return;

    button.hidden = false;

    function toggleVisibility() {
      button.classList.toggle('is-visible', window.pageYOffset > 480);
    }

    window.addEventListener('scroll', toggleVisibility, { passive: true });
    toggleVisibility();

    button.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
    });
  }

  /* ------------------------------------------------------------------ */
  /* Ano atual no rodapé                                                  */
  /* ------------------------------------------------------------------ */
  function initCurrentYear() {
    var yearEl = document.getElementById('current-year');
    if (yearEl) yearEl.textContent = new Date().getFullYear();
  }

  /* ------------------------------------------------------------------ */
  /* Inicialização                                                        */
  /* ------------------------------------------------------------------ */
  function init() {
    initSmoothScroll();
    initFaqAccordion();
    initHeaderScrollBehavior();
    initMobileCtaBar();
    initAnalyticsHooks();
    initRevealAnimations();
    initBackToTop();
    initCurrentYear();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
