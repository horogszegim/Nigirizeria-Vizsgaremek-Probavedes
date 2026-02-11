<script setup>
import { ref, onMounted, computed } from 'vue'
import BaseLayout from '@/layouts/BaseLayout.vue'
import { useReservationStore } from '@/stores/ReservationStore'

const reservationStore = useReservationStore()

const showForm = ref(true)
const loading = ref(false)

const formData = ref({
    name: '',
    guest_count: '',
    date: '',
    start_time: '',
    end_time: ''
})

onMounted(async () => {
    await reservationStore.getTimeSlots()
})

const handleSubmit = async () => {
    loading.value = true

    const selectedSlots = reservationStore.timeSlots
        .filter(slot =>
            slot.start_time >= formData.value.start_time &&
            slot.end_time <= formData.value.end_time
        )
        .sort((a, b) => a.start_time.localeCompare(b.start_time))

    const payload = {
        name: formData.value.name,
        guest_count: Number(formData.value.guest_count),
        date: formData.value.date,
        time_slot_ids: selectedSlots.map(slot => slot.id)
    }

    try {
        const created = await reservationStore.createReservation(payload)
        await reservationStore.getReservation(created.id)
        showForm.value = false
    } finally {
        loading.value = false
    }
}

const handleDelete = async () => {
    if (!confirm('Biztosan törölni szeretné a foglalást?')) return

    await reservationStore.deleteReservation(
        reservationStore.reservation.id
    )

    showForm.value = true

    formData.value = {
        name: '',
        guest_count: '',
        date: '',
        start_time: '',
        end_time: ''
    }
}

const reservationTimeRange = computed(() => {
    if (!reservationStore.reservation?.time_slots?.length) return ''

    const slots = reservationStore.reservation.time_slots
    const start = slots[0].start_time.slice(0, 5)
    const end = slots[slots.length - 1].end_time.slice(0, 5)

    return `${start} - ${end}`
})
</script>

<template>
    <BaseLayout>
        <div class="w-full flex justify-center">
            <div class="w-full max-w-4xl px-4 py-10 flex flex-col justify-center">

                <h1 class="text-2xl font-medium text-center">
                    Asztalfoglalás
                </h1>

                <div class="flex justify-center mt-3">
                    <span class="block w-12 h-1 bg-salmon-dark rounded-full"></span>
                </div>

                <p v-if="showForm" class="text-center text-sm text-gray-600 mt-2">
                    Foglaljon asztalt pár lépésben!
                </p>

                <p v-else class="text-center text-xl md:text-2xl text-green-600 font-semibold mt-2">
                    Foglalás sikeresen rögzítve
                </p>

                <div class="mt-10">

                    <FormKit v-if="showForm" type="form" :actions="false" @submit="handleSubmit" class="space-y-6">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <FormKit type="text" label="Név" v-model="formData.name" />
                            <FormKit type="number" label="Vendégek száma" v-model="formData.guest_count" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <FormKit type="date" label="Dátum" v-model="formData.date" />
                            <FormKit type="time" label="Kezdési időpont" v-model="formData.start_time" />
                            <FormKit type="time" label="Befejezési időpont" v-model="formData.end_time" />
                        </div>

                        <div class="flex justify-center pt-5">
                            <button type="submit"
                                class="px-4 py-2 bg-salmon-dark text-white rounded-lg cursor-pointer transition-all duration-200 ease-out hover:bg-salmon hover:scale-105 active:scale-95 active:bg-salmon-dark focus:outline-none"
                                :disabled="loading">
                                Foglalás leadása
                            </button>
                        </div>

                    </FormKit>

                    <div v-else class="flex flex-col items-center space-y-10">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 text-center text-lg">
                            <div>
                                <p class="text-gray-500 text-base">Név</p>
                                <p class="font-semibold text-salmon-dark text-xl">
                                    {{ reservationStore.reservation.name }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-500 text-base">Vendégek száma</p>
                                <p class="font-semibold text-salmon-dark text-xl">
                                    {{ reservationStore.reservation.guest_count }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-500 text-base">Dátum</p>
                                <p class="font-semibold text-salmon-dark text-xl">
                                    {{ reservationStore.reservation.date }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-500 text-base">Időpont</p>
                                <p class="font-semibold text-salmon-dark text-xl">
                                    {{ reservationTimeRange }}
                                </p>
                            </div>
                        </div>

                        <button @click="handleDelete"
                            class="px-6 py-3 bg-red-600 text-white rounded-lg cursor-pointer transition-all duration-200 ease-out hover:bg-red-700 hover:scale-110 active:scale-95 shadow-md">
                            Foglalás törlése
                        </button>

                    </div>

                </div>
            </div>
        </div>
    </BaseLayout>
</template>

<route lang="yaml">
name: asztalfoglalas
meta:
  title: Asztalfoglalás
</route>
