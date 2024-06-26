<template>

  <v-div>
    <v-menu>
      <template v-slot:activator="{ props }">
        <v-btn color="primary" v-bind="props" icon>
          <v-icon>mdi mdi-dots-vertical</v-icon>
        </v-btn>
      </template>
      <v-list>
        <v-list-item v-for="(item, index) in items" :key="index" :value="index" @click="item.click()">
          <template v-slot:prepend>
            <v-icon :icon="item.icon"></v-icon>
          </template>
          <v-list-item-title>{{ item.title }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
    <ModalEditarUsuario v-if="items[0].modal" @closeModal="items[0].modal = false" :usuario="this.usuario" />
  </v-div>

</template>

<script>

import ModalEditarUsuario from './ModalEditarUsuario.vue';

export default {
  name: 'DropdowmMenu',

  props: {
    usuario: null
  },

  data() {
    return {
      items: [
        { icon: "mdi mdi-pencil", title: 'Editar', modal:false, click(){
          console.log("Editar");
          this.modal = true;
        } },
        { icon: "mdi mdi-delete", title: 'Deletar', click(){
          console.log("Deletar");
        } },
      ],
    };
  },

  methods:{
    teste(){

    }
  }
}

</script>
