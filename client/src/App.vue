<template>
  <div id="app">
    <div class="flex flex-col w-full min-h-screen bg-gray-600">
      <Navbar></Navbar>
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import Navbar from './components/Navbar.vue'

export default {
  name: 'App',
  components: {
    Navbar,
  }
}
</script>

