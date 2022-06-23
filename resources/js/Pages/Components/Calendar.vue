<template>
    <div>
        <full-calendar :options="calendarOptions"></full-calendar>
    </div>
</template>

<script>
import FullCalendar from "@fullcalendar/vue3";
import dayGrid from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import timeGrid from "@fullcalendar/timegrid";

export default {
    name: "Calendar",

    components: {
        FullCalendar,
    },

    data() {
        return {
            calendarOptions: {
                //Plguins do Full Calendar

                plugins: [dayGrid, interactionPlugin, timeGrid],
                // Ver Mês
                //  initialView: 'dayGridMonth',

                //  Ver Semana
                 initialView: 'timeGridWeek',

                //Configuração do Header Calendar 
                headerToolbar: {
                    left: "prev,next,today",
                    center: "title",
                    right: "dayGridMonth, timeGridWeek, timeGridDay",
                },

                //Altura do Calendar
                height: "auto",

                //Horário Inicial e Final 
                slotMinTime: '12:00:00',
                slotMaxTime: '20:00:00',

                //Remove a permisão de marcar a qq hora "allday"
                allDaySlot: false,

                //Capturando Click no Calendar
                dateClick: this.handleDateClick,
            },
        };
    },
    methods: {
        handleDateClick(clickInfo){
            // console.log(clickInfo)

            //Emitindo para toda APP o evento 'dateClick'
            //Estarei chamando no compomente Pai Books.vue, usando para abrir Modal
            this.$emit('dateClick', clickInfo)
        }
    }
};
</script>

<style lang="scss" scoped></style>
