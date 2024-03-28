// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },

  modules: [
    '@nuxtjs/tailwindcss'
  ],
  

  app: {
    head: {
      title:'Admin porto',
      meta:[
        {charset: 'utf-8'},
        {name: 'viewport',content:'width=device-width, initial-scale=1'},
        {hid: 'description',name:'description',content:'Crude app nuxt'},
        {name:'form-detection',content:'telephone-no'}
      ],
      link:[
        {
          rel: 'stylesheet',
          href: 'https://fonts.googleapis.com/css2?family=Roboto&display=swap',
        },
        {
          rel:'icon',
          type:'image/x-icon',
          href:'/favicon.ico'
        },
      ],
      script:[


      ]
    }
  },

  
})
