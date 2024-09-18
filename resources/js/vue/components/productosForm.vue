<template>
    <form class="row flex-column w-50 m-auto mt-3">
      <h2 class="text-center">Agregar Producto</h2>
      <div class="col m-1">
        <input class="m-auto d-block border" type="text" v-model="nombre" placeholder="nombre">
      </div>
      <div class="col m-1">
        <input class="m-auto d-block border" type="text" v-model="descripcion" placeholder="descripcion">
      </div>
      <div class="col m-1">
        <button class="m-auto d-block border btn btn-dark" @click="mostrar()">agregar Producto</button>
      </div> 
    </form>
  </template>
  <script>
  export default {
    name: 'productosForm',
    data() {
      return {
        // Reactive property to hold updated message
        nombre:'',
        descripcion:''
      };
    },
    methods:{
      mostrar()
      {
        let data = {
            nombre:this.nombre,
            descripcion:this.descripcion
        }
        this.$store.dispatch('agregarProducto', data);
        this.$store.dispatch('modificarProducto');
      }
    }
  }
  </script>
