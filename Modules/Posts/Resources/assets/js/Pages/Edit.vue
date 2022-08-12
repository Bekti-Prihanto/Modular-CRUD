<template>
<app-layout>
    <template #nav>
        <jet-nav-link :href="route('posts.index')" :active="route().current('posts.edit')">
            My Posts
        </jet-nav-link>
                
        <jet-nav-link :href="route('users.index')" :active="route().current('users.index')" 
        v-if="auth === true">
            Users
        </jet-nav-link>
    </template>

    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Posts
        </h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mx-auto w-full max-w-[700px] py-10">
                    <form @submit.prevent="update">
                        <div class="mb-4">
                            <label class="mb-3 block text-base font-medium text-[#07074D]" for="title">
                                Title
                            </label>
                            <input class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" id="title" type="text" placeholder="title" v-model="form.title">
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors.title">
                                <span class="font-medium">Oops!</span> {{errors.title}}</p>
                        </div>
                        <div class="mb-4">
                            <label class="mb-3 block text-base font-medium text-[#07074D]" for="content">
                                Content
                            </label>
                            <textarea rows="5" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" id="content" type="text" placeholder="content" v-model="form.content"></textarea>
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors.content">
                            <span class="font-medium">Oops!</span> {{errors.content}}</p>
                        </div>
                        <button class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300 mr-3" type="submit">Update</button>
                        <Link href="/posts">                            
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
                    title:this.post.title,
                    content:this.post.content,
                }
            }
        },
        methods:{
            update(){
                this.$inertia.put('/posts/' + this.post.id, this.form)
            }
        },
         components: {
            Link,
            AppLayout,
            JetNavLink
        },
        props:{
            post: Object,
            auth: Boolean,
            errors: Object
        }
    }
</script>