import { createStore } from 'vuex';
import axios from 'axios';

export default createStore({
  state: {
    speakers: []
  },
  mutations: {
    addSpeaker(state, speaker) {
      state.speakers.push(speaker);
    }
  },
  actions: {
    async addSpeaker({ commit }, speaker) {
      try {
        const response = await axios.post('/speakers', speaker);
        commit('addSpeaker', response.data);
      } catch (error) {
        console.error('Error adding speaker:', error);
      }
    }
  },
  getters: {
    getSpeakers(state) {
      return state.speakers;
    }
  }
});
