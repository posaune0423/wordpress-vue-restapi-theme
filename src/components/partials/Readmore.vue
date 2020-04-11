<template>
  <div class="readmore">
    <router-link :to="url">
      <span>
        More
      </span>
    </router-link>
    </div>
</template>

<script>
export default {
    props: ['url']
}
</script>

<style scoped>
.readmore {
  text-align: center;
  padding: 30px;
}

.readmore span {
  background-color: rgb(119, 110, 110);
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 20px;
  padding-right: 20px;
}

.readmore a {
  color: #fff;
}

</style>
