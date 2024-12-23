
<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-4">Личный кабинет</h3>
        </div>
        <div class="bg-white border-gray-300 border p-4">
            <div class="mb-4">
                <p>
                    Приветствую, {{ user.name }}
                </p>
            </div>
            <div class="mb-4">
                <p class="mb-2">
                    Сменить аватар
                </p>
                <a href="#" @click.prevents="this.$refs.avatar_load.click()" class="block w-24 h-24 rounded-full bg-gray-300">
                    <img v-if="user.avatar_url" :src="user.avatar_url" :alt="user.name" />
                </a>
                <div hidden>
                    <input @change="storeAvatar" ref="avatar_load" type="file">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MainLayout from "@/Layouts/MainLayout.vue";
    import {Link} from "@inertiajs/vue3";

    export default {
        name: 'Personal',
        layout: MainLayout,
        props: ['user'],
        components: {
            Link
        },
        methods: {
            storeAvatar(e) {
                let file = e.target.files[0];
                const formData = new FormData();
                formData.append('avatar', file);
                formData.append('_method', 'patch');

                axios.post('/users/personal', formData)
                    .then(res => {
                        this.user.avatar_url = res.data.avatar_url;
                    });
            }
        },
        data() {
            return {
                // content: '',
            }
        },
    }
</script>

