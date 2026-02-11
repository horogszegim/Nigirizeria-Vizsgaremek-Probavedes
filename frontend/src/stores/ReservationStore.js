import { defineStore } from 'pinia'
import { ref } from 'vue'
import { api } from '@utils/http.mjs'

export const useReservationStore = defineStore('reservation', () => {
    const reservation = ref(null)
    const timeSlots = ref([])

    const getTimeSlots = async () => {
        const response = await api.get('api/time-slots')
        timeSlots.value = response.data.data
    }

    const createReservation = async (payload) => {
        const response = await api.post('api/reservations', payload)
        reservation.value = response.data.data
        return reservation.value
    }

    const getReservation = async (id) => {
        const response = await api.get(`api/reservations/${id}`)
        reservation.value = response.data.data
        return reservation.value
    }

    const deleteReservation = async (id) => {
        await api.delete(`api/reservations/${id}`)
        reservation.value = null
    }

    return {
        reservation,
        timeSlots,
        getTimeSlots,
        createReservation,
        getReservation,
        deleteReservation
    }
})
