<template>
    <AppLayout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-xl sm:rounded-lg mt-5">
            <h1 class="text-2xl">{{ post.title }}</h1>
            <p>{{ post.content }}</p>
        </div>
    </AppLayout>
        
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'

    export default {
        components: {
            AppLayout,
        },

        props: {
            post: Array,
        },
    }
</script>