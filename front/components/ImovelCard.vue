<template>
    <div class="col-md-4">
        <div class="card-box-a card-shadow">
        <div class="img-box-a">
            <img v-if="imovel.imagens.length" :src="'http://localhost:8000/storage/images/' + imovel.imagens[0].img_nome" alt="" class="img-a img-fluid" />
            <img v-else src="http://localhost:8000/storage/sem-imagem.png" alt="" class="img-a img-fluid" />
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
                    <span class="price-a">{{ imovel.tipo_negocio.negocio_tipo }} | {{ imovel.imovel_preco.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) }}</span>
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
    </div>
</template>

<script>
export default {
  name: 'ImovelCard',
  props: {
    imovel: Object
  }
}
</script>