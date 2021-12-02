<template>
  <div class="flex h-full w-full p-8 bg-gray-600">
    <div class="grid grid-cols-3">
      <div v-for="book in books" :key="book.id" class="bg-white cursor-pointer hover:bg-yellow-400  transition duration-300" @click="goToBookDetails(book.id)">
        <div class="flex px-10 pt-10 bg-white">
          <img :src="book.img" alt="" class="h-64">
        </div>
        <div class="flex px-5 py-5 bg-white">
          <div class="space-y-2">
            <p class="font-semibold">{{ book.title }}</p>
            <p class="italic">Autore: {{ book.autore }}</p>
          </div>
        </div>
        <div class="flex justify-center px-8 py-3 border-4 border-yellow-400">
          <p class="font-semibold">Dettagli</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Home',

    data(){
      return{
        books: []
      }
    },

    async mounted(){
      this.books = (await axios.get('http://localhost:8000/api/list')).data
    },

    methods:{
      goToBookDetails(id){
        this.$router.push('home/books/' + id);
      }
    }
}
</script>