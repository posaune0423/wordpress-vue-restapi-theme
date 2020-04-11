<template>
  <div class="loading">
    <vue-loading type="spin" color="#333" :size="{ width: '60px', height: '60px' }"></vue-loading>
  </div>
</template>

<script>
import { VueLoading } from 'vue-loading-template'

export default {
  name: 'Loader',

  components: {
    VueLoading
  }
}
</script>

<style scoped>
@media(min-width: 970px) {
  .loading {
    text-align:center;
    margin:140px;
    padding:128px;
  }
}

@media(max-width: 970px) {
  .loading {
    padding-top: 290px;
    padding-bottom: 380px;
  }
}
</style>
