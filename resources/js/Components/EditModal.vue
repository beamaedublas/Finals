<template>
    <div v-if="show" class="fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-2xl mb-4">Edit Information</h2>
            <form @submit.prevent="submitForm">
                <textarea v-model="form.content" class="w-full p-2 border rounded"></textarea>
                <div class="mt-4 flex justify-end space-x-2">
                    <button type="button" @click="closeModal" class="btn btn-secondary">Cancel</button>
                    <button type="submit" class="btn btn-pink" :disabled="form.processing">Save</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref, watch, defineProps, defineEmits } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    show: Boolean,
    initialData: String,
});

const emit = defineEmits(['close', 'updatedData']);

const form = useForm({ content: props.initialData });

watch(() => props.initialData, (newVal) => {
    form.content = newVal;
});

const closeModal = () => {
    emit('close');
};

const submitForm = () => {
    form.put(route('about.update'), {
        onSuccess: () => {
            emit('close');
            emit('updatedData', form.content); // Emit content from form
        },
    });
};
</script>

<style scoped>
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

.btn-secondary {
    background-color: #6a0dad; /* Purple */
}

.btn-secondary:hover {
    background-color: #4b0082; /* Darker purple */
}

.btn-pink {
    background-color: #ff69b4; /* Pink */
}

.btn-pink:hover {
    background-color: #ff1493; /* Darker pink */
}
</style>
