<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />
            
            <div class="register-box">
                <div class="tabs">
                    <button class="tab active">SIGNUP</button>
                </div>
                
                <form @submit.prevent="submit">
                    <div>
                        <TextInput
                            id="name"
                            type="text"
                            placeholder="Name"
                            class="input"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                        />
                        <InputError class="error" :message="form.errors.name" />
                    </div>

                    <div class="mt-4">
                        <TextInput
                            id="email"
                            type="email"
                            placeholder="Email Address"
                            class="input"
                            v-model="form.email"
                            required
                            autocomplete="username"
                        />
                        <InputError class="error" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <TextInput
                            id="password"
                            type="password"
                            placeholder="Password"
                            class="input"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                        />
                        <InputError class="error" :message="form.errors.password" />
                    </div>

                    <div class="mt-4">
                        <TextInput
                            id="password_confirmation"
                            type="password"
                            placeholder="Confirm Password"
                            class="input"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                        />
                        <InputError class="error" :message="form.errors.password_confirmation" />
                    </div>

                    <div class="mt-4">
                        <PrimaryButton class="button" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Register
                        </PrimaryButton>
                    </div>
                </form>

                <div class="mt-4 text-center">
                    <span>Already registered? </span>
                    <Link href="/login" class="signup-link">Login now</Link>
                </div>
            </div>
        
    </GuestLayout>
</template>

<style scoped>

.tabs {
    display: flex;
    justify-content: center;
    margin-bottom: 1rem;
}

.tab {
    flex: 1;
    padding: 0.75rem 1rem;
    cursor: pointer;
    background: linear-gradient(135deg, #ff7eb3, #ff65a3, #fd3a84, #a42cd6, #5f22bb);
    color: #fff;
    border: none;
    outline: none;
}

.tab.active {
    background: #fff;
    color: #333;
    border-bottom: 2px solid #ff65a3;
}

.status {
    margin-bottom: 1rem;
    color: #28a745;
    font-weight: 500;
}

.input {
    width: 100%;
    padding: 0.75rem;
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    background: #f9f9f9;
}

.error {
    color: #e3342f;
    margin-top: 0.5rem;
}

.button {
    width: 100%;
    padding: 0.75rem;
    background: linear-gradient(135deg, #ff7eb3, #ff65a3, #fd3a84, #a42cd6, #5f22bb);
    border: none;
    border-radius: 4px;
    color: white;
    font-size: 1rem;
    cursor: pointer;
}

.button:hover {
    background: linear-gradient(135deg, #5f22bb, #a42cd6, #fd3a84, #ff65a3, #ff7eb3);
}

.signup-link {
    color: #ff65a3;
    text-decoration: none;
}

.signup-link:hover {
    text-decoration: underline;
}
</style>
