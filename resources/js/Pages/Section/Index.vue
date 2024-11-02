
<template>
    <div>
        <div class="flex items-center">
            <h3 class="text-xl mr-4">Разделы</h3>
            <Link :href="route('sections.create')" class="block p-2 w-8 px-2 py-1 bg-white border border-gray-300 rounded-lg text-center">+</Link>
        </div>
    </div>
</template>

<script>
    import MainLayout from "@/Layouts/MainLayout.vue";
    import {Link} from "@inertiajs/vue3";

    export default {
        name: 'Index',
        layout: MainLayout,
        components: {
            Link
        }
    }
</script>

