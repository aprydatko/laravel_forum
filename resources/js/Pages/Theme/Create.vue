
<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-4">Добавить Тему</h3>
        </div>
        <div>
            <div class="mb-4">
                <input type="text" placeholder="Заголовок" v-model="title" class="border-gray-300 p-2 w-1/2" />
            </div>
            <div class="mb-4">
                <textarea placeholder="Описание" v-model="description" class="border-gray-300 p-2 w-1/2"></textarea>
            </div>
            <div>
                <a
                    class="block w-1/2 py-2 bg-white border border-sky-600 text-black text-center"
                    @click.prevent="store" href="">Добавить</a>
            </div>
        </div>
    </div>
</template>

<script>
    import MainLayout from "@/Layouts/MainLayout.vue";
    import {Link} from "@inertiajs/vue3";

    export default {
        name: 'Create',
        layout: MainLayout,
        props: ['branch'],
        components: {
            Link
        },
        data() {
            return {
                title: '',
                description: '',
                branch_id: this.branch.id,
            }
        },
        methods: {
            store() {
                this.$inertia.post('/themes', {
                    title: this.title,
                    description: this.description,
                    branch_id: this.branch_id
                });
            }
        }
    }
</script>

