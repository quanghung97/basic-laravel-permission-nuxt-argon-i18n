import path from 'path'
import fs from 'fs'
const pkg = require('./package')


module.exports = {
    server: {
        https: {
            key: fs.readFileSync(path.resolve(__dirname, 'server.key')),
            cert: fs.readFileSync(path.resolve(__dirname, 'server.crt'))
        }
    },
    mode: 'universal',

    /*
    ** Headers of the page
    */
    head: {
        title: pkg.name,
        meta: [
            { charset: 'utf-8' },
            { name: 'X-UA-Compatible', content: 'IE=edge' },
            { name: 'viewport', content: 'width=device-width, initial-scale=1.0, maximum-scale=1.5, user-scalable=1, shrink-to-fit=no' },
            { hid: 'description', name: 'description', content: pkg.description },
            { name: 'author', content: 'Quang Hung 97' }
        ],
        link: [
            { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
            { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' }
        ]
    },

    /*
    ** Customize the progress-bar color
    */
    loading: { color: '#fff' },

    transition: {
        name: 'fade',
        mode: 'out-in',
        duration: 250
    },

    /*
    ** Global CSS
    */
    css: [
        '~assets/argon/vendor/nucleo/css/nucleo.css',
        '~assets/argon/vendor/font-awesome/css/font-awesome.css',
        '~assets/argon/scss/argon.scss',
        'bootstrap-vue/dist/bootstrap-vue.css'
    ],

    router: {
      middleware: 'i18n'
    },
    /*
    ** Plugins to load before mounting the App
    */
    plugins: [
        '~/plugins/argon/argon-kit',
        '~/plugins/i18n.js'
    ],
    generate: {
      routes: ['/', '/wedding-service', '/outside-wedding-service', '/en', '/en/wedding-service', '/en/outside-wedding-service']
    },
    /*
    ** Nuxt.js modules
    */
    modules: [
        // Doc: https://axios.nuxtjs.org/usage
        '@nuxtjs/axios',
        // Doc: https://bootstrap-vue.js.org/docs/
        [
            'bootstrap-vue/nuxt',
            {
                css: false
            }
        ],
        '@nuxtjs/pwa'
    ],
    /*
    ** Axios module configuration
    */
    axios: {
        // See https://github.com/nuxt-community/axios-module#options
    },

    /*
    ** Build configuration
    */
    build: {
        /*
        ** You can extend webpack config here
        */
       extend(config, ctx) {
        // Run ESLint on save
        if (ctx.isDev && ctx.isClient) {
          config.module.rules.push({
            enforce: 'pre',
            test: /\.(js|vue)$/,
            loader: 'eslint-loader',
            exclude: /(node_modules)/
          })
        }
      }
    }
}
