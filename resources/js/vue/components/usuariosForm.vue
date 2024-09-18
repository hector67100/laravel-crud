<template>
    <form class="row flex-column w-50 m-auto mt-3">
      <h2 class="text-center">Agregar Usuario</h2>
      <div class="col m-1">
        <input class="m-auto d-block border" type="text" v-model="nombre" placeholder="nombre" required>
      </div>
      <div class="col m-1">
        <input class="m-auto d-block border" type="email" v-model="email" placeholder="email" required>
      </div>
      <div class="col m-1">
        <input class="m-auto d-block border" type="email" v-model="conemail" placeholder="confirm email" required>
      </div>
      <div class="col m-1">
        <input class="m-auto d-block border" type="password" v-model="password" placeholder="password" required>
      </div>
      <div class="col m-1">
        <input class="m-auto d-block border" type="password" v-model="conpass" placeholder="confirmar password" required>
      </div>
      <div class="col m-1">
        <button class="m-auto d-block border btn btn-dark" @click="mostrar()">agregar Usuario</button>
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
        email:'',
        password:'',
        conemail:'',
        conpass:'',
      };
    },
    methods:{
      mostrar()
      {
        let data = {
            name:this.nombre,
            email:this.email,
            email_verified_at:this.conemail,
            password:this.password,
        }
        this.$store.dispatch('agregarUsuario', data);
        this.$store.dispatch('modificarUsers');
      }
    }
  }
  </script>
