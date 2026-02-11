<script setup>
import { onMounted } from 'vue'
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseCard from '@components/BaseCard.vue'
import { useEtlapStore } from '@stores/EtlapStore'

const etlapStore = useEtlapStore()

onMounted(() => {
    etlapStore.getPizzak()
})
</script>

<template>
    <BaseLayout>
        <div class="max-w-6xl mx-auto px-4 py-10">
            <h1 class="text-2xl font-medium text-center">
                Étlapunk
            </h1>

            <div class="flex justify-center mt-3">
                <span class="block w-12 h-1 bg-salmon-dark rounded-full"></span>
            </div>

            <p class="text-center text-sm text-gray-600 mt-2">
                Válasszon kedvenc pizzái közül!
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
                <BaseCard
                    v-for="pizza in etlapStore.pizzak"
                    :key="pizza.id"
                    :name="pizza.name"
                    :price="pizza.price"
                    :image="pizza.image_url"
                    :description="pizza.description"
                />
            </div>
        </div>
    </BaseLayout>
</template>

<route lang="yaml">
name: etlap
meta:
  title: Étlap
</route>
