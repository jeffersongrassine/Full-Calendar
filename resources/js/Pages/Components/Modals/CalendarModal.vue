<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="open = false">
            <TransitionChild
                as="template"
                enter="ease-out duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in duration-200"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                />
            </TransitionChild>

            <div class="fixed z-10 inset-0 overflow-y-auto">
                <div
                    class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0"
                >
                    <TransitionChild
                        as="template"
                        enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100"
                        leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    >
                        <DialogPanel
                            class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full"
                        >
                            <form>
                                <!-- Form -->
                                <div
                                    class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4"
                                >
                                    <div class="sm:flex sm:items-start">
                                        <div
                                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10"
                                        >
                                            <ClockIcon
                                                class="h-6 w-6 text-blue-600"
                                                aria-hidden="true"
                                            />
                                        </div>

                                        <div
                                            class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"
                                        >
                                            <DialogTitle
                                                as="h3"
                                                class="text-lg leading-6 font-medium text-gray-900"
                                            >
                                                Reservar Horário
                                            </DialogTitle>
                                            <div class="mt-4">
                                                <!-- Motivo -->
                                                <div>
                                                    <label
                                                        for="email"
                                                        class="block text-sm font-medium text-gray-700"
                                                        >Motivo</label
                                                    >
                                                    <div class="mt-1">
                                                        <input
                                                            v-model="form.title"
                                                            type="text"
                                                            name="motivo"
                                                            id="motivo"
                                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        />
                                                    </div>
                                                </div>

                                                <!-- Encontro -->
                                                <div class="mt-4">
                                                    <label
                                                        for="email"
                                                        class="block text-sm font-medium text-gray-700"
                                                        >Encontro</label
                                                    >
                                                    <div class="mt-1">
                                                        <input
                                                            v-model="
                                                                form.date_at
                                                            "
                                                            disabled="true"
                                                            type="text"
                                                            name="encontro"
                                                            id="encontro"
                                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        />
                                                    </div>
                                                </div>

                                                <!-- Hora -->
                                                <div class="mt-4">
                                                    <label
                                                        for="hora"
                                                        class="block text-sm font-medium text-gray-700"
                                                        >Hora</label
                                                    >
                                                    <div class="mt-1">
                                                        <input
                                                            v-model="form.hour"
                                                            disabled="true"
                                                            type="time"
                                                            name="hora"
                                                            id="hora"
                                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm text-gray-700 border-gray-300 rounded-md"
                                                        />
                                                    </div>
                                                </div>

                                                <!-- Duração -->
                                                <div class="mt-4">
                                                    <label
                                                        for="hora"
                                                        class="block text-sm font-medium text-gray-700"
                                                        >Duração</label
                                                    >
                                                    <select
                                                        v-model="form.session"
                                                        id="duration"
                                                        name="duration"
                                                        autocomplete="duration-name"
                                                        class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-t-md bg-transparent focus:z-10 sm:text-sm border-gray-300"
                                                    >
                                                        <option value="1800">
                                                            30 minutos
                                                        </option>
                                                        <option value="3600">
                                                            1 hora
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                                >
                                    <button
                                        @click.prevent="store(form)"
                                        type="button"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                                    >
                                        Gravar
                                    </button>
                                    <button
                                        type="button"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                    >
                                        Cancelar
                                    </button>
                                    <button
                                        @click.prevent="closeModal"
                                        type="button"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                    >
                                        Voltar
                                    </button>
                                </div>
                            </form>
                            <!-- Fecha Form -->
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import { ref } from "vue";
import {
    Dialog,
    DialogPanel,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import { ClockIcon } from "@heroicons/vue/outline";

const open = ref(true);
</script>

<script>
export default {
    name: "Modal",

    props: {
        form: {
            type: Object,
            default: () => {},
        },
    },

    components: {},

    methods: {
        closeModal() {
            this.$emit('closeModal');
        },

        store(form) {
            this.$emit('saveAppt', form);
        },
    },
};
</script>
