<template>
  <app-layout title="Configurações">
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Bem vindo(a), {{ $page.props.user.name }}!
      </h2>
    </template>
    <div v-if="$page.props.flash.message" class="px-4 py-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-b shadow-md" role="alert">
      <div class="flex">
        <div class="py-1"><svg class="w-6 h-6 mr-4 text-teal-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
        <div>
          <p class="font-bold">Show!</p>
          <p class="text-sm">{{ $page.props.flash.message }}</p>
        </div>
      </div>
    </div>
    <div v-if="$page.props.flash.error" class="px-4 py-3 text-red-900 bg-red-100 border-t-4 border-red-500 rounded-b shadow-md" role="alert">
      <div class="flex">
        <div class="py-1"><svg class="w-6 h-6 mr-4 text-red-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
        <div>
          <p class="font-bold">Shhh...</p>
          <p class="text-sm">{{ $page.props.flash.error }}</p>
        </div>
      </div>
    </div>
    <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
          <div class="mt-8 text-2xl">
            Configurações Básicas para o Cadastro de Imóveis
          </div>
          <div class="mt-6 text-gray-500">
            Aqui você encontrará como adicionar ou excluir características globais para a maioria dos imóveis e também definir os tipos de negócio, tipo de imóvel, características do edifício...
          </div>
        </div>
        <div class="grid grid-cols-1 bg-gray-200 bg-opacity-25 md:grid-cols-2">
          <div class="p-6">
            <div class="flex items-center">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
              </svg>
              <div class="ml-4 text-lg font-semibold leading-7 text-gray-600">
                Negócio
              </div>
            </div>
            <div class="ml-12">
              <div class="mt-2 text-sm text-gray-500">
                O tipo de negócio que o potencial cliente está procurando, se trata em se o imóvel cadastrado é do tipo:<br/>
                - Compra, Lançamento, Aluguel, Arrendar, Anunciar / Vender
              </div>
              <Link :href="route('negocio.index')" class="flex items-center mt-3 text-sm font-semibold text-indigo-700">
                  <div>Gerenciar</div>
                  <div class="ml-1 text-indigo-500">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                      <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                  </div>
              </Link>
            </div>
          </div>
          <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
            <div class="flex items-center">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
              <div class="ml-4 text-lg font-semibold leading-7 text-gray-600">
                Características
              </div>
            </div>
            <div class="ml-12">
              <div class="mt-2 text-sm text-gray-500">
                Aqui é onde você irá gerenciar as características do imóvel ou do edifício. <br/>
                Ex.: Piscina, Churrasqueira, Playground, ...
              </div>
              <Link :href="route('caracteristicas.index')" class="flex items-center mt-3 text-sm font-semibold text-indigo-700">
                  <div>Gerenciar</div>
                  <div class="ml-1 text-indigo-500">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                      <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                  </div>
              </Link>
            </div>
          </div>
          <div class="p-6 border-t border-gray-200">
            <div class="flex items-center">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
              </svg>
              <div class="ml-4 text-lg font-semibold leading-7 text-gray-600">
                Perfil (dados complementares)
              </div>
            </div>
            <div class="ml-12">
              <div class="mt-2 text-sm text-gray-500">
                Completar os dados do seu perfil de corretor, tais como: CRECI, telefones para contato, biografia, foto...
              </div>
              <Link :href="route('corretor.index')" class="flex items-center mt-3 text-sm font-semibold text-indigo-700">
                  <div>Gerenciar</div>
                  <div class="ml-1 text-indigo-500">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                      <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                  </div>
              </Link>
            </div>
          </div>
          <div class="p-6 border-t border-gray-200 md:border-l">
            <div class="flex items-center">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                <path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
              </svg>
              <div class="ml-4 text-lg font-semibold leading-7 text-gray-600">
                Imagens
              </div>
            </div>
            <div class="ml-12">
              <div class="mt-2 text-sm text-gray-500">
                Neste módulo você visualizará todas as images cadastradas de todos os Imóveis no sistema.
              </div>
              <Link :href="route('imagem.index')" class="flex items-center mt-3 text-sm font-semibold text-indigo-700">
                  <div>Gerenciar</div>
                  <div class="ml-1 text-indigo-500">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                      <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                  </div>
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
  props: [],
  components: {
    AppLayout,
    Link
  }
});
</script>
