<template>
  <div class="widget recent-posts">

      <div v-if="recentPostsLoaded" class="news-wrap">
          <div v-for="post in recentPosts(limit)" :key="post.id" class="news-container">
              <router-link :to="post.slug">
                  <div class="news-head">
                      <h4>{{ post.title.rendered }}</h4>
                  </div>
                  <div class="news-img">
                      <img :src="post.featured_image.src" alt="news-img">
                  </div>
                  <div class="news-desc" >
                      <div class="news-meta">
                        <span class="news-tag">{{ post.category_name }}</span>
                        <span class="news-date">{{ post.date }}</span>
                      </div>
                      <p v-html="post.excerpt.rendered"></p>
                  </div>
              </router-link>
          </div>
      </div>

      <Loader v-else />

  </div>
</template>

<script>
import { mapGetters } from 'vuex';
import Loader from "../partials/Loader.vue";

export default {
  props: ['limit'],
  components: { Loader },
  computed: {
    ...mapGetters({
      recentPosts: 'recentPosts',
      recentPostsLoaded: 'recentPostsLoaded',
    }),
  },

  methods: {
    getAuthor(post) {
      console.log(post);
    },
  },

  mounted() {
    this.$store.dispatch('getPosts', { limit: this.limit });
  },
};
</script>

<style scoped>
.news-wrap {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

  .news-container {
    width: 300px;
    height: fit-content;
    padding-right: 16px;
    padding-left: 16px;
    padding-top: 10px;
    padding-bottom: 10px;
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

  .news-meta {
    margin-top: 10px;
    margin-bottom: 10px;
    font-size: 12px;
  }

  .news-tag {
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
    margin: 0 auto;
    object-fit: cover;
  }

  @media(min-width: 970px) {
    .news-img img {
      width: 200px;
      height: 200px;
    }
    .news-wrap {
      margin-left: 30px;
      margin-right: 30px;
      padding: 0 100px;
    }
  }

  @media(max-width: 970px) {
    .news-img img {
      width: 250px;
      height: 250px;
    }
  }
</style>
