import api from '../../api';
import * as types from '../mutation-types';

const createConcertSlug = post => {
  let slug = post.link.replace(window.location.protocol + '//' + window.location.host, '');
  post.slug = slug;
  return post;
};

// initial state
const state = {
  recent: [],
  loaded: false,
};

// getters
const getters = {
  recentConcerts: state => limit => {
    if (
      !limit ||
      !Number.isInteger(limit) ||
      typeof limit == 'undefined'
    ) {
      return state.recent;
    }
    let recent = state.recent;
    return recent.slice(0, limit);
  },

  recentConcertsLoaded: state => state.loaded,
};

// actions
const actions = {
  getConcerts({ commit }, { limit }) {
    api.getConcerts(limit, posts => {
      posts.map((post, i) => {
        posts[i] = createConcertSlug(post);
      });

      commit(types.STORE_FETCHED_CONCERTS, { posts });
      commit(types.CONCERTS_LOADED, true);
      commit(types.INCREMENT_LOADING_PROGRESS);
    });
  },
};

// mutations
const mutations = {
  [types.STORE_FETCHED_CONCERTS](state, { posts }) {
    state.recent = posts;
  },

  [types.CONCERTS_LOADED](state, val) {
    state.loaded = val;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
