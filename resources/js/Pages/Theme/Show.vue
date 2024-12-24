
<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-4">{{ theme.title }}</h3>
        </div>
        <div>
            <div v-if="theme.messages.length">
                <div v-for="message in theme.messages" class="flex bg-white border border-gray-300">
                    <div class="p-4 w-1/6 border-r border-gray-300">
                        <div class="w-24 h-24 overflow-hidden bg-gray-300 rounded-full mx-auto mb-2">
                            <img class="w-24 h-24" v-if="message.user.avatar_url" :src="message.user.avatar_url" :alt="message.user.name">
                        </div>
                        <div>
                            <h3 class="text-center">{{ message.user.name }}</h3>
                        </div>
                    </div>
                    <div class="p-4 w-5/6">
                        <div class="mb-2 italicrtisan ">
                            <p class="text-sm">{{ message.time }}</p>
                        </div>
                        <div>
                            <div class="mb-4">
                                <p v-html="message.content"></p>
                            </div>
                            <div class="flex items-center justify-end">
                                <div class="flex items-center">
                                    <span class="mr-2">
                                        {{ message.likes }}
                                    </span>
                                    <a @click.prevent="toggleLike(message)" href="#">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            :class="[message.is_liked ? 'fill-sky-600' : 'stroke-sky-600' ,'size-6 stroke-sky-600']"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white border-gray-300 border p-4">
                <div class="mb-4">
                    <h3 class="text-xl mr-4">Добавить сообщения</h3>
                </div>
                <div class="mb-4">
                    <div ref="editor" class="w-full border border-gray-300 p-2" contenteditable="true">
                    </div>
                </div>
                <div>
                    <a @click.prevent="store" class="block w-1/4 p-2 bg-sky-600 text-white text-center border border-sky-700" href="#">Опубликовать</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MainLayout from "@/Layouts/MainLayout.vue";
    import {Link} from "@inertiajs/vue3";

    export default {
        name: 'Show',
        layout: MainLayout,
        props: ['theme'],
        components: {
            Link
        },
        methods: {
            store() {
                axios.post('/messages', {
                    content: this.$refs.editor.innerHTML,
                    theme_id: this.theme.id,
                }).then((res) => {

                    this.$refs.editor.innerHTML = '';
                });
            },
            toggleLike(message) {
                axios.post(`/messages/${message.id}/likes`)
                    .then(res => {
                        message.is_liked = !message.is_liked;
                    })
            }
        },
        data() {
            return {
                // content: '',
            }
        },
    }
</script>

