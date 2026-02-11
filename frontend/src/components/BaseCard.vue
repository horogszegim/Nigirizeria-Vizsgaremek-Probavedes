<script setup>
import { useCartStore } from '@stores/CartStore'

const cart = useCartStore()

defineProps({
    id: Number,
    name: String,
    price: Number,
    image: String,
    description: String
})
</script>

<template>
    <div class="bg-white border border-gray-200 flex flex-col rounded-lg overflow-hidden">
        <div class="relative bg-gray-300 aspect-[3/2]">
            <img :src="image" :alt="name" class="w-full h-full object-cover" />
        </div>

        <div class="p-4 flex flex-col gap-2">
            <h3 class="text-base font-medium">
                {{ name }}
            </h3>

            <p class="text-sm text-gray-700">
                {{ description }}
            </p>

            <div class="flex items-center justify-between mt-2">
                <span class="text-sm">
                    {{ price }} Ft
                </span>

                <button :id="'add-to-cart-' + id"
                    class="px-4 py-2 bg-salmon-dark text-white rounded-lg cursor-pointer transition-all duration-200 ease-out
                           hover:bg-salmon hover:scale-[1.05] active:scale-[0.95] active:bg-salmon-dark focus:outline-none"
                    @click="cart.addItem({ id, name, price })">
                    Kosárba
                </button>
            </div>
        </div>
    </div>
</template>
