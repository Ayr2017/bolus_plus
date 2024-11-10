<template>
    <div class="d-flex gap-2">
        <button
            class="btn btn-outline-primary"
            @click="lastHour"
        >
            за последний час
        </button>
        <button
            class="btn btn-outline-primary"
            @click="last3Hours"
        >
            за последние 3 часа
        </button>
        <button
            class="btn btn-outline-primary"
            @click="resetFilters"
            :disabled="isResetDisabled"
        >
            Сбросить фильтры
        </button>
    </div>
    <Line :data="chartData" />
</template>

<script setup>
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
} from 'chart.js'

import { Line } from 'vue-chartjs'

ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
)

import { computed, ref } from 'vue'
import moment from 'moment'

const props = defineProps({
    dashboardData: {
        type: Array,
        default: []
    }
})
const isResetDisabled = ref(true)

const storeLabels =  ref(props.dashboardData.map(({ date }) => (moment(date))))
const dateLabels = ref(props.dashboardData.map(({ date }) => (moment(date))))

const temp = ref(props.dashboardData.map(({ UT } )=> UT))

const chartData = computed(() => ({
    labels: [...dateLabels.value.map((d) => d.format('DD.MM.YYYY HH:mm'))],
    datasets: [{
        data: [...temp.value]
    }]
}))

const lastHour = () => {
    const oneHourAgo = moment(storeLabels.value[storeLabels.value.length -1]).subtract(1, 'hour')
    dateLabels.value = storeLabels.value.filter(d => d.isAfter(oneHourAgo))

    isResetDisabled.value = false
}

const last3Hours = () => {
    const oneHourAgo = moment(storeLabels.value[storeLabels.value.length -1]).subtract(3, 'hour')
    dateLabels.value = storeLabels.value.filter(d => d.isAfter(oneHourAgo))

    isResetDisabled.value = false
}

const resetFilters = () => {
    dateLabels.value = storeLabels.value

    isResetDisabled.value = true
}

</script>
