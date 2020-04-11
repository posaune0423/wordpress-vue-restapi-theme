import Vue from 'vue';
import Router from 'vue-router';

// Components
import Home from '../components/Home.vue';
import About from '../components/About.vue';
import Concerts from '../components/Concerts.vue';
import Information from '../components/Information.vue';
import Contact from '../components/Contact.vue';
import Latest from '../components/Latest.vue';
import Post from '../components/Post/Post.vue';
import Concert from '../components/Post/Concert.vue';
// import Page from '../components/Page/Page.vue';

Vue.use(Router);

const router = new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home,
    },
    {
      path: '/about',
      name: 'About',
      component: About,
    },
    {
      path: '/information',
      name: 'Information',
      component: Information,
    },
    {
      path: '/concerts',
      name: 'Concerts',
      component: Concerts,
    },
    {
      path: '/latest',
      name: 'Latest',
      component: Latest,
    },
    {
      path: '/contact',
      name: 'Contact',
      component: Contact,
    },
    {
      // Assuming you're using the default permalink structure for posts
      path: '/concerts/:concertSlug',
      name: 'Concert',
      component: Concert,
    },
    {
      // Assuming you're using the default permalink structure for posts
      path: '/:postSlug',
      name: 'Post',
      component: Post,
    },
    // {
    //   path: '/:pageSlug',
    //   name: 'Page',
    //   component: Page,
    // },
  ],
  mode: 'history',
  base: '',

  // Prevents window from scrolling back to top
  // when navigating between components/views
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition;
    } else {
      return { x: 0, y: 0 };
    }
  },
});

router.afterEach((to) => { // (to, from)
  // Add a body class specific to the route we're viewing
  let body = document.querySelector('body');

  const slug = !(to.params.postSlug)
    ? to.params.pageSlug
    : to.params.postSlug;
  body.classList.add('vue--page--' + slug);
});

export default router;
