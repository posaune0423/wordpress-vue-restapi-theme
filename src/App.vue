<template>
  <div id="my-app">
    <app-header />
    <div class="overlay" id="slideout-bg"></div>

    <transition name="loader-animation" enter-active-class="animated fadeIn" leave-active-class="animated fadeOut">
      <progress-bar :show-loader="showLoader" :loader-style="loaderStyle" />
    </transition>

    <transition name="page-transition" mode="out-in" appear>
      <div>
        <div style="margin-top: 83px;"></div>
        <router-view></router-view>
      </div>
    </transition>

    <app-footer />
  </div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from 'vuex';
import Header from './components/partials/Header.vue';
import Footer from './components/partials/Footer.vue';
import ProgressBar from './components/partials/ProgressBar.vue';

export default {
  name: 'App',
  data() {
    return {
      showLoader: true,
    };
  },
  computed: {
    ...mapGetters({
      isLoading: 'isLoading',
      loadingProgress: 'loadingProgress',
    }),

    loaderStyle() {
      return `width: ${this.loadingProgress}%;`;
    },
  },

  components: {
    appHeader: Header,
    appFooter: Footer,
    ProgressBar,
  },

  watch: {
    // watch the value of isLoading and once it's false hide the loader
    isLoading(val) {
      if (val == false) {
        let self = this;
        setTimeout(function() {
          self.showLoader = false;
        }, 1000);
      }
    },
  },
  mounted() {
    const menuIcon = document.getElementById('menu-icon');
    const slideoutMenu = document.getElementById('slideout-menu');
    const slideoutBg = document.getElementById('slideout-bg');

    menuIcon.addEventListener('click', function () {
        event.preventDefault();
        if (slideoutMenu.classList.contains('open') == false) {
            slideoutMenu.classList.add('open');
            slideoutBg.style.display = 'block';
        }
    })

    slideoutBg.addEventListener('click', function () {
        if (slideoutMenu.classList.contains('open') == true) {
            slideoutMenu.classList.remove('open');
            slideoutBg.style.display = 'none';
        }
    })
  }
};
</script>


<style>
body {
  margin: 0;
  font-family: "Raleway", sans-serif;
  overflow: scroll;
  -webkit-overflow-scrolling: touch;
}

h1,
h2,
h3,
h4,
h5 {
    color: #454545;
    font-weight: bold;
}

p {
    color: #656565;
}

a {
    text-decoration: none;
    color: #343434;
    -webkit-tap-highlight-color: #676767;
}

button {
  -webkit-tap-highlight-color: #676767;
}

.section-heading {
  font-size: 40px;
  padding: 30px;
}

/* Overlay */

.overlay {
    position: fixed;
    display: none;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.6);
    z-index: 1;
}
</style>
