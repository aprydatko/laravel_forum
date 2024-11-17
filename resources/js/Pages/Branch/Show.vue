
<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-4">{{ branch.title }}</h3>
        </div>
        <div>

        </div>
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: 'Show',
    layout: MainLayout,
    components: {
        Link
    },
    props: [
        'branch'
    ]
}
</script>

