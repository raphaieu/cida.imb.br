<template>
    <app-layout title="Controller para testes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Test Controller
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <h3>...</h3>
                <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-4">
                            <Link
                                class="
                                    px-6
                                    py-2
                                    mb-2
                                    text-green-100
                                    bg-green-500
                                    rounded
                                "
                                :href="route('test.create')"
                            >
                                Posts Create
                            </Link>
                        </div>
                        <table>
                            <thead class="font-bold bg-gray-300 border-b-2">
                                <td class="px-4 py-2">ID</td>
                                <td class="px-4 py-2">Title</td>
                                <td class="px-4 py-2">Description</td>
                                <td class="px-4 py-2">Action</td>
                            </thead>
                            <tbody>
                                <tr v-for="post in tests.data" :key="post.id">
                                    <td class="px-4 py-2">{{ post.id }}</td>
                                    <td class="px-4 py-2">{{ post.title }}</td>
                                    <td class="px-4 py-2">
                                        {{ post.description }}
                                    </td>
                                    <td class="px-4 py-2 font-extrabold">
                                        <Link
                                            class="text-green-700"
                                            :href="route('test.edit', post.id)"
                                        >
                                            Edit
                                        </Link>
                                        <Link
                                            @click="destroy(post.id)"
                                            class="text-red-700"
                                            >Delete</Link
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <pagination :links="tests.links" />
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head } from "@inertiajs/inertia-vue3";
    import { Link } from "@inertiajs/inertia-vue3";

    export default defineComponent({
        components: {
            AppLayout,
            Head,
            Link
        },
        props: {
         tests: Object,
        },
        methods: {
            destroy(id) {
                this.$inertia.delete(route("test.destroy", id));
            },
        },
    })
</script>
