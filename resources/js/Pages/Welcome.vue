<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from '../Components/ApplicationLogo.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <div class="text-black">
        <img
            id="background"
            class="absolute inset-0 w-full h-full object-cover z-0"
            src="../Components/bg.jpg"
        />
        <div class="flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end lg:col-start-3">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 btn-gradient ring-1 ring-transparent transition text-black focus:outline-none focus-visible:ring-[#FF2D20]"
                        >
                            Dashboard
                        </Link>
                    </nav>
                </header>

                <main class="mt-20 text-center">
                    <div>
                        <ApplicationLogo class="w-[20vh] mx-auto mb-6" />
                        <h1 class="text-4xl font-bold">Create Your Own Portfolio</h1>
                        <p class="mt-4 text-lg">Showcase your projects, skills, and achievements. Start building your professional online presence today!</p>
                        <Link 
                            href="/login"
                            class="mt-6 inline-block rounded-md btn-gradient px-6 py-3 text-white ring-1 ring-transparent transition focus:outline-none focus-visible:ring-white"
                        >
                            Get Started
                        </Link>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>

<style scoped>
.text-black {
    color: black;
}

.btn-gradient {
    background: linear-gradient(135deg, #a42cd6, #ff65a3);
    color: white;
}

.btn-gradient:hover {
    background: linear-gradient(135deg, #9c27b0, #ff4081);
}
</style>
