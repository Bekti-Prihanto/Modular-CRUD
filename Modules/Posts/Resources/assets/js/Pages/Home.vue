
<template>
    <app-layout title="Dashboard">

            <template #nav>
                <jet-nav-link :href="route('posts.index')" :active="route().current('posts.index')">
                    My Posts
                </jet-nav-link>
                
                <jet-nav-link :href="route('users.index')" :active="route().current('users.index')" 
                v-if="auth === true">
                    Users
                </jet-nav-link>
            </template>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                My Posts
            </h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                    <div class="mb-3">
                        <Link href="/posts/create">
                            <button class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-yellow-500 hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300" type="submit">Create</button>
                        </Link> 
                    </div>

                    <table class="min-w-full table-auto">
                        <thead class="justify-between">
                            <tr class="bg-gray-800">
                                <th class="px-16 py-2 text-gray-300">No.</th>
                                <th class="px-16 py-2 text-gray-300">Title</th>
                                <th class="px-16 py-2 text-gray-300">Content</th>
                                <th class="px-16 py-2 text-gray-300">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for=" post in posts" :key="post.id" class="bg-white border-0 border-gray-200">
                                <td class="px-4 py-2 text-center">{{ post.id }}</td>
                                <td class="px-4 py-2">{{ post.title }}</td>
                                <td class="px-4 py-2">{{ post.content }}</td>
                                <td class="px-4 py-2 text-center">
                                    <div class="flex item-center justify-center">
                                        <Link :href="route('posts.edit', post.id)">                                        
                                            <div class="w-4 mr-2 transform hover:text-purple-500 text-blue-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                        </Link>
                                        <Link @click="destroy(post.id)">                                        
                                            <div class="w-4 mr-2 transform hover:text-purple-500 text-red-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>
                                        </Link>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
    
    export default {
        props: {
            posts: Array,
            auth: Boolean,
        },
        components: {
            Link,
            AppLayout,
            JetNavLink,
        },
        methods: {
            destroy(id) {
                if(confirm('Data user ingin dihapus?')){
                    this.$inertia.delete(route("posts.destroy", id));
                }else{
                    return false
                }
            },
        },
    }
</script>