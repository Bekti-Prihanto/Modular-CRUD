<template>
    <app-layout title="Dashboard">

            <template #nav>
                <jet-nav-link :href="route('posts.index')" :active="route().current('posts.index')">
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

        <template #header v-if="dashboard">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
        
        <div class="py-12" v-if="dashboard">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <welcome />
                </div>
            </div>
        </div>
        
        <slot></slot>

    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'

    export default defineComponent({
        components: {
            AppLayout,
            Welcome,
            JetNavLink,
        },
        props: {
            auth: Boolean,
            dashboard: Boolean
        },
    })
</script>
