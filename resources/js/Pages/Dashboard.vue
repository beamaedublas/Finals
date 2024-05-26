<script setup>
import Mylayout from '@/Layouts/MyLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({
    layout: Mylayout
});
</script>

<template>
    <div class="py-12 welcome">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">WELCOME TO OUR COMPANY</h1>
            <p class="text-lg text-gray-700 mb-8">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <div class="social-links">
                <a href="https://facebook.com" target="_blank" class="social-link">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com" target="_blank" class="social-link">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://instagram.com" target="_blank" class="social-link">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://linkedin.com" target="_blank" class="social-link">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </div>
</template>

<style scoped>
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.welcome {
    background: linear-gradient(135deg, white, pink);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: fadeIn 2s ease-in-out; /* Applying the fade-in animation */
}

.social-links {
    display: flex;
    justify-content: center;
    gap: 2rem; /* Increased gap for more spacing */
    margin-top: 1.5rem;
}

.social-link {
    color: #007BFF;
    font-size: 2rem;
    transition: color 0.3s ease;
}

.social-link:hover {
    color: #0056b3;
}
</style>
