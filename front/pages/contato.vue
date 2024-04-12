<template>
  <main id="main">
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Entre em contato</h1>
              <span class="color-text-a">Está com alguma dúvida? Quer anunciar algum imóvel com a gente? Ou até mesmo mandar um depoimento... enfim... sinta-se a vontade para deixar o registro do seu contato.</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Contato
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <section class="contact">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-md-7">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input type="text" name="nome" class="form-control form-control-lg form-control-a" placeholder="Seu nome" required>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="Seu melhor e-mail" required>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="text" name="assunto" class="form-control form-control-lg form-control-a" placeholder="Assunto" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea class="form-control" name="mensagem" cols="45" rows="8" placeholder="Mensagem" required></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 my-3">
                      <div class="mb-3">
                        <div class="loading">Enviando...</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Sua mensagem foi enviada. Obrigado!</div>
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-a">Enviar Mensagem</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-5 section-md-t3">
                <div class="icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="bi bi-envelope"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Dê um Alô!</h4>
                    </div>
                    <div class="icon-box-content">
                      <p class="mb-1">E-mail:
                        <span class="color-a"><a href="mailto:contato@cida.imb.br">contato@cida.imb.br</a></span>
                      </p>
                      <p class="mb-1">Whatsapp:
                        <span class="color-a"><a href="//wa.me/+5571993961674">+55 71 99396-1674</a></span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="bi bi-geo-alt"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Nos encontre em</h4>
                    </div>
                    <div class="icon-box-content">
                      <p class="mb-1">
                        Itapuã, Salvador
                        <br>Bahia
                      </p>
                    </div>
                  </div>
                </div>
                <div class="icon-box">
                  <div class="icon-box-icon">
                    <span class="bi bi-share"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Ou nas redes sociais...</h4>
                    </div>
                    <div class="icon-box-content">
                      <div class="socials-footer">
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <a href="//www.facebook.com/cidamartins" target="_blank" class="link-one">
                              <i class="bi bi-facebook" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="//www.instagram.com/cidaimoveis/" target="_blank" class="link-one">
                              <i class="bi bi-instagram" aria-hidden="true"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
export default {
  name: 'ContatoPage',
  mounted () {
  }
}
</script>
