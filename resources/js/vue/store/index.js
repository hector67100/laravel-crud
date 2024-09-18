import axios from 'axios'
import { createStore } from 'vuex'
import { toRaw } from 'vue';

const url = 'http://laravelcrud.test';

export default createStore({
  state: {
    compras:[],
    productos:[],
    pedido:[],
    users:[],
    token:''
  },
  getters: {
    contandorDoble(state)
    {
      return state.contador * state.contador
    }
  },
  mutations: {
    modificarCompras(state,valor)
    {
      state.compras = toRaw(valor)
    },
    modificarUsers(state,valor)
    {
      state.users = toRaw(valor)
    },
    modificarProductos(state,valor)
    {
      state.productos = toRaw(valor)
    },
    modificarToken(state,valor)
    {
      state.token = valor
    }
  },
  actions: {
    init({commit})
    {
      axios(url+'/token').then(response => {
        commit('modificarToken',response.data)
      })
      axios(url+'/productos').then(response => {
        commit('modificarProductos',response.data.products)
      })
      axios(url+'/compras').then(response => {
        commit('modificarCompras',response.data.compra)
      })
      axios(url+'/users').then(response => {
        commit('modificarUsers',response.data.user)
      })
    },
    cargarToken({commit},context,valor)
    {
      axios(url+'/token').then(response => {
        commit('modificarToken',response.data)
      })
    },
    modificarProductos({commit},context,valor)
    {
      axios(url+'/productos').then(response => {
        commit('modificarProductos',response.data.products)
      })
    },
    modificarCompras({commit},context,valor)
    {
      axios(url+'/compras').then(response => {
        commit('modificarCompras',response.data.compra)
      })
    },
    modificarUsers({commit},context,valor)
    {
      axios(url+'/users').then(response => {
        commit('modificarUsers',response.data.user)
      })
    },
    agregarProducto({commit,state},valor)
    {
        axios.post(url+'/producto/CrearProducto',valor, {headers:{'X-CSRF-TOKEN' : state.token}}).then(response => {
          alert(response.data);
          axios(url+'/productos').then(response => {
            commit('modificarProductos',response.data.products)
          })
        })
    },
    agregarCompra({commit,state},valor)
    {
      axios.post(url+'/compra/CrearComprar',valor, {headers:{'X-CSRF-TOKEN' : state.token}}).then(response => {
        alert(response.data);
        axios(url+'/compras').then(response => {
          commit('modificarCompras',response.data.user)
        })
      })
    },
    agregarUsuario({commit,state},valor)
    {
      axios.post(url+'/users/CrearUser',valor, {headers:{'X-CSRF-TOKEN' : state.token}}).then(response => {
        alert(response.data);
        axios(url+'/users').then(response => {
          commit('modificarUsers',response.data.user)
        })
      })
    },
    cargarProductosCompradosPorUsuario({commit,state},valor)
    {
      axios(url+'/compra/productosCompradosPorUsuario/'+valor).then(response => {
        let productosActualizados = [];
        response.data.compra.map((data) => {
          data.id.map((productos) => {
           productos.producto_id.map((producto) => {
            productosActualizados.push(producto);
           })
          })
        })
        commit('modificarProductos',productosActualizados)
      })
    },
    cargarUsuariosConCompra({commit,state},valor)
    {
      axios(url+'/compra/usuariosConCompras/').then(response => {
        console.log(response.data);
        let usuariosActualizados = [];
        response.data.compra.map((data) => {
          usuariosActualizados.push(data.user_id);
        })
        commit('modificarUsers',usuariosActualizados)
      })
    },
    cargarProductoPorPedido({commit,state},valor)
    {
      axios(url+'/producto/getProductosPorPedido/'+valor).then(response => {
        let productosActualizados = [];
        response.data.Pedido.map((data) => {
          data.producto_id.map((productos) => {
            productosActualizados.push(productos);
          })
        })
        commit('modificarProductos',productosActualizados)
      })
    },
    actualizarProducto({commit,state},valor)
    {
        axios.put(url+'/producto/update/'+valor.id,valor, {headers:{'X-CSRF-TOKEN' : state.token}}).then(response => {
          alert(response.data);
          axios(url+'/productos').then(response => {
            commit('modificarProductos',response.data.products)
          })
        })
    },
  },
  modules: {
  }
})
