<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
// const users = $page.props.users;
// const users = computed(() => $page.props.users)
// const changePage = (url) => {
//     Inertia.visit(url)
// }
// import { Inertia } from '@inertiajs/inertia';

// const redirectToAgregar = () => {
//   Inertia.visit(route('users_agregar'));
// };


</script>
<style scoped>
.background-container {
    position: relative;
    width: 100%;
    height: 140vh;
    background-image: url('@/img/Fondo1.webp');
    background-size: 100% 100%;
    /* Hace que la imagen ocupe todo el contenedor */
    background-position: center;
    background-repeat: no-repeat;
    /* Evita que la imagen se repita */

}

/* Media query para dispositivos más pequeños */
@media screen and (max-width: 768px) {
    .background-container {
        height: 110vh;
        /* Cambia la altura para dispositivos más pequeños */
        background-size: cover;
        /* Ajusta el tamaño de la imagen para que cubra el contenedor */
    }
}
</style>
<template>
    <Head title="Beauty Studio" />
    <div class="background-container">

        <AuthenticatedLayout>
            <template #content-Agregar>
                <div class="py-5 px-15">
                    <div class="bg-white px-5 py-8 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="text-3xl  font-bold text-black">
                            <center> Editar Servicios</center>
                        </div>
                        <form class="mt-10 px-4 space-y-4">
                            <div>
                                <label for="id" class="block text-sm font-medium text-gray-700">ID</label>
                                <input id="id" name="id" type="text" required
                                    class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                <input id="name" name="name" type="text" required
                                    class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                                <input id="descripcion" name="descripcion" type="text" required
                                    class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
                                <input id="cantidad" name="cantidad" type="text" required
                                    class="mt-2 block w-full sm:max-w-md lg:w-96 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <button class="bg-blue-500 mt-2 text-white px-3 py-1 rounded hover:shadow-md">
                                    Guardar
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </template>
        </AuthenticatedLayout>

    </div>
</template>
