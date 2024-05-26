<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { Link, usePage } from "@inertiajs/vue3";
import { ref } from 'vue';

defineOptions({
  layout: MyLayout
});

const props = defineProps({
    album: Array
});

const form = useForm({
  title: props.album.title,
  description: props.album.description,
  imageUrl: props.album.imageUrl,
});

const delAlbum = (album) => {
  const del = confirm("Are you sure you want to delete?");
  if (del) {
    form.delete(`/album/${album.id}`, {
      preserveScroll: true
    }).then(() => {
      // Handle success or other actions after deletion
    });
  }
};
</script>

<template>
  <div class="mt-[-8%]">
    <div class="flex justify-between items-center mt-[10%] ml-[2%]">
        <div class="flex items-center space-x-4">
            <Link href='/portfolio' class="btn arrow">←</Link>
            <h1 class="text-4xl fw-bold text-black">Albums</h1>
        </div>
        <div class="mr-[1%]">
            <Link href='/album/create' class="btn btn-pink">
                Add Album
            </Link>
        </div>
    </div>
    
    <div class="overflow-auto h-[60vh] p-2 container">
      <div v-for="album in album" :key="album.id" class="mt-2 border p-2 bg-white rounded">    
          <div class="flex gap-2">
            <div class="w-[50%]">
              <img :src="album.imageUrl" alt="Album Image" class="w-full rounded h-40 object-cover">
            </div>
            <div class="w-full flex flex-col justify-between">
              <div>
              <div class="flex items-center">
                <h1 class="text-4xl flex-1 nn text-black">{{ album.title }}</h1>
                <button @click="delAlbum(album)" class="btn btn-pink">X</button>
              </div>
              <p class="nn text-black">{{ album.description }}</p>
            </div>
            <div class="flex justify-end">
              <Link :href="'/album/' + album.id + '/edit'" class="btn btn-purple">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square rounded" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
              </Link>
            </div>
            </div>
          </div>
        </div>
      </div>    
  </div>  
</template>

<style scoped>
.text-4xl {
  font-size: 2.25rem;
}

.nn {
  text-align: center;
}

.row {
  padding: 20px;
}

.tt {
  font-size: 30px;
}

.tit {
  font-weight: bold;
  font-size: 2.25rem;
  color: #ff69b4;
}

.arrow {
  font-size: 2.25rem;
  color: #080707; /* Set the back button color to black */
}

.arrow:hover {
  color: #050505; /* Set the hover color for the back button */
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

.btn-pink {
  background-color: #ff69b4;
}

.btn-pink:hover {
  background-color: #ff1493;
}

.btn-purple {
  background-color: #6a0dad;
}

.btn-purple:hover {
  background-color: #4b0082;
}
</style>
