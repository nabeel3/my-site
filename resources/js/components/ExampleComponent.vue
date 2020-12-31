<template>
  <div>
    <v-container>
     <v-alert type ="info">Im a vues </v-alert>
     <v-btn herf="/fo">
     </v-btn>

<v-list-item :href="foo" target="_blank">sdhjf</v-list-item>
    </v-container>
    <v-content>
      <router-view></router-view>
    </v-content>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
