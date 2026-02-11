import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { router } from '@/router/index.js'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
import { plugin, defaultConfig } from '@formkit/vue'
import { hu } from '@formkit/i18n'

import App from '@/App.vue'

import '@assets/main.css'

createApp(App)
  .use(createPinia().use(piniaPluginPersistedstate))
  .use(router)
  .use(
    plugin,
    defaultConfig({
      locales: { hu },
      locale: 'hu',
      config: {
        classes: {
          form: 'space-y-6',
          label: 'block text-sm font-medium text-gray-700 mb-1',
          input: 'w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-salmon-dark',
          messages: 'text-red-500 text-sm mt-1'
        }
      }
    })
  )
  .mount('#app')
