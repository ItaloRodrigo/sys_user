<template>
  <base-layout titlecard="Usuários">
    <v-container>
      <h1>Usuários</h1>

    </v-container>

  </base-layout>
</template>

<script>
import BaseLayout from '../layouts/BaseLayout.vue'
export default {
  components: { BaseLayout },
  name: "Usuarios",
  data(){
    return {
      // counter: this.$auth.getCounter
    }
  }
}
</script>
