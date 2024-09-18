<template>
    <h1 class="text-center m-4">Compras</h1>
    <div class="row" v-for="(producto,index) in this.$store.state.compras" :key="index">
      <div class="col text-center border">
        <p>id:{{ producto.id }}</p> 
      </div>
      <div class="col text-center border">
        <p>nombre: {{ producto.nombre }}</p> 
      </div>
    </div>
    <CompraForm></CompraForm>
  </template>
  
  <script>
  // @ is an alias to /src
  import CompraForm from '../components/CompraForm.vue';
  export default {
    name: 'CompraView',
    computed:{
  
    },
    components:
    {
        'CompraForm' : CompraForm
    },
    beforeCreate(){
      this.$store.dispatch('modificarCompras');
    }
  }
  </script>
  