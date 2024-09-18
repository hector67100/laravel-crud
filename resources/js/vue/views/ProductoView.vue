<template>
<h1 class="text-center m-4">Productos</h1>
<nav class="w-100">
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Productos</button>
    <button class="nav-link" id="nav-comprados-tab" data-bs-toggle="tab" data-bs-target="#nav-comprados" type="button" role="tab" aria-controls="nav-comprados" aria-selected="false">Por Usuario</button>
    <button class="nav-link" id="nav-pedido-tab" data-bs-toggle="tab" data-bs-target="#nav-pedido" type="button" role="tab" aria-controls="nav-pedido" aria-selected="false">Por Pedido</button>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <div class="row" v-for="(producto,index) in this.$store.state.productos" :key="index">
      <div class="col text-center border">
        <p>id:{{ producto.id }}</p> 
      </div>
      <div class="col text-center border">
        <p>nombre: {{ producto.nombre }}</p> 
      </div>
      <div class="col text-center border">
        <p>descripcion: {{ producto.descripcion }}</p> 
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="nav-comprados" role="tabpanel" aria-labelledby="nav-comprados-tab">
    <select class="w-50"  @change="mostrarPorUsuario($event)">
      <option></option>
        <option class="row" v-for="(user,index) in this.$store.state.users" :key="index" :value="user.id">
            {{ user.name }}
        </option>
    </select>
    <div class="row" v-for="(producto,index) in this.$store.state.productos" :key="index">
      <div class="col text-center border">
        <p>id:{{ producto.id }}</p> 
      </div>
      <div class="col text-center border">
        <p>nombre: {{ producto.nombre }}</p> 
      </div>
      <div class="col text-center border">
        <p>descripcion: {{ producto.descripcion }}</p> 
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="nav-pedido" role="tabpanel" aria-labelledby="nav-pedido-tab">
    <select class="w-50"  @change="mostrarPorPedido($event)">
        <option></option>
        <option class="row" v-for="(compras,index) in this.$store.state.compras" :key="index" :value="compras.id">
            {{ compras.nombre }}
        </option>
    </select>
    <div class="row" v-for="(producto,index) in this.$store.state.productos" :key="index">
      <div class="col text-center border">
        <p>id:{{ producto.id }}</p> 
      </div>
      <div class="col text-center border">
        <p>nombre: {{ producto.nombre }}</p> 
      </div>
      <div class="col text-center border">
        <p>descripcion: {{ producto.descripcion }}</p> 
      </div>
    </div>
  </div>
  <productosForm></productosForm>
  <productosActualizarForm></productosActualizarForm>
</div>
</template>

<script>
// @ is an alias to /src
import productosForm from '../components/productosForm.vue';
import productosActualizarForm from '../components/productosActualizarForm.vue';
export default {
  name: 'ProductoView',
  methods:{
      mostrarPorPedido(event)
      {
        event.target.value ? this.$store.dispatch('cargarProductoPorPedido',event.target.value):null;
      },
      mostrarPorUsuario(event)
      {
        event.target.value ? this.$store.dispatch('cargarProductosCompradosPorUsuario',event.target.value):null;
      }
  },
  components:
  {
    'productosForm' : productosForm,
    'productosActualizarForm' : productosActualizarForm
  },
  beforeCreate(){
    this.$store.dispatch('modificarProductos');
  }
}
</script>
