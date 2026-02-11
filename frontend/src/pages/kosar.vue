<script setup>
import { ref } from 'vue'
import BaseLayout from '@/layouts/BaseLayout.vue'
import { useCartStore } from '@/stores/CartStore'
import { useOrderStore } from '@/stores/OrderStore'

const cartStore = useCartStore()
const orderStore = useOrderStore()

const loading = ref(false)
const showConfirmation = ref(false)

const formData = ref({
    name: '',
    email: '',
    address: ''
})

const orderedItems = ref([])
const orderedTotal = ref(0)

const handleSubmit = async () => {
    if (!cartStore.items.length) return

    loading.value = true

    const payload = {
        name: formData.value.name,
        email: formData.value.email,
        address: formData.value.address,
        status: 'pending',
        items: cartStore.items.map(item => ({
            pizza_id: item.id,
            quantity: item.quantity
        }))
    }

    try {
        orderedItems.value = [...cartStore.items]
        orderedTotal.value = cartStore.totalPrice

        await orderStore.createOrder(payload)

        cartStore.clear()
        showConfirmation.value = true
    } finally {
        loading.value = false
    }
}
</script>

<template>
    <BaseLayout>
        <div class="w-full flex justify-center">
            <div class="w-full max-w-6xl px-4 py-10 flex flex-col items-center">

                <h1 class="text-2xl font-medium text-center">
                    Kosár
                </h1>

                <div class="flex justify-center mt-3">
                    <span class="block w-12 h-1 bg-salmon-dark rounded-full"></span>
                </div>

                <p v-if="!showConfirmation" class="text-center text-sm text-gray-600 mt-2">
                    Ellenőrizze rendelését és adja meg adatait!
                </p>

                <p v-else class="text-center text-2xl text-green-600 font-semibold mt-4">
                    Rendelés sikeresen leadva
                </p>

                <div v-if="!showConfirmation" class="mt-10 w-full grid grid-cols-1 lg:grid-cols-3 gap-10">

                    <div class="lg:col-span-2 space-y-6">

                        <div v-for="item in cartStore.items" :key="item.id"
                            class="p-6 bg-white rounded-xl shadow-sm border border-gray-100 flex justify-between items-center">
                            <div>
                                <h2 class="text-lg font-semibold text-salmon-dark">
                                    {{ item.name }}
                                </h2>
                                <p class="text-sm text-gray-500">
                                    Mennyiség: {{ item.quantity }}
                                </p>
                            </div>

                            <div class="text-right">
                                <p class="font-semibold text-lg">
                                    {{ item.price * item.quantity }} Ft
                                </p>
                            </div>
                        </div>

                        <div v-if="cartStore.items.length" class="flex justify-end pt-4 border-t">
                            <p class="text-xl font-semibold">
                                Összesen: {{ cartStore.totalPrice }} Ft
                            </p>
                        </div>

                        <p v-if="!cartStore.items.length" class="text-center text-gray-500">
                            A kosár üres.
                        </p>

                    </div>

                    <div class="lg:col-span-1">

                        <FormKit type="form" :actions="false" @submit="handleSubmit" class="space-y-5">
                            <FormKit type="text" label="Név" v-model="formData.name" />

                            <FormKit type="email" label="Email" v-model="formData.email" />

                            <FormKit type="text" label="Szállítási cím" v-model="formData.address" />

                            <div class="flex justify-center pt-3">
                                <button type="submit"
                                    class="px-4 py-2 bg-salmon-dark text-white rounded-lg cursor-pointer transition-all duration-200 ease-out hover:bg-salmon hover:scale-105 active:scale-95"
                                    :disabled="loading || !cartStore.items.length">
                                    Rendelés leadása
                                </button>
                            </div>
                        </FormKit>

                    </div>

                </div>

                <div v-else class="mt-12 w-full max-w-3xl flex flex-col items-center space-y-10">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 text-center text-lg w-full">

                        <div>
                            <p class="text-gray-500 text-base">Név</p>
                            <p class="font-semibold text-salmon-dark text-xl">
                                {{ formData.name }}
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-base">Email</p>
                            <p class="font-semibold text-salmon-dark text-xl">
                                {{ formData.email }}
                            </p>
                        </div>

                        <div class="md:col-span-2">
                            <p class="text-gray-500 text-base">Szállítási cím</p>
                            <p class="font-semibold text-salmon-dark text-xl">
                                {{ formData.address }}
                            </p>
                        </div>

                    </div>

                    <div class="w-full space-y-6">

                        <div v-for="item in orderedItems" :key="item.id"
                            class="p-6 bg-white rounded-xl shadow-sm border border-gray-100 flex justify-between items-center">
                            <div>
                                <h2 class="text-lg font-semibold text-salmon-dark">
                                    {{ item.name }}
                                </h2>
                                <p class="text-sm text-gray-500">
                                    Mennyiség: {{ item.quantity }}
                                </p>
                            </div>

                            <div class="text-right">
                                <p class="font-semibold text-lg">
                                    {{ item.price * item.quantity }} Ft
                                </p>
                            </div>
                        </div>

                        <div class="flex justify-end pt-4 border-t">
                            <p class="text-xl font-semibold">
                                Összesen: {{ orderedTotal }} Ft
                            </p>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </BaseLayout>
</template>

<route lang="yaml">
name: kosar
meta:
  title: Kosár
</route>
