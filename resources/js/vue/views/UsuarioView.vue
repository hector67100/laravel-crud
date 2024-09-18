<template>
    <h1 class="text-center m-4">Usuario</h1>
    <nav class="w-100">
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Usuarios</button>
        <button class="nav-link" id="nav-comprados-tab" data-bs-toggle="tab" data-bs-target="#nav-comprados" type="button" role="tab" aria-controls="nav-comprados" aria-selected="false" @click="cargarUsuariosConCompra()">Usuarios Con Compras</button>
      </div>
    </nav>
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <div class="row" v-for="(user,index) in this.$store.state.users" :key="index">
        <div class="col text-center border">
          <p>id:{{ user.id }}</p> 
        </div>
        <div class="col text-center border">
          <p>nombre: {{ user.name }}</p> 
        </div>
        <div class="col text-center border">
          <p>email: {{ user.email }}</p> 
        </div>
      </div>
  </div>
  <div class="tab-pane fade" id="nav-comprados" role="tabpanel" aria-labelledby="nav-comprados-tab">
    <div class="row" v-for="(user,index) in this.$store.state.users" :key="index">
        <div class="col text-center border">
          <p>id:{{ user.id }}</p> 
        </div>
        <div class="col text-center border">
          <p>nombre: {{ user.name }}</p> 
        </div>
        <div class="col text-center border">
          <p>email: {{ user.email }}</p> 
        </div>
      </div>
  </div>
      <usuariosForm></usuariosForm>
  </template>
  
  <script>
  // @ is an alias to /src
  import usuariosForm from '../components/usuariosForm.vue';
  export default {
    name: 'UsuarioView',
    methods:{
      cargarUsuariosConCompra()
      {
        this.$store.dispatch('cargarUsuariosConCompra');
      },
  },
    components:
    {
      'usuariosForm' : usuariosForm
    },
    beforeCreate(){
      this.$store.dispatch('modificarUsers');
    }
  }
  </script>
  