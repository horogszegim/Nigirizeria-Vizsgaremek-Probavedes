import { defineStore } from 'pinia'
import { ref } from 'vue'
import { api } from '@utils/http.mjs'

export const useOrderStore = defineStore('order', () => {
    const order = ref(null)

    const createOrder = async (payload) => {
        const response = await api.post('api/orders', payload)
        order.value = response.data.data
        return order.value
    }

    return {
        order,
        createOrder
    }
})
