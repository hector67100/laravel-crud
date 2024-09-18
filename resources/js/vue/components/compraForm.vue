<template>
    <form class="row flex-column w-50 m-auto mt-3">
      <h2 class="text-center">Agregar Compra</h2>
      <select  v-model="user_id">
          <option class="row" v-for="(user,index) in this.$store.state.users" :key="index" :value="user.id">
              {{ user.name }}
          </option>
      </select>
      <div class="col m-1">
        <input class="m-auto d-block border" type="text" v-model="nombre" placeholder="nombre">
      </div>
      <h2>cantidad de productos agregados</h2>
      <p v-html="productos.length"></p>
      <div class="row col" v-for="(producto,index) in this.$store.state.productos" :key="index">
        <div class="col text-center border">
          <p>{{ producto.nombre }}</p><button @click="restarProducto(producto.id)">-</button> <button @click="agregarProducto(producto.id)">+</button> 
        </div>
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
        user_id:'',
        productos:[]
      };
    },
    methods:{
      mostrar()
      {
        if(this.productos.length > 0)
        {
          let data = {
            compra:{
              nombre:this.nombre,
              user_id:this.user_id
            },
            producto:
            {
              productos:this.productos
            }
          }
          this.$store.dispatch('agregarCompra', data);
          this.$store.dispatch('modificarCompras');
        }
        else{
          alert("agregue un producto")
        }
        // this.$store.dispatch('modificarProducto');
      },
      agregarProducto(id)
      {
        if( this.productos.indexOf(id) == -1)
        {
          this.productos.push(id);
          console.log( this.productos);
        }
      },
      restarProducto(id)
      {
        this.productos = this.productos.filter(item => item !== id)
      }
    }
  }
  </script>
