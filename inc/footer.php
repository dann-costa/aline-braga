<?php $showMobileCtaBar = $showMobileCtaBar ?? false; ?>
<footer class="footer">
  <div class="container-page footer-grid">
    <div>
      <img src="/assets/images/logo-aline.svg" alt="Dra. Aline Braga">
      <p>Nutrição clínica e esportiva com comida de verdade.</p>
    </div>
    <div>
      <strong>Contato</strong>
      <a href="tel:+5512988406870"><i class="fa-solid fa-phone" aria-hidden="true"></i> (12) 98840-6870</a>
      <a href="https://www.instagram.com/alinebraga" target="_blank" rel="noopener"><i class="fa-brands fa-instagram" aria-hidden="true"></i> @alinebraga</a>
    </div>
    <div>
      <strong>Informações</strong>
      <a href="/termos-de-uso"><i class="fa-solid fa-file-contract" aria-hidden="true"></i> Termos de Uso</a>
      <a href="/politica-de-privacidade"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i> Política de Privacidade</a>
    </div>
  </div>
  <div class="container-page footer-bottom">
    <span>
      © <span id="current-year"><?= date('Y') ?></span> Dra. Aline Braga. Todos os direitos reservados.
    </span>

    <span>
      Desenvolvido por<a
        href="https://dcwebsolutions.com.br"
        target="_blank"
        rel="noopener"
        class="font-semibold transition-opacity hover:opacity-70">
        DC WebSolutions.
      </a>
    </span>
  </div>
</footer>

<a class="whatsapp-float" href="https://wa.me/5512988406870?text=Ol%C3%A1%2C%20Dra.%20Aline!%20Vi%20seu%20site%20e%20gostaria%20de%20agendar%20uma%20consulta." target="_blank" rel="noopener" aria-label="Falar com a Dra. Aline pelo WhatsApp" title="Falar pelo WhatsApp">
  <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
</a>

<?php if ($showMobileCtaBar): ?>
  <div id="mobile-cta-bar" class="mobile-bar">
    <span>Agende sua consulta</span>
    <a href="https://wa.me/5512988406870?text=Ol%C3%A1%2C%20Dra.%20Aline!%20Quero%20agendar%20uma%20consulta." target="_blank" rel="noopener">Falar no WhatsApp</a>
  </div>
<?php endif; ?>

<button id="back-to-top" class="back-top" type="button" aria-label="Voltar ao topo">
  <svg viewBox="0 0 24 24" aria-hidden="true">
    <path d="m6 15 6-6 6 6" />
  </svg>
</button>
<script src="/assets/js/main.js"></script>
</body>

</html>