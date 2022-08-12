<template>
<app-layout>
    <template #nav>
        <jet-nav-link :href="route('posts.index')" :active="route().current('posts.create')">
            My Posts
        </jet-nav-link>

        <jet-nav-link :href="route('categories.index')" :active="route().current('categories.index')">
            Categories
        </jet-nav-link>
                
        <jet-nav-link :href="route('users.index')" :active="route().current('users.index')" 
        v-if="auth">
            Users
        </jet-nav-link>
        
        <jet-nav-link :href="route('users.index')" 
        v-if="auth">
            Modules
        </jet-nav-link>
    </template>

    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Posts
        </h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-10">
                <div class="mx-auto w-full max-w-[700px]">
                    <form @submit.prevent="submit">
                        <div class="mb-5">
                            <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">Title</label>
                            <input type="text" id="title" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" v-model="form.title">
                        </div>
                        <div class="mb-5">
                            <label for="content" class="mb-3 block text-base font-medium text-[#07074D]">Content</label>
                            <textarea type="text" id="content" class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" v-model="form.content" rows="5"></textarea>
                        </div>
                        <button class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-green-500 hover:bg-green-600 active:bg-green-700 focus:ring-green-300 mr-3" type="submit">Submit</button>
                        <Link href="/posts">                            
                            <button class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300" type="submit">Kembali</button>
                        </Link>
                    </form>
                </div>
            </div>
        </div>
    </div>

</app-layout>
</template>

<style>

</style>

<script>
    import { reactive } from 'vue'
    import { Inertia } from '@inertiajs/inertia'
    import { Link } from '@inertiajs/inertia-vue3'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'

    export default {
        components: {
            Link,
            AppLayout,
            JetNavLink,
        },

        props:{
            auth: Boolean,
        },
        
        setup () {
            const form = reactive({
                title: null,
                content: null,
            })

            function submit() {
                Inertia.post('/posts', form)
            }

            return { form, submit }
        },
    }

</script>