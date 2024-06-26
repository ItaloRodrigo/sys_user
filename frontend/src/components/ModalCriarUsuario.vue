<template>

  <v-div>
    <v-dialog v-model="dialog" max-width="600" persistent>
      <v-card prepend-icon="mdi mdi-account" title="Criar Usuário">
        <v-card-item>
          <v-row>
            <v-col cols="12">
              <v-text-field
                v-model="this.name"
                :rules="nameRules"
                label="Nome completo"
                required>
              </v-text-field>
            </v-col>

            <v-col cols="12">
              <v-text-field
                v-model="this.email"
                :rules="emailRules"
                label="E-mail"
                required>
              </v-text-field>
            </v-col>

            <v-col cols="12">
              <v-text-field
                v-model="this.cpf"
                :counter="14"
                :rules="cpfRules"
                label="CPF"
                v-mask="'###.###.###-##'"
                required>
              </v-text-field>
            </v-col>

            <v-col cols="12">
              <v-text-field
                v-model="this.password"
                :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                :rules="passwordRules"
                :type="show1 ? 'text' : 'password'"
                class="input-group--focused"
                hint="At least 8 characters"
                label="Senha"
                name="input-10-1"
                @click:append="show1 = !show1"
            ></v-text-field>
            </v-col>

            <!-- <v-col cols="12">
              <v-text-field
                v-model="this.password_confirm"
                :counter="14"
                :rules="password_confirmRules"
                label="Confirme a Senha"
                required>
              </v-text-field>
            </v-col> -->

            <v-col cols="12">
              <v-text-field
                v-model="this.password_confirm"
                :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                :rules="password_confirmRules"
                :type="show2 ? 'text' : 'password'"
                class="input-group--focused"
                label="Confirme a Senha"
                name="input-10-2"
                @click:append="show2 = !show2"
            ></v-text-field>
            </v-col>

          </v-row>
        </v-card-item>
        <template v-slot:actions>
          <v-spacer></v-spacer>

          <!-- <v-btn @click="dialog = false"> -->
          <v-btn @click="$emit('closeModal')">
            Cancelar
          </v-btn>

          <v-btn @click="salvar()">
            Salvar
          </v-btn>
        </template>
      </v-card>
    </v-dialog>
         <!-- Elemento de notificação -->
         <!-- <NotificationDefault ref="notificationAddRef" /> -->
  </v-div>

</template>

<script>

import axios from 'axios';
import { useNotificationsStore } from '@/stores/notifications';

export default {

  name: 'ModalCriarUsuario',

  emits: ['closeModal'],

  data() {
    return {
      dialog: true,
      name:'',
      email:'',
      cpf:'',
      password:'',
      password_confirm:'',
      show1: false,
      show2: false,
      erros:null,
      // ------------------ validações
      nameRules: [
        value => {
          if(value) return true;

          return "O nome é obrigatório!";
        }
      ],
      emailRules: [
        value => {
          if (value) return true

          return 'E-mail é obrigatório'
        },
        value => {
          if (/.+@.+\..+/.test(value)) return true

          return 'E-mail é inválido!'
        },
      ],
      passwordRules: [
        value => {
          if (value) return true

          return 'Senha é obrigatório'
        },
      ],
      password_confirmRules: [
        value => {
          if (value) return true

          return 'Senha é obrigatório'
        },
        value => {
          if (value == this.password) return true

          return 'As senhas não correspondem'
        },
      ],
    };
  },

  methods:{
    salvar(){
      this.erros=null;
      axios.post("user/create",{
        name: this.name,
        email: this.email,
        cpf: this.cpf,
        password: this.password,
        password_confirm: this.password_confirm
      })
        .then((response) => {
          console.log(response.data.erros);
          this.erros = response.data.erros;

      });

      const notification = {
            type: 'error',
            title: 'Erro: criar usuário ',
            message: this.erros
          };
      //---
      useNotificationsStore().showNotification(notification);
      this.$refs.notificationRef.addNotification(useNotificationsStore().notification);
      useNotificationsStore().clearNotification();

      //---
      this.$emit('closeModal');
    }
  }
}

</script>
