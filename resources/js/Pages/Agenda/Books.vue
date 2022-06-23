<template>
    <div>
        <app-layout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Calendário
                </h2>
                <!-- <span>{{ $page.user }}</span> -->
                <div
                    class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                    role="alert"
                    v-if="showAlert"
                >

                </div>
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ $page.flash.success }}</p>
                    </div>
                </div>
            </template>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div
                        class="bg-white overflow-hidden shadow-xl sm:rounded-lg"
                    >
                        <calendar @dateClick="dateClick"></calendar>
                    </div>
                </div>
            </div>
            <modal-calendar
                v-if="showModal"
                :form="newEvent"
                @closeModal="closeModal"
                @saveAppt="saveAppt"
            ></modal-calendar>
        </app-layout>
    </div>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import Calendar from "../Components/Calendar.vue";
import ModalCalendar from "../Components/Modals/CalendarModal.vue";
import formatTime from "../Mixins/transformTime";
import { Inertia } from "@inertiajs/inertia";

export default {
    name: "Books",

    components: {
        Calendar,
        AppLayout,
        ModalCalendar,
    },

    data() {
        return {
            showModal: false,
            newEvent: {
                title: "",
                date_at: "",
                hour: "",
                user_id: "1",
                session: "1800",
            },
        };
    },

    methods: {
        dateClick(arg) {
            // console.log("recebendo dados: ", arg);
            this.$data.showModal = true;
            // this.showModal = true //ou
            this.setModalOpen(arg);
        },

        closeModal() {
            this.$data.showModal = false;
        },

        setModalOpen(obj) {
            let dateAndTime = obj.dateStr.split("T");

            this.newEvent.date_at = dateAndTime[0];
            this.newEvent.hour = dateAndTime[1].substr(0, 8);
            // Pegando o ID do usuario Logado
            // this.newEvent.user_id = this.$page.user.id
        },

        saveAppt(param) {
            // console.log(param)
            if (param.title === "") {
                alert("Preencha o campo Motivo");
            }
            //Variavel que guarda o tempo
            let dataAppt = this.setDurationSesion(param);
            // console.log(dataAppt);
            // console.log (this.$page)
            Inertia.post(route("appointment.store"), dataAppt, {
                onSuccess: (page) => {
                    if (Object.entries(page.props.erros).length === 0) {
                        this.closeModal();
                    }
                },
            });
            //Capturando Excepciones
            Inertia.on("error", (event) => {
                event.preventDefault();
                console.log("capturamos esses error: ", error.mesage);
            });
        },
        setDurationSesion(form) {
            let dateApt = form.date_at + " " + form.hour;

            let initSesion = new Date(dateApt);
            // console.info(initSesion);

            const getSecondsSesion = initSesion.getSeconds() + form.session;

            initSesion.setSeconds(getSecondsSesion);

            return {
                id: form.id,
                title: form.title,
                start: dateApt,
                end: formatTime(initSesion),
                session: form.session,
                user_id: form.user_id,
            };
        },
    },
};
</script>

<style lang="css" scoped></style>
