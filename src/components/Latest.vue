<template>
    <div>
        <h1 class="section-heading">The Latest</h1>
        <PostsList limit="6" />
    </div>
</template>

<script>
import PostsList from './partials/PostsList'

export default {
    components: {
      PostsList
    }
}
</script>

<style scoped>
.news-wrap {
  display: flex;
  margin-left: 30px;
  margin-right: 30px;
  justify-content: space-around;
  flex-wrap: wrap;
  padding: 0 70px;
}

  .news-container {
    width: 300px;
    height: fit-content;
    padding-right: 16px;
    padding-left: 16px;
    padding-top: 10px;
    padding-bottom: 10px;
    margin-right: 20px;
    margin-bottom: 20px;
  }

  .news-container p {
    font-size: 12px;
  }

  .news-container:hover {
    opacity: .8;
    box-shadow: 0 3px 3px -2px rgba(0, 0, 0, .2),
      0 3px 4px 0 rgba(0, 0, 0, .14),
      0 1px 8px 0 rgba(0, 0, 0, .12)
  }

  .news-desc {
    margin-left: 25px;
  }

  .news-tag {
    margin-top: 10px;
  }

  .news-tag span {
    font-size: 12px;
    padding: 3px;
    border-radius: 6px;
    background-color: coral;
  }

  .news-head {
    text-align: center;
    padding-top: 10px;
    padding-bottom: 10px;
  }

  .news-img img {
    width: 200px;
    height: 200px;
    margin: 0 auto;
    object-fit: cover;
  }
</style>