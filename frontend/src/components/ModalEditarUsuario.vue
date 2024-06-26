<template>

  <v-div>
    <v-dialog v-model="dialog" max-width="600" persistent>
      <v-card prepend-icon="mdi-pencil" title="Alterar Usuário">
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
  </v-div>

</template>

<script>

import axios from 'axios';

export default {
  name: 'ModalEditarUsuario',

  emits: ['closeModal'],

  props: {
    usuario: null
  },

  data() {
    return {
      dialog: true,
      name:'',
      email:'',
      cpf:'',
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
      ]
    };
  },

  created(){
    this.name = this.usuario.name;
    this.email = this.usuario.email;
    this.cpf = this.usuario.cpf;
  },

  methods:{
    salvar(){
      // this.axios.get('')

      //---
      this.$emit('closeModal');
    }
  }
}

</script>
