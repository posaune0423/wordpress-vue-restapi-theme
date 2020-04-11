<template>
  <div>
    <template v-if="post">
      <div class="news-detail">
        <h2 class="detail-title"> {{ post.title.rendered }}</h2>
        <div class="detail-meta">
          <span class="news-tag">{{ post.category_name }}</span>
          <span class="news-date">{{ post.date }}</span>
        </div>
        <div class="news-img">
          <img :src="post.featured_image.src" alt="news-img">
        </div>
        <div class="news-desc">
          <p v-html="post.content.rendered"></p>
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
      post: false
    };
  },
  computed: {},
  beforeMount() {
    this.getPost();
  },
  methods: {
    getPost: function () {
      axios.get(SETTINGS.API_BASE_PATH + "posts?slug=" + this.$route.params.postSlug).then(response => {
          this.post = response.data[0];
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

.news-container {
    width: 80%;
}

.news-detail {
  margin-right: auto;
  margin-left: auto;
}

.news-img img {
    margin: 0 auto;
}

.news-tag {
    font-size: 12px;
    padding: 3px;
    border-radius: 6px;
    background-color: coral;
}

.news-detail-wrap {
    margin: auto 20px;
}


.detail-title {
    margin-right: 10px;
    margin-left: 10px;
    font-size: 30px;
}

.news-desc {
    margin-top: 20px;
}

.detail-meta {
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: right;
}

@media(min-width: 970px) {

  .detail-meta {
    margin-right: 200px;
    margin-bottom: 20px;
  }

  .news-detail {
    width: 60%;
    padding: 60px;
  }

  .news-desc {
    margin-left: 10px;
    padding-left: 50px;
  }

  .news-img {
    width: 80%;
}
.news-img img {
    width: 80%;
    }
}

@media(max-width: 970px) {

  .detail-meta {
    margin-right: 20px;
  }

  .news-detail {
    padding-top:30px;
    padding-bottom: 30px;
  }
  .news-desc {
    margin: 20px 20px;
  }
}

</style>