<template>
  <base-layout titlecard="Dashboard">
    <h1>Dashboard</h1>
  </base-layout>
</template>

<script>
import BaseLayout from '../layouts/BaseLayout.vue'
export default {
  components: { BaseLayout },
  name: "Dashboard",
  data(){
    return {
      // counter: this.$auth.getCounter
    }
  }
}
</script>
