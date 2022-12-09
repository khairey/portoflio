<script setup>
import { useRouter } from 'vue-router';

const router = useRouter();

const logout = () =>{
    localStorage.removeItem('token');
    router.push('/');
}
</script>
<template>
    <h1>welcome to admin </h1>
    
    <router-link to="/"> Portoflio</router-link>

    <button @click="logout">Logout</button>
</template>