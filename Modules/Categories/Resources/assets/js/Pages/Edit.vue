<template>
<app-layout>
    <template #nav>
        <jet-nav-link :href="route('posts.index')" :active="route().current('posts.index')">
            My Posts
        </jet-nav-link>
                
        <jet-nav-link :href="route('users.index')" :active="route().current('users.index')">
            Users
        </jet-nav-link>
    </template>

    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User
        </h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mx-auto w-full max-w-[700px] py-10">
                    <form @submit.prevent="update">
                        <div class="mb-4">
                            <label class="mb-3 block text-base font-medium text-[#07074D]" for="name">
                                Name
                            </label>
                            <input class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" id="name" type="text" placeholder="name" v-model="form.name">
                            <!-- <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors.name">
                                <span class="font-medium">Oops!</span> {{errors.name}}</p> -->
                        </div>
                        <div class="mb-4">
                            <label class="mb-3 block text-base font-medium text-[#07074D]" for="email">
                                Email
                            </label>
                            <input rows="5" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" id="email" type="text" placeholder="email" v-model="form.email">
                            <!-- <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors.email">
                            <span class="font-medium">Oops!</span> {{errors.email}}</p> -->
                        </div>
                        <button class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300 mr-3" type="submit">Update</button>
                        <Link href="/users">                            
                            <button class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-green-500 hover:bg-green-600 active:bg-green-700 focus:ring-green-300" type="submit">Kembali</button>
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
import { Link } from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import JetNavLink from '@/Jetstream/NavLink.vue'

    export default{
        data(){
            return{
                form:{
                    name:this.user.name,
                    email:this.user.email,
                }
            }
        },
        methods:{
            update(){
                this.$inertia.put('/users/' + this.user.id, this.form)
            }
        },
         components: {
            Link,
            AppLayout,
            JetNavLink
        },
        props:{
            user: Object,
        }
    }
</script>