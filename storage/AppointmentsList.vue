<script setup lang="ts">
import { ref, onMounted, computed } from 'vue'
import { useAppointmentsStore } from '../../stores/appointments'
import type { Appointment, AppointmentStatus } from '../../types'

const appointmentsStore = useAppointmentsStore()
const isLoading = ref(true)
const statusFilter = ref('all')
const dateFilter = ref('')

const statusColors = {
  pending: '#F59E0B',
  confirmed: '#10B981',
  cancelled: '#EF4444'
} as const

// Fonction pour traduire les statuts en français
function translateStatus(status: AppointmentStatus): string {
  const translations = {
    pending: 'En attente',
    confirmed: 'Confirmé',
    cancelled: 'Annulé'
  }
  return translations[status] || status
}

const filteredAppointments = computed(() => {
  let filtered = appointmentsStore.appointments

  if (statusFilter.value !== 'all') {
    filtered = filtered.filter(appointment => appointment.status === statusFilter.value)
  }

  if (dateFilter.value) {
    const filterDate = new Date(dateFilter.value)
    filtered = filtered.filter(appointment => {
      const appointmentDate = new Date(appointment.appointment_time)
      return appointmentDate.toDateString() === filterDate.toDateString()
    })
  }

  return filtered
})

async function updateAppointmentStatus(id: string, status: AppointmentStatus) {
  try {
    await appointmentsStore.updateAppointmentById(id, { status })
  } catch (error) {
    console.error(`Failed to update appointment status to ${status}:`, error)
  }
}

onMounted(async () => {
  try {
    await appointmentsStore.loadAppointments()
  } catch (error) {
    console.error('Failed to load appointments:', error)
  } finally {
    isLoading.value = false
  }
})
</script>

<template>
  <div>
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between">
      <h2 class="text-xl font-bold mb-4 sm:mb-0 text-primary-700">Liste des Rendez-vous</h2>
      
      <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3">
        <!-- Status filter -->
        <select 
          v-model="statusFilter"
          class="form-select bg-white text-gray-900"
        >
          <option value="all">Tous les statuts</option>
          <option value="pending">En attente</option>
          <option value="confirmed">Confirmé</option>
          <option value="cancelled">Annulé</option>
        </select>
        
        <!-- Date filter -->
        <input 
          type="date" 
          v-model="dateFilter"
          class="form-input bg-white text-gray-900"
          :min="new Date().toISOString().split('T')[0]"
        />
      </div>
    </div>
    
    <div v-if="isLoading" class="py-8 text-center">
      <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary-700 mx-auto"></div>
      <p class="mt-4 text-gray-600">Chargement des rendez-vous...</p>
    </div>
    
    <div v-else class="grid gap-4">
      <div v-for="appointment in filteredAppointments" :key="appointment.id" class="bg-white rounded-lg shadow p-4">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
          <div class="mb-4 sm:mb-0">
            <h3 class="text-lg font-semibold text-gray-900">{{ appointment.service_type?.name || 'Service non spécifié' }}</h3>
            <p class="text-gray-700">{{ new Date(appointment.appointment_time).toLocaleString('fr-FR', {
              day: '2-digit',
              month: '2-digit',
              year: 'numeric',
              hour: '2-digit',
              minute: '2-digit'
            }) }}</p>
            <p class="text-gray-700">{{ appointment.vehicle }}</p>
          </div>
          
          <div class="flex flex-col sm:items-end space-y-2">
            <div class="flex items-center space-x-2">
              <div class="w-3 h-3 rounded-full" :style="{ backgroundColor: statusColors[appointment.status] }"></div>
              <span class="text-sm text-gray-700">{{ translateStatus(appointment.status) }}</span>
            </div>
            
            <div class="flex space-x-2">
              <template v-if="appointment.status === 'pending'">
                <button 
                  @click="updateAppointmentStatus(appointment.id, 'confirmed')"
                  class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700"
                >
                  Confirmer
                </button>
              </template>
              
              <template v-if="appointment.status !== 'cancelled'">
                <button 
                  @click="updateAppointmentStatus(appointment.id, 'cancelled')"
                  class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
                >
                  Annuler
                </button>
              </template>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.form-select,
.form-input {
  @apply border border-gray-300 rounded-md shadow-sm;
}

.form-select:focus,
.form-input:focus {
  @apply ring-2 ring-primary-500 border-primary-500;
}

/* Style pour le sélecteur de date */
input[type="date"]::-webkit-calendar-picker-indicator {
  @apply text-gray-700;
}

input[type="date"]::-webkit-datetime-edit {
  @apply text-gray-700;
}

input[type="date"]::-webkit-datetime-edit-fields-wrapper {
  @apply text-gray-700;
}

input[type="date"]::-webkit-datetime-edit-text {
  @apply text-gray-700;
}

input[type="date"]::-webkit-datetime-edit-year-field,
input[type="date"]::-webkit-datetime-edit-month-field,
input[type="date"]::-webkit-datetime-edit-day-field {
  @apply text-gray-700;
}
</style>