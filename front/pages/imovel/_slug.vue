<template>
  <main id="main">
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <nuxt-link to="/">Home</nuxt-link>
                </li>
                <li class="breadcrumb-item">
                  <nuxt-link to="/todos-imoveis">Imóveis</nuxt-link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  {{ imovel.endereco.endereco_regiao }}
                </li>
              </ol>
            </nav>
            <div class="title-single-box">
              <h1 class="title-single">{{ imovel.imovel_titulo }}</h1>
              <span class="color-text-a">{{ enderecoFormatado }}</span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c">{{ imovel.imovel_preco.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' }) }}</h5>
                    </div>
                  </div>
                </div>
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">Detalhes</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                    <ul class="list">
                      <li class="d-flex justify-content-between" v-if="imovel.endereco.endereco_regiao">
                        <strong>Região:</strong>
                        <span>{{ imovel.endereco.endereco_regiao }}</span>
                      </li>
                      <li class="d-flex justify-content-between" v-if="imovel.tipo_imovel.tipo_descricao">
                        <strong>Tipo de Imóvel:</strong>
                        <span>{{ imovel.tipo_imovel.tipo_descricao }}</span>
                      </li>
                      <li class="d-flex justify-content-between" v-if="imovel.tipo_negocio.negocio_tipo">
                        <strong>Negócio:</strong>
                        <span>{{ imovel.tipo_negocio.negocio_tipo }}</span>
                      </li>
                      <li class="d-flex justify-content-between" v-if="imovel.imovel_area">
                        <strong>Área:</strong>
                        <span>{{ imovel.imovel_area }}</span>
                      </li>
                      <li class="d-flex justify-content-between" v-if="imovel.imovel_quarto">
                        <strong>Quartos:</strong>
                        <span>{{ imovel.imovel_quarto }}</span>
                      </li>
                      <li class="d-flex justify-content-between" v-if="imovel.imovel_banheiro">
                        <strong>Banheiro:</strong>
                        <span>{{ imovel.imovel_banheiro }}</span>
                      </li>
                      <li class="d-flex justify-content-between" v-if="imovel.imovel_vagas">
                        <strong>Garagem:</strong>
                        <span>{{ imovel.imovel_vagas }}</span>
                      </li>
                      <li class="d-flex justify-content-between" v-if="imovel.imovel_valor_iptu">
                        <strong>IPTU:</strong>
                        <span>{{ imovel.imovel_valor_iptu.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' }) }}</span>
                      </li>
                      <li class="d-flex justify-content-between" v-if="imovel.imovel_valor_cond">
                        <strong>Condomínio:</strong>
                        <span>{{ imovel.imovel_valor_cond.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' }) }}</span>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 justify-content-center">
                    <div id="property-single-carousel" class="swiper" v-if="imovel.imagens.length > 0">
                      <div class="swiper-wrapper">
                        <div class="carousel-item-b swiper-slide" v-for="img in imovel.imagens" :key="img.img_id">
                          <img :src="'http://localhost:8000/storage/images/' + img.img_nome" :alt="img.img_titulo" height="450">
                        </div>
                      </div>
                    </div>
                    <div class="property-single-carousel-pagination carousel-pagination"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="property-description">
                  <div class="description color-text-a no-margin" v-html="imovel.imovel_descricao"></div>
                </div>
                <div v-if="imovel.caracteristicas.length > 0">
                  <div class="row section-t3">
                    <div class="col-sm-12">
                      <div class="title-box-d">
                        <h3 class="title-d">Características do Imóvel</h3>
                      </div>
                    </div>
                  </div>
                  <div class="amenities-list color-text-a">
                    <ul class="list-a no-margin">
                      <li v-for="item in imovel.caracteristicas" :key="item.caracteristica.c_id">{{ item.caracteristica.c_nome }}</li>
                    </ul>
                  </div>
                </div>
                <div v-if="imovel.caracteristicas_edificio.length > 0">
                  <div class="row section-t3">
                    <div class="col-sm-12">
                      <div class="title-box-d">
                        <h3 class="title-d">Características do Condomínio</h3>
                      </div>
                    </div>
                  </div>
                  <div class="amenities-list color-text-a">
                    <ul class="list-a no-margin">
                      <li v-for="item in imovel.caracteristicas_edificio" :key="item.caracteristica.c_id">{{ item.caracteristica.c_nome }}</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-10 offset-md-1">
            <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-map-tab" data-bs-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map" aria-selected="false">Localização</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                <div id="maps" v-html="enderecoMapsAjustado"></div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">Se interessou?</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <div class="property-agent">
                  <h4 class="title-agent">Entre em contato!</h4>
                  <ul class="list-unstyled">
                    <li class="d-flex justify-content-between">
                      <strong>Celular / WhatsApp:</strong>
                      <span class="color-text-a">+55 71 99396-1674</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>E-mail:</strong>
                      <span class="color-text-a">contato@cida.imb.br</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Instagram:</strong>
                      <span class="color-text-a">@cidaimoveis</span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-12 col-lg-8">
                <div class="property-contact">
                  <form class="form-a">
                    <div class="row">
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Nome *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="E-mail *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <textarea id="textMessage" class="form-control" placeholder="Comentário *" name="message" cols="45" rows="8" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-a">Enviar</button>
                      </div>
                    </div>
                  </form>
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
  name: 'ImovelPage',
  data() {
    return {
      imovel: {
        imagens: []
      }
    }
  },
  head() {
    return {
      title: `${this.imovel.imovel_titulo} | Cida Imóveis`,
      meta: [{
        hid: 'description',
        name: 'description',
        content: this.imovel.imovel_descricao.replace(/(<([^>]+)>)/gi, "")
      }]
    }
  },
  async asyncData({ params, $axios, error }) {
    return await $axios.get('imovel', {
      params: {
        slug: params.slug
      }
    }).then(item => {
      if (item.data.length === 0) throw({ statusCode: 404, message: 'Imóvel not found'});
      return { imovel: item.data };
    }).catch(e => {
      console.log(e);
      error(e);
    });
  },
  mounted () {
    new Swiper('#property-single-carousel', {
      speed: 600,
      loop: true,
      spaceBetween: 100,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      pagination: {
        el: '.property-single-carousel-pagination',
        type: 'bullets',
        clickable: true
      }
    });
  },
  computed: {
    enderecoFormatado() {
      const endereco = this.imovel.endereco;
      const partes = [
        endereco.endereco_logradouro,
        endereco.endereco_bairro,
        endereco.endereco_municipio,
        endereco.endereco_uf,
        endereco.endereco_cep
      ].filter(Boolean);

      return partes.join(', ');
    },
    enderecoMapsAjustado() {
      const html = this.imovel.endereco.endereco_maps;
      if (!html) return '';
      // Usa uma expressão regular para substituir a largura
      return html.replace(/width="[^"]*"/i, 'width="100%"');
    }
  }
}
</script>
