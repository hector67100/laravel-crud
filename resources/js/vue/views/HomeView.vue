<template>
  <div class="home row">
    
    <div class="col">
      <h1 class="text-center mt-5">Hola!</h1>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
export default {
  name: 'HomeView',
  computed:{

  },
  components:
  {

  },
  beforeCreate(){
    this.$store.dispatch('init');
  }
}
</script>
