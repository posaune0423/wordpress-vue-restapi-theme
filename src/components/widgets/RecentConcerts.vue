<template>
  <div v-if="concerts" class="widget recent-posts posts-wrap">
      <div v-for="concert in concerts[0]" :key="concert.id" class="post-container">
          <router-link :to="concert.slug">
            <div class="post-head">
              <h3 style="font-size:20px;">{{ concert.title.rendered }}</h3>
            </div>
            <div class="post-img">
              <img :src="concert._embedded['wp:featuredmedia'][0].source_url" alt="post-img">
            </div>
          </router-link>
      </div>
  </div>

  <Loader v-else />

</template>

<script>
import Loader from "../partials/Loader";
import axios from "axios";
import SETTINGS from "../../settings";

export default {
  name: 'RecentConcerts',
  props: ['limit'],
  components: {
      Loader
    },
  data() {
    return {
      concerts: []
    }
  },

  beforeMount() {
      this.getConcert(this.limit);
    },

  methods: {
      getConcert(limit) {
        axios.get(SETTINGS.API_BASE_PATH + 'concerts/?_embed&per_page=' + this.limit,
                 { auth : { username : SETTINGS.BASIC_AUTH_API_USER_NAME, password : SETTINGS.BASIC_AUTH_API_PASSWORD } })
          .then((response) => {
            console.log(response);
            this.$set(this.concerts, 0, response.data);
          }).catch(e => {
            console.log(e);
          });
      },
  },


};
</script>

<style scoped>
  .post-container {
    padding-top: 10px;
    padding-bottom: 24px;
    margin-bottom: 30px;
  }

  .posts-wrap {
    display: flex;
    justify-content: space-around;
  }

  .post-head {
    padding-left: 30px;
    margin-top: 10px;
    margin-bottom: 10px;
  }

  .post-container:hover {
    opacity: .8;
    box-shadow: 0 3px 3px -2px rgba(0, 0, 0, .2),
      0 3px 4px 0 rgba(0, 0, 0, .14),
      0 1px 8px 0 rgba(0, 0, 0, .12)
  }

  .post-img {
    margin: 0 auto;
  }

  .post-img img {
    width: 100%;
  }

  @media(min-width: 970px) {
    .post-container {
      width: 350px;
      margin-right: 20px;
      padding-right: 20px;
      padding-left: 20px;
    }
    .posts-wrap {
      margin-left: 10px;
      margin-right: 10px;
    }
  }

  @media(max-width: 970px) {
    .posts-wrap {
      flex-direction: column;
    }
    .post-container {
      margin: 0 auto;
      width: 90%;
      /* margin-right: 20px; */
      /* margin-left: 20px; */
    }
  }

</style>
