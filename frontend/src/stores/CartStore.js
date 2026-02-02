import { defineStore } from 'pinia'
import { ref, computed, watch } from 'vue'

export const useCartStore = defineStore('cart', () => {
    const items = ref(
        JSON.parse(localStorage.getItem('cart')) || []
    )

    const itemCount = computed(() =>
        items.value.reduce((sum, item) => sum + item.quantity, 0)
    )

    const totalPrice = computed(() =>
        items.value.reduce(
            (sum, item) => sum + item.price * item.quantity,
            0
        )
    )

    function addItem(product) {
        const existing = items.value.find(i => i.id === product.id)

        if (existing) {
            existing.quantity++
        } else {
            items.value.push({ ...product, quantity: 1 })
        }
    }

    function removeItem(id) {
        items.value = items.value.filter(i => i.id !== id)
    }

    function increase(id) {
        const item = items.value.find(i => i.id === id)
        if (item) item.quantity++
    }

    function decrease(id) {
        const item = items.value.find(i => i.id === id)
        if (!item) return

        if (item.quantity === 1) {
            removeItem(id)
        } else {
            item.quantity--
        }
    }

    function clear() {
        items.value = []
    }

    watch(
        items,
        (val) => {
            localStorage.setItem('cart', JSON.stringify(val))
        },
        { deep: true }
    )

    return {
        items,
        itemCount,
        totalPrice,
        addItem,
        removeItem,
        increase,
        decrease,
        clear
    }
})
