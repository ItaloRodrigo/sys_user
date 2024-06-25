<template>
  <base-layout titlecard="Usuários">
    <v-container>
      <h1>Usuários</h1>

      <v-card flat class="border mt-3">
        <v-card-item >
          <v-text-field prepend-icon="mdi-searchmdi mdi-magnify" v-model="pesquisar" @keyup.enter="onEnterPesquisar" clearable label="Pesquisar" outlined></v-text-field>
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
            </v-row>
            <v-div v-for="usuario,index in usuarios" :key="index">

              <ItemUsuario :usuario="usuario"/>
            </v-div>


            <Tarefa/>
            <Tarefa/>
          </v-list>



          <!-- <v-table density="compact" fixed-header>
            <thead>
              <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ativo</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Fulano</td>
                <td>fulano@gmail.com</td>
                <td>
                  <v-chip color="success">
                    Sim
                  </v-chip>
                </td>
                <td>
                  <v-btn icon="mdi-pencil" color="warning" @click="editUser(1)" size="small"></v-btn>
                </td>
                <td>
                  <v-btn icon="mdi-delete" color="red" size="small"></v-btn>
                </td>
              </tr>
            </tbody>
          </v-table> -->
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


export default {
  components: { BaseLayout },
  name: "Usuarios",
  data() {
    return {
      pesquisar: null,
      usuarios:[
        {id:1, nome:"teste1", email:"teste@gmail.com", status:true},
        {id:2, nome:"teste2", email:"teste@gmail.com", status:true},
        {id:3, nome:"teste3", email:"teste@gmail.com", status:false},
        {id:4, nome:"teste4", email:"teste@gmail.com", status:true},
      ],
    }
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

    onEnterPesquisar(){
      console.log(this.pesquisar);
    }


  }
}
</script>
