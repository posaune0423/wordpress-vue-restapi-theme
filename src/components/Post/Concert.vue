<template>
  <div class="concerts-container">
    <template v-if="concert">
      <div class="concert-wrap">
        <h2 class="concert-title">{{ concert.title.rendered }}</h2>
        <div class="concert-img">
          <img :src="concert._embedded['wp:featuredmedia'][0].source_url" alt="concert-img">
        </div>
        <div class="concert-desc">
          <p v-html="concert.content.rendered"></p>
        </div>
      </div>
    </template>
    <Loader v-else />
  </div>
</template>

  <script>
import axios from "axios";
import Loader from "../partials/Loader.vue";

import { mapGetters } from "vuex";
import SETTINGS from "../../settings";

export default {
  data() {
    return {
      concert: false
    };
  },
  beforeMount() {
    this.getConcert();
  },
  methods: {
    getConcert: function () {
      axios.get(SETTINGS.API_BASE_PATH + "concerts?_embed&slug=" + this.$route.params.concertSlug).then(response => {
          this.concert = response.data[0];
        }).catch(e => {
          console.log(e);
        });
    }
  },
  components: {
    Loader
  }};
</script>

<style scoped>

.concerts-container {
  margin-right: auto;
  margin-left: auto;
}

.concert-img img {
  margin:0 auto;
  width:60%;
}

.concert-desc {
  margin-top:30px;
  margin-bottom:30px;
  padding-left:50px;
  padding-right:50px;
}

@media(min-width: 970px) {
  .concert-wrap {
    width: 60%;
    margin: 0 auto;
    padding-top: 40px;
  }
  .concert-title {
    font-size: 30px;
    margin-top:50px;
    margin-bottom:40px;
    margin-left:10px;
    padding-left:30px;
  }
  .concert-img {
    width:80%;
    margin-right: 100px;
    margin-left: 100px;
    margin-top:10px;
  }
}

@media(max-width: 970px) {
  .concert-title {
    font-size: 30px;
    margin-bottom:40px;
    margin-left:10px;
    padding-left:30px;
  }

  .concert-wrap {
    padding-top: 40px;
  }
}
</style>