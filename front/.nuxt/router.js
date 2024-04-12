import Vue from 'vue'
import Router from 'vue-router'
import { normalizeURL, decode } from 'ufo'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _acc937a0 = () => interopDefault(import('../pages/contato.vue' /* webpackChunkName: "pages/contato" */))
const _0bdf643f = () => interopDefault(import('../pages/sobre.vue' /* webpackChunkName: "pages/sobre" */))
const _6a4ea40a = () => interopDefault(import('../pages/todos-imoveis.vue' /* webpackChunkName: "pages/todos-imoveis" */))
const _2dfb1658 = () => interopDefault(import('../pages/index.vue' /* webpackChunkName: "pages/index" */))
const _3ce86a1c = () => interopDefault(import('../pages/busca/_search.vue' /* webpackChunkName: "pages/busca/_search" */))
const _3e15fb97 = () => interopDefault(import('../pages/imovel/_slug.vue' /* webpackChunkName: "pages/imovel/_slug" */))

const emptyFn = () => {}

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: '/',
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/contato",
    component: _acc937a0,
    name: "contato"
  }, {
    path: "/sobre",
    component: _0bdf643f,
    name: "sobre"
  }, {
    path: "/todos-imoveis",
    component: _6a4ea40a,
    name: "todos-imoveis"
  }, {
    path: "/",
    component: _2dfb1658,
    name: "index"
  }, {
    path: "/busca/:search?",
    component: _3ce86a1c,
    name: "busca-search"
  }, {
    path: "/imovel/:slug?",
    component: _3e15fb97,
    name: "imovel-slug"
  }],

  fallback: false
}

export function createRouter (ssrContext, config) {
  const base = (config._app && config._app.basePath) || routerOptions.base
  const router = new Router({ ...routerOptions, base  })

  // TODO: remove in Nuxt 3
  const originalPush = router.push
  router.push = function push (location, onComplete = emptyFn, onAbort) {
    return originalPush.call(this, location, onComplete, onAbort)
  }

  const resolve = router.resolve.bind(router)
  router.resolve = (to, current, append) => {
    if (typeof to === 'string') {
      to = normalizeURL(to)
    }
    return resolve(to, current, append)
  }

  return router
}
