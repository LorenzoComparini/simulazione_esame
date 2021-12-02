<template>
  <div class="flex flex-grow w-full p-8">
      <div class="bg-white p-8">
          <div class="flex h-full w-full space-x-10">
            <div class="flex flex-col h-full justify-center w-3/12">
              <img :src="book.img" alt="" class="">
              <div class="flex ml-auto py-1 text-yellow-400 border-2 border-yellow-400 rounded-full px-4 text-sm items-center space-x-1 mt-2 hover:bg-yellow-400 hover:text-white cursor-pointer transition duration-300"
              @click="goToEditBook(book.id)">
                  <p>Modifica</p>
                  <span class="material-icons text-sm">
                      edit
                  </span>
              </div>
            </div>
            <div class="flex flex-col w-9/12 h-full justify-center">
                <p class="text-2xl font-semibold">{{ book.title }}</p>
                <p class="italic mb-3">Autore: {{ book.autore }}</p>
                <div class="mb-7">
                    <span class="material-icons text-yellow-400" v-for="star in book.stars" :key="star">star</span>
                </div>
                <p class="px-4 py-1 mb-4 bg-yellow-400 rounded-full w-min font-semibold text-white">{{ book.genre.name }}</p>
                <p class="text-lg mb-8">{{ book.description }}</p>
                <p class="ml-auto italic text-gray-700">Codice ISBN:{{ book.isbn_code }}</p>
            </div>
          </div>
      </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'BookDetails',

    data(){
        return{
            book: {}
        }
    },

    async mounted(){
        let id = this.$route.params.id;
        console.log(id);
        this.book = (await axios.get('http://localhost:8000/api/details/' + id)).data;
    },

    methods: {
        goToEditBook(id){
            this.$router.push('/home/books/edit/' + id)
        }
    }
}
</script>
