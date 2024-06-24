<template>
  <v-card>
    <v-layout>
      <v-app-bar color="primary" prominent>
        <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

        <v-toolbar-title >{{titlecard}} </v-toolbar-title>

        <v-spacer></v-spacer>

        <template v-if="$vuetify.display.mdAndUp">
          <v-btn icon="mdi-magnify" variant="text"></v-btn>

          <!-- <v-btn icon="mdi-filter" variant="text"></v-btn> -->
        </template>

        <v-btn icon="mdi-dots-vertical" variant="text" >

        </v-btn>
      </v-app-bar>

      <v-navigation-drawer
        v-model="drawer"
        :location="$vuetify.display.mobile ? 'bottom' : undefined"
        temporary
      >
        <v-list>
          <v-list-subheader>
            Menu
          </v-list-subheader>
          <v-list-item v-for="item in items" :key="item.value" :title="item.title" :prepend-icon="item.icon" :value="item.value" :to="item.to" link>
          </v-list-item>
        </v-list>

      </v-navigation-drawer>

      <v-main>
        <slot ></slot>
      </v-main>
    </v-layout>
  </v-card>
</template>

<script>
  import { ref } from 'vue';

  export default {
    name: "BaseLayout",
    props: ['titlecard'],
    data: () => ({
      drawer: false,
      group: null,
      items: [
        {
          title: 'Home',
          value: 'foo',
          icon: "mdi-home",
          to:"/"
        },
        {
          title: 'Usuários',
          value: 'bar',
          icon: 'mdi-account',
          to:"/users"
        },
      ],
    }),

    watch: {
      group () {
        this.drawer = false
      },
    },
  }
</script>
