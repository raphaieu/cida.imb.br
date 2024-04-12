<template>
  <div class="home">
    <imovel-carousel-destaque />
    <main id="main">
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <div class="title-single-box">
              <h1 class="title-single">Os melhores imóveis</h1>
              <span class="color-text-a">que acabaram de chegar...</span>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
      <div class="container">
        <div class="row">
          <imovel-card v-for="imovel in imoveis" :key="imovel.imovel_id" :imovel="imovel" />
        </div>
      </div>
    </section><!-- End Property Grid Single-->
    <section class="section-testimonials section-t8 nav-arrow-a">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="title-wrap d-flex justify-content-between">
                <div class="title-box">
                  <h2 class="title-a">Recomendações</h2>
                </div>
              </div>
            </div>
          </div>
          <div id="testimonial-carousel" class="swiper">
            <div class="swiper-wrapper">
              <div class="carousel-item-a swiper-slide">
                <div class="testimonials-box">
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <div class="testimonial-img">
                        <img src="assets/img/testimonial-1.jpg" alt="" class="img-fluid">
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="testimonial-ico">
                        <i class="bi bi-chat-quote-fill"></i>
                      </div>
                      <div class="testimonials-content">
                        <p class="testimonial-text">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium
                          debitis hic ber quibusdam
                          voluptatibus officia expedita corpori.
                        </p>
                      </div>
                      <div class="testimonial-author-box">
                        <img src="assets/img/mini-testimonial-1.jpg" alt="" class="testimonial-avatar">
                        <h5 class="testimonial-author">Albert & Erika</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- End carousel item -->
              <div class="carousel-item-a swiper-slide">
                <div class="testimonials-box">
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <div class="testimonial-img">
                        <img src="assets/img/testimonial-2.jpg" alt="" class="img-fluid">
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="testimonial-ico">
                        <i class="bi bi-chat-quote-fill"></i>
                      </div>
                      <div class="testimonials-content">
                        <p class="testimonial-text">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium
                          debitis hic ber quibusdam
                          voluptatibus officia expedita corpori.
                        </p>
                      </div>
                      <div class="testimonial-author-box">
                        <img src="assets/img/mini-testimonial-2.jpg" alt="" class="testimonial-avatar">
                        <h5 class="testimonial-author">Pablo & Emma</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="testimonial-carousel-pagination carousel-pagination"></div>
        </div>
      </section>
  </main><!-- End #main -->
  </div>
</template>

<script>
import ImovelCarouselDestaque from "~/components/ImovelCarouselDestaque.vue";
import ImovelCard from "~/components/ImovelCard.vue";

export default {
  name: 'IndexPage',
  components: {
    ImovelCarouselDestaque,
    ImovelCard
  },
  data() {
    return {
      imoveis: {}
    }
  },
  async asyncData({ params, $axios, error }) {
    return await $axios.get('imovel', {
      params: {
        destaque: false,
        limit: 6,
        order: 'imovel_id'
      }
    }).then(item => {
      if (item.data.length === 0) throw({ statusCode: 404, message: 'Imóvel not found'});
      return { imoveis: item.data };
    }).catch(e => {
      console.log(e);
      error(e);
    });
  },
  mounted () {
    new Swiper('#testimonial-carousel', {
      speed: 600,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      slidesPerView: 'auto',
      pagination: {
        el: '.testimonial-carousel-pagination',
        type: 'bullets',
        clickable: true
      }
    });
  }
}
</script>

<style scoped>
.home section.intro-single {
  padding-top: 2rem;
}
</style>