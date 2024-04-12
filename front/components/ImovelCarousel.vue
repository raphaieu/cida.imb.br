<template>
  <div>
    <div id="property-carousel" class="swiper">
      <div class="swiper-wrapper">
        <div class="carousel-item-b swiper-slide" v-for="imovel in imoveis" :key="imovel.imovel_id">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="assets/img/property-6.jpg" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <nuxt-link :to="{ path: 'imovel/' + imovel.imovel_slug }">{{ imovel.imovel_titulo }}</nuxt-link>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">{{ imovel.negocio_tipo }} | {{ imovel.imovel_preco.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) }}</span>
                  </div>
                  <nuxt-link :to="{ path: 'imovel/' + imovel.imovel_slug }" class="link-a">Visualizar <span class="bi bi-chevron-right"></span></nuxt-link>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Área</h4>
                      <span v-if="imovel.imovel_area">{{ imovel.imovel_area }}</span>
                      <span v-else> - </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Quartos</h4>
                      <span v-if="imovel.imovel_quarto">{{ imovel.imovel_quarto }}</span>
                      <span v-else> - </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Condomínio</h4>
                      <span v-if="imovel.imovel_valor_cond">{{ imovel.imovel_valor_cond.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) }}</span>
                      <span v-else> - </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Garagem</h4>
                      <span v-if="imovel.imovel_vagas">{{ imovel.imovel_vagas }}</span>
                      <span v-else> - </span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End carousel item -->
      </div>
    </div>
    <div class="propery-carousel-pagination carousel-pagination"></div>
  </div>
</template>

<script>

export default {
  name: "ImovelCarousel",
  props: {
    limit: Number
  },
  data() {
    return {
      imoveis: []
    }
  },
  async mounted() {
    this.imoveis = await this.$axios.$get(`imovel?destaque=false&limit=${this.limit}&order=imovel_id`);

    /**
     * Property carousel
     */
    new Swiper('#property-carousel', {
      speed: 600,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      slidesPerView: 'auto',
      pagination: {
        el: '.propery-carousel-pagination',
        type: 'bullets',
        clickable: true
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 20
        },
        1200: {
          slidesPerView: 3,
          spaceBetween: 20
        }
      }
    });
  }
}
</script>
