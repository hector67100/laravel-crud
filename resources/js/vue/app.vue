<template>
    <nav class="d-flex">
      <router-link to="/" class="m-auto d-block w-25 border text-center">Home</router-link> 
      <router-link to="/user" class="m-auto d-block w-25 border text-center">Usuario</router-link>
      <router-link to="/producto" class="m-auto d-block w-25 border text-center">Producto</router-link>
      <router-link to="/Compra" class="m-auto d-block w-25 border text-center">Compra</router-link>
    </nav>
    <router-view/>
  </template>