<template>
  <div>
      <h1 class="section-heading">Our Concerts</h1>
      <ConcertsList limit="6" isList="true"/>
  </div>
</template>

<script>
import ConcertsList from './partials/ConcertsList'

export default {
  name: 'Concerts',
  components: {
    ConcertsList
  }
}
</script>

<style scoped>
.posts-wrap {
  flex-wrap: wrap;
}
</style>