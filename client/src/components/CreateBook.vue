<template>
  <div class="flex flex-grow w-full p-8 justify-center">
      <div class="bg-white w-1/3 h-full p-8">
        <div v-for="field in bookFields" :key="field.code" class="">

          <div v-if="field.type=='text'" class="flex flex-col mb-5 space-y-1">
            <label :for="field.code" class="font-semibold">{{ field.label }}</label>
            <input type="text" :id="field.code" v-model="book[field.code]" class="border-2 border-gray-200 rounded-md py-1 px-2">
          </div>

          <div v-if="field.type=='number'" class="flex flex-col mb-5 space-y-1">
            <label :for="field.code" class="font-semibold">{{ field.label }}</label>
            <input type="number" :id="field.code" v-model="book[field.code]" class="border-2 border-gray-200 rounded-md py-1 px-2">
          </div>

          <div v-if="field.type=='textarea'" class="flex flex-col mb-5 space-y-1">
            <label :for="field.code" class="font-semibold">{{ field.label }}</label>
            <textarea cols="30" rows="10" :id="field.code" v-model="book[field.code]" class="border-2 border-gray-200 rounded-md py-1 px-2"></textarea>
          </div>

          <div v-if="field.type=='select'" class="flex flex-col mb-5 space-y-1">
            <label :for="field.code" class="font-semibold">{{ field.label }}</label>
            <select :id="field.code" v-model="book[field.code]" class="border-2 border-gray-200 rounded-md py-1 px-2">
              <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{ genre.name }}</option>
            </select>
          </div>
        </div>
        <button class="ml-auto px-4 py-1 bg-yellow-400 rounded-lg font-semibold text-white">Salva</button>
      </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'CreateBook',
    
    data(){
      return{
        newBook: {},
        book: {
          title: "",
          autore: "",
          description: "",
          isbn_code: null,
          img: "",
          stars: null,
          genre_id: null
        },
        isEdit: false,
        genres: [],
        bookFields : [
          {
            code: "title",
            type: "text",
            placeholder: "Inserire titolo del libro",
            label: "Titolo"
          },
          {
            code: "autore",
            type: "text",
            placeholder: "Inserire l'autore del libro",
            label: "Autore"
          },
          {
            code: "description",
            type: "textarea",
            placeholder: "Inserire la trama del libro",
            label: "Trama"
          },
          {
            code: "isbn_code",
            type: "number",
            placeholder: "Inserire il codice isbn del libro",
            label: "Codice ISBN"
          },
          {
            code: "stars",
            type: "number",
            placeholder: "Inserire numero di stelle",
            label: "Valutazione"
          },
          {
            code: "genre",
            type: "select",
            placeholder: "Inserire il genere",
            label: "Genere"
          }
        ]
      }
    },

    async mounted(){
      this.genres = (await axios.get('http://localhost:8000/api/genres/list')).data;
      if(this.$route.name == "EditBook") {
        this.isEdit = true;
        let id = this.$route.params.id
        this.book = (await axios.get('http://localhost:8000/api/details/' + id)).data;
      }
    },

    methods: {
      async saveBook(){
        if(this.isEdit){
          await axios.post('', this.book)
        }
      }
    }

}
</script>

