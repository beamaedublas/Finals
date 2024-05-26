<script setup>
import { ref } from 'vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import Mylayout from '@/Layouts/MyLayout.vue';
import EditModal from '@/Components/EditModal.vue';

defineOptions({
    layout: Mylayout,
});

const { props } = usePage();
const initialData = ref(props.aboutContent || 'Tell me about yourself');

const showModal = ref(false);

const openModal = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};

const updateData = (data) => {
    initialData.value = data;
    // Update the backend to persist changes
    Inertia.put(route('about.update'), { content: data }, {
        onSuccess: () => {
            console.log('Data updated successfully');
        },
        onError: (errors) => {
            console.error('Error updating data:', errors);
        }
    });
};
</script>

<template>
    <Head title="About" />
    <div class="welcome">
        <div class="about-section bg-white shadow-sm sm:rounded-lg p-8">
            <div class="about-title-container">
                <h1 class="about-title">About</h1>
                <button @click="openModal" class="btn edit-button">
                    <i class="fas fa-edit"></i>
                </button>
                <hr class="about-title-line" />
            </div>
            <p class="about-content">{{ initialData }}</p>
            <div class="about-buttons">
                <Link href="/album" class="btn album-button">Albums</Link>
            </div>
        </div>
    </div>

    <EditModal :show="showModal" :initialData="initialData" @updatedData="updateData" @close="closeModal" />
</template>

<style scoped>
.welcome {
    background: linear-gradient(135deg, white, pink);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.about-section {
    text-align: center;
    width: 100%;
    max-width: 800px;
    position: relative;
    padding-top: 60px; /* Adjusted to give space for the title */
}

.about-title-container {
    position: relative;
    margin-bottom: 20px;
}

.about-title {
    font-size: 2.5rem;
    color: #333;
    margin: 0;
    text-align: left; /* Ensures the title is aligned to the left */
    padding-bottom: 10px; /* Space for the line */
}

.about-title-line {
    border: none;
    border-bottom: 2px solid #ff65a3; /* Line color */
    margin: 0;
}

.about-buttons {
    display: flex;
    justify-content: center;
    gap: 1rem;
}

.about-content {
    font-size: 1.2rem;
    color: #666;
    margin: 20px 0; /* Adjusted margins */
}

.btn {
    padding: 10px 20px;
    border-radius: 5px;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem; /* Space between icon and text */
}

.edit-button {
    background-color: #ff69b4;
    position: absolute;
    top: 0;
    right: 0;
}

.edit-button:hover {
    background-color: #ff1493;
}

.album-button {
    background-color: #a42cd6;
}

.album-button:hover {
    background-color: #5f22bb;
}
</style>
