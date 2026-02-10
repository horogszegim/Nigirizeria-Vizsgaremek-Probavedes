import { defineStore } from 'pinia'
import { ref } from 'vue'
import { api } from '@utils/http.mjs'

export const useEtlapStore = defineStore('etlap', () => {
    const pizzak = ref([])

    const getPizzak = async () => {
        const response = await api.get('api/pizzas')
        pizzak.value = response.data.data
    }

    return {
        pizzak,
        getPizzak
    }
})
