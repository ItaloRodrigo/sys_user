<template>

  <v-div>
    <v-dialog v-model="dialog" max-width="400" persistent>
      <!-- <template v-slot:activator="{ props: activatorProps }">
        <v-btn v-bind="activatorProps">
          Open Dialog
        </v-btn>
      </template> -->

      <v-card prepend-icon="mdi-map-marker">
        <span>
          {{ this.usuario.nome}}
        </span>
        <template v-slot:actions>
          <v-spacer></v-spacer>

          <!-- <v-btn @click="dialog = false"> -->
          <v-btn @click="$emit('closeModal')">
            Cancelar
          </v-btn>

          <v-btn @click="dialog = false">
            Salvar
          </v-btn>
        </template>
      </v-card>
    </v-dialog>
  </v-div>

</template>

<script>

export default {
  name: 'ModalEditar',

  props: {
    usuario:null
  },

  data() {
    return {
      dialog: true,
    };
  },
}

</script>
