<template>
<app-layout>
    <template #nav>
        <jet-nav-link :href="route('posts.index')" :active="route().current('posts.index')">
            My Posts
        </jet-nav-link>
                
        <jet-nav-link :href="route('users.index')" :active="route().current('users.create')" 
        v-if="auth === true">
            Users
        </jet-nav-link>
    </template>

    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create User
        </h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-10">
                <div class="mx-auto w-full max-w-[700px]">
                    <form @submit.prevent="submit">
                        <div class="mb-5">
                            <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">Name</label>

                            <input type="text" id="name" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" v-model="form.name">
                        </div>
                        <div class="mb-5">
                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">Email</label>

                            <input type="text" id="email" class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" v-model="form.email" rows="5">
                        </div>
                        <div class="mb-5">
                            <label for="password" class="mb-3 block text-base font-medium text-[#07074D]">Password</label>

                            <input type="password" id="password" class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" v-model="form.password" rows="5">
                        </div>
                        <button class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-green-500 hover:bg-green-600 active:bg-green-700 focus:ring-green-300 mr-3" type="submit">Submit</button>
                        <Link href="/users">                            
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
    import Input from '@/Jetstream/Input.vue'

    export default {
        components: {
            Link,
            AppLayout,
            JetNavLink,
            Input
        },

        props:{
            auth: Boolean,
        },
        
        setup () {
            const form = reactive({
                name: null,
                email: null,
                password: null,
            })

            function submit() {
                Inertia.post('/users', form)
            }

            return { form, submit }
        },
    }

</script>