<template>
    <form class="row flex-column w-50 m-auto mt-3">
      <h2 class="text-center">Actualizar Producto</h2>
      <div class="col m1">
        <select class="w-50" v-model="id">
            <option class="row" v-for="(producto,index) in this.$store.state.productos" :key="index" :value="producto.id">
                {{ producto.nombre }}
            </option>
        </select>
      </div>
      <div class="col m-1">
        <input class="m-auto d-block border" type="text" v-model="nombre" placeholder="nombre">
      </div>
      <div class="col m-1">
        <input class="m-auto d-block border" type="text" v-model="descripcion" placeholder="descripcion">
      </div>
      <div class="col m-1">
        <button class="m-auto d-block border btn btn-dark" @click="mostrar()">actualizar Producto</button>
      </div> 
    </form>
  </template>
  <script>
  export default {
    name: 'productosActualizarForm',
    data() {
      return {
        // Reactive property to hold updated message
        id:'',
        nombre:'',
        descripcion:''
      };
    },
    methods:{
      mostrar()
      {
        let data = {
            id:this.id,
            nombre:this.nombre,
            descripcion:this.descripcion
        }
        this.$store.dispatch('actualizarProducto', data);
        this.$store.dispatch('modificarProducto');
      }
    }
  }
  </script>
