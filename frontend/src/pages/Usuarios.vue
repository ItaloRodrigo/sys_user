<template>
  <base-layout titlecard="Usuários">
    <v-container>
      <h1>Usuários</h1>

      <v-card flat class="border my-3">
        <v-table density="compact" >
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
        </v-table>
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


export default {
  components: { BaseLayout },
  name: "Usuarios",
  data() {
    return {
      // counter: this.$auth.getCounter
    }
  },

  methods:{
    editUser(id){
      const notification = {
          type: 'error',
          title: 'titulo '+id,
          message: 'testando 1,2,3'
      };


      useNotificationsStore().showNotification(notification);
      this.$refs.notificationRef.addNotification(useNotificationsStore().notification);
      useNotificationsStore().clearNotification();
    }


  }
}
</script>
