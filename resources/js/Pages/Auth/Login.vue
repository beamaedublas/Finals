<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div class="login-container">
            <div class="login-box">
                <div class="tabs">
                    <button class="tab active">LOGIN</button>
                </div>
                <div v-if="status" class="status">
                    {{ status }}
                </div>

                <form @submit.prevent="submit">
                    <div>
                        <TextInput
                            id="email"
                            type="email"
                            placeholder="Email Address"
                            class="input"
                            v-model="form.email"
                            required
                            autofocus
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
                            autocomplete="current-password"
                        />

                        <InputError class="error" :message="form.errors.password" />
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <label class="flex items-center">
                            <Checkbox name="remember" v-model:checked="form.remember" />
                            <span class="remember-me">Remember me</span>
                        </label>

                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="forgot-password"
                        >
                            Forgot password?
                        </Link>
                    </div>

                    <div class="mt-4">
                        <PrimaryButton class="button" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Login
                        </PrimaryButton>
                    </div>
                </form>

                <div class="mt-4 text-center">
                    <span>Not a member? </span>
                    <Link href="/register" class="signup-link">Signup now</Link>
                </div>
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

.remember-me {
    margin-left: 0.5rem;
    color: #555;
}

.forgot-password {
    color: #ff65a3;
    text-decoration: none;
}

.forgot-password:hover {
    text-decoration: underline;
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
