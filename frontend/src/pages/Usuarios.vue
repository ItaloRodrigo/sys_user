<template>
  <base-layout titlecard="Usuários">
    <v-container>
      <h1>Usuários</h1>

      <v-card flat class="border mt-3">
        <v-card-item >
          <template v-slot:append>
            <v-btn class="primary" @click="chamaModalCriarUsuario()">Adicionar Usuário</v-btn>
            <ModalCriarUsuario v-if="this.modalCriarUsuario" @closeModal="this.modalCriarUsuario = false" />
          </template>
          <!-- <v-text-field prepend-icon="mdi-searchmdi mdi-magnify" v-model="pesquisar" @keyup.enter="onEnterPesquisar" clearable label="Pesquisar" outlined></v-text-field> -->
        </v-card-item>

        <v-card-item class="">
          <v-list lines="one" select-strategy="classic" >
            <v-row no-gutters class="border-b">
              <v-col>
                <v-sheet class="pa-2 ma-2">
                  <v-list-item-subtitle>Nome</v-list-item-subtitle>

                </v-sheet>
              </v-col>
              <v-col>
                <v-sheet class="pa-2 ma-2">
                  <v-list-item-subtitle>Email</v-list-item-subtitle>
                </v-sheet>
              </v-col>
              <v-col>
                <v-sheet class="pa-2 ma-2">
                  <v-list-item-subtitle>CPF</v-list-item-subtitle>
                </v-sheet>
              </v-col>
            </v-row>
            <v-div v-for="usuario,index in usuarios" :key="index">

              <ItemUsuario :usuario="usuario" @click="onSelected(this)"/>
            </v-div>


            <Tarefa/>
            <Tarefa/>
          </v-list>
        </v-card-item>

      </v-card>

      <!-- Elemento de notificação -->
    <NotificationDefault ref="notificationRef" />

    </v-container>

  </base-layout>
</template>

<script>
import BaseLayout from '../layouts/BaseLayout.vue';
import { useNotificationsStore } from '@/stores/notifications';
import NotificationDefault from '@/components/NotificationDefault.vue';
import ItemUsuario from '@/components/ItemUsuario.vue';
import ModalCriarUsuario from '@/components/ModalCriarUsuario.vue'

import axios from 'axios';


export default {
  components: { BaseLayout, NotificationDefault, ItemUsuario, ModalCriarUsuario },
  name: "Usuarios",

  data() {
    return {
      pesquisar: null,
      modalCriarUsuario:false,
      usuarios:[
        {id:1, name:"teste1", email:"teste@gmail.com", cpf:"xxx.xxx.xxx-xx", status:true},
      ],
    }
  },

  created(){
    axios.get("user/all")
      .then((response) => {
        this.usuarios = [];
        response.data.user.forEach(data => {
          this.usuarios.push(data);
        });
        // console.log(response.data)
      })
  },

  updated(){
    console.log("apareceu")
    axios.get("user/all")
      .then((response) => {
        this.usuarios = [];
        response.data.user.forEach(data => {
          this.usuarios.push(data);
        });
        // console.log(response.data)
      })
  },

  methods:{
    editUser(id){
      const notification = {
          type: 'error',
          title: 'titulo '+id,
          message: 'testando 1,2,3'
      };
      //---
      useNotificationsStore().showNotification(notification);
      this.$refs.notificationRef.addNotification(useNotificationsStore().notification);
      useNotificationsStore().clearNotification();
    },

    chamaModalCriarUsuario(){
      this.modalCriarUsuario = true;
    },

    onEnterPesquisar(){
      console.log(this.pesquisar);
    },

    onSelected(usuario){
      console.log(usuario);
      // this.selectedUsuarios.push(usuario);
      // console.log(this.selectedUsuarios.includes(usuario));
      // console.log("all")
      // console.log(this.selectedUsuarios);
    }


  }
}
</script>
