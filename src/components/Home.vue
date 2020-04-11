<template>
  <div class="home">

    <div class="hero-panel">
      <video src="wp-content/themes/vuejs-wordpress-theme-starter/src/assets/img/AGO.mp4" muted="muted" loop
        autoplay="true" id="bg-video"></video>
      <div class="video-wrap">
        <h1>Welcome to our House</h1>
        <p>A place to take in a spectacular horizon, then broaden your own.</p>
      </div>
    </div>
    <h2 class="section-heading">Concerts</h2>

  <ConcertsList limit="3" isTop="true" />

  <ReadMore url="concerts" />

  <h2 class="section-heading">The latest</h2>

  <PostsList limit="3" isTop="true" />

  <ReadMore url="/latest" />

  <h2 class="section-heading">Our Performance</h2>

  <Video />

  </div>
</template>

<script>
  import ReadMore from './partials/ReadMore'
  import ConcertsList from './partials/ConcertsList';
  import PostsList from './partials/PostsList';
  import Video from './partials/Video.vue';

  export default {
    name: 'Home',
    components: {
      ReadMore,
      PostsList,
      ConcertsList,
      Video
    },
  };
</script>

<style scoped>
  .section-heading {
    color: #454545;
    font-size: 30px;
    font-family: "Raleway", sans-serif;
    font-weight: 100;
    display: inline-block;
    padding: 4px 32px;
    margin-top: 20px;
    margin-bottom: 20px;
  }

  /* News */

  .news-container {
    width: 300px;
    height: fit-content;
    padding-right: 16px;
    padding-left: 16px;
    padding-top: 10px;
    padding-bottom: 10px;
    margin-right: 20px;
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
  }

/* Video */

#bg-video {
    min-width: 100%;
    min-height: 100%;
    width: 100%;
    background-size: cover;
}

.video-wrap h1 {
    font-weight: 900;
    padding: 0 27px;
}

.video-wrap p {
    font-weight: bold;
    padding: 0 27px;
}



@media(min-width:1268px) {
    .video-wrap h1 {
        color: #fff;
        font-size: 125px;
    }

    .video-wrap p {
        color: #fff;
        font-size: 35px;
    }
}

@media(max-width:1268px) {
    .video-wrap h1 {
        color: #fff;
        font-size: 100px;
    }

    .video-wrap p {
        color: #fff;
        font-size: 28px;
    }
}

@media(max-width:1107px) {
    .video-wrap h1 {
        color: #fff;
        font-size: 90px;
    }

    .video-wrap p {
        color: #fff;
        font-size: 25px;
    }
}

@media(max-width:997px) {
    .video-wrap h1 {
        color: #fff;
        font-size: 85px;
    }

    .video-wrap p {
        color: #fff;
        font-size: 20px;
    }
}

@media(max-width:922px) {
    .video-wrap h1 {
        color: #fff;
        font-size: 70px;
    }

    .video-wrap p {
        color: #fff;
        font-size: 17px;
    }
}

@media(max-width:946px) {
    .video-wrap h1 {
        color: #fff;
        font-size: 62px;
    }

    .video-wrap p {
        color: #fff;
        font-size: 17px;
    }
}

 @media(max-width:860px) {
    .video-wrap h1 {
        color: #fff;
        font-size: 57px;
    }

    .video-wrap p {
        color: #fff;
        font-size: 17px;
    }
}

@media(min-width:793px) {
    .video-wrap {
        position: absolute;
        top: 200px;
        width: 60%;
    }
}

@media(max-width:793px) {
    .video-wrap h1 {
        padding-top: 10px;
        color: #111;
        font-size: 40px;
    }

    .video-wrap p {
        color: #111;
        font-size: 25px;
    }
}
</style>