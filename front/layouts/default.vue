<template>
  <div>
    <div class="click-closed"></div>
    <div class="box-collapse">
      <div class="title-box-d">
        <h3 class="title-d">Busca Avançada</h3>
      </div>
      <span class="close-box-collapse right-boxed bi bi-x"></span>
      <div class="box-collapse-wrap form">
        <form class="form-a" method="get" action="/busca/">
          <div class="row">
            <div class="col-md-12 mb-2">
              <div class="form-group">
                <label class="pb-2" for="Type">Palavra-chave</label>
                <input name="k" type="text" class="form-control form-control-lg form-control-a" placeholder="Ex.: Casa em Salvador">
              </div>
            </div>
            <div class="col-md-6 mb-2">
              <div class="form-group mt-3">
                <label class="pb-2" for="Type">Negócio</label>
                <select name="n" class="form-control form-select form-control-a" id="Type">
                  <option value="0">Todo os tipos</option>
                  <option value="1">Para Alugar</option>
                  <option value="2">Para Comprar</option>
                  <option value="3">Lançamento</option>
                  <option value="4">Arrendamento</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 mb-2">
              <div class="form-group mt-3">
                <label class="pb-2" for="price">Tipo Imóvel</label>
                <select name="i" class="form-control form-select form-control-a" id="price">
                  <option value="0">Tanto faz</option>
                  <option value="1">Casa</option>
                  <option value="2">Apartamento</option>
                  <option value="3">Terreno</option>
                  <option value="4">Sala</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 mb-2">
              <div class="form-group mt-3">
                <label class="pb-2" for="city">Região</label>
                <select name="r" class="form-control form-select form-control-a" id="city">
                  <option value="0">Em toda Salvador</option>
                  <option value="1">Itapuã</option>
                  <option value="2">Piatã</option>
                  <option value="3">Lauro de Freitas</option>
                  <option value="4">Pituaçu</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 mb-2">
              <div class="form-group mt-3">
                <label class="pb-2" for="bedrooms">Quartos</label>
                <select name="q" class="form-control form-select form-control-a" id="bedrooms">
                  <option value="0">Tanto faz</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03 ou mais</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 mb-2">
              <div class="form-group mt-3">
                <label class="pb-2" for="garages">Garagem</label>
                <select name="g" class="form-control form-select form-control-a" id="garages">
                  <option value="0">Tanto faz</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03 ou mais</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 mb-2">
              <div class="form-group mt-3">
                <label class="pb-2" for="bathrooms">Banheiros</label>
                <select name="b" class="form-control form-select form-control-a" id="bathrooms">
                  <option value="0">Tanto faz</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03 ou mais</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-b">Encontrar meu Imóvel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
      <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <nuxt-link class="navbar-brand text-brand" to="/">Cida<span class="color-b">Imóveis</span></nuxt-link>
        <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
          <ul class="navbar-nav">
            <li class="nav-item">
              <nuxt-link class="nav-link" to="/"  exact-active-class="active">Home</nuxt-link>
            </li>
            <li class="nav-item">
              <nuxt-link class="nav-link" to="/sobre"  exact-active-class="active">Sobre</nuxt-link>
            </li>
            <li class="nav-item">
              <nuxt-link class="nav-link" to="/todos-imoveis" :class="{'active': isImovelInterna }" exact-active-class="active">Imóveis</nuxt-link>
            </li>
            <li class="nav-item">
              <nuxt-link class="nav-link" to="/contato" exact-active-class="active">Contato</nuxt-link>
            </li>
          </ul>
        </div>
        <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
          <i class="bi bi-search"></i>
        </button>
      </div>
    </nav>
    <nuxt/>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="socials-a">
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a href="//www.facebook.com/cidamartins" target="_blank">
                    <i class="bi bi-facebook" aria-hidden="true"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="//www.instagram.com/cidaimoveis/" target="_blank">
                    <i class="bi bi-instagram" aria-hidden="true"></i>
                  </a>
                </li>
              </ul>
            </div>
            <nav class="nav-footer">
              <ul class="list-inline">
                <li class="list-inline-item">
                  <nuxt-link to="/">Home</nuxt-link>
                </li>
                <li class="list-inline-item">
                  <nuxt-link to="/sobre">Sobre</nuxt-link>
                </li>
                <li class="list-inline-item">
                  <nuxt-link to="/todos-imoveis">Imóveis</nuxt-link>
                </li>
                <li class="list-inline-item">
                  <nuxt-link to="/contato">Contato</nuxt-link>
                </li>
              </ul>
            </nav>
            <div class="copyright-footer">
              <p class="copyright color-text-a">
                <span class="color-a">Cida Imóveis - CRECI 12.489</span><br/>
                &copy; Copyright 2023 - Todos os Direitos Reservados.
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer><!-- End  Footer -->
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  </div>
</template>
<script>
export default {
  name: 'LayoutBase',
  mounted () {
    (function() {
      "use strict";
      const select = (el, all = false) => {
        el = el.trim()
        if (all) {
          return [...document.querySelectorAll(el)]
        } else {
          return document.querySelector(el)
        }
      }
      const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all)
        if (selectEl) {
          if (all) {
            selectEl.forEach(e => e.addEventListener(type, listener))
          } else {
            selectEl.addEventListener(type, listener)
          }
        }
      }
      const onscroll = (el, listener) => {
        el.addEventListener('scroll', listener)
      }

      let selectHNavbar = select('.navbar-default')
      if (selectHNavbar) {
        onscroll(document, () => {
          if (window.scrollY > 100) {
            selectHNavbar.classList.add('navbar-reduce')
            selectHNavbar.classList.remove('navbar-trans')
          } else {
            selectHNavbar.classList.remove('navbar-reduce')
            selectHNavbar.classList.add('navbar-trans')
          }
        })
      }

      let backtotop = select('.back-to-top')
      if (backtotop) {
        const toggleBacktotop = () => {
          if (window.scrollY > 100) {
            backtotop.classList.add('active')
          } else {
            backtotop.classList.remove('active')
          }
        }
        window.addEventListener('load', toggleBacktotop)
        onscroll(document, toggleBacktotop)
      }

      let preloader = select('#preloader');
      if (preloader) {
        window.addEventListener('load', () => {
          preloader.remove()
        });
      }

      let body = select('body');
      on('click', '.navbar-toggle-box', function(e) {
        e.preventDefault()
        body.classList.add('box-collapse-open')
        body.classList.remove('box-collapse-closed')
      })

      on('click', '.close-box-collapse', function(e) {
        e.preventDefault()
        body.classList.remove('box-collapse-open')
        body.classList.add('box-collapse-closed')
      })
    })()
  },
  computed: {
    isImovelInterna: function() {
        return this.$nuxt.$route.path.indexOf('imovel/') > 0;
    }
  }
}
</script>
