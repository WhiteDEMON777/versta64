export const state = () => ({
  accessToken: '',
  loginUser: '',
  profile: {},
  toggleAuthorized: false,
  authorizedModel: false,
});

export const getters = {
  isAuthorized: (state) => state.accessToken !== '',
  accessToken: (state) => state.accessToken,
  loginUser: (state) => state.loginUser,
  profile: (state) => state.profile,
};

export const mutations = {
  setToken(state, accessToken) {
    state.accessToken = accessToken;
    localStorage.setItem('accessToken', state.accessToken);
  },
  setLogin(state, loginUser) {
    state.loginUser = loginUser;
    localStorage.setItem('loginUser', state.loginUser);
  },
  setProfile(state, profile) {
    state.profile = profile;
    this.commit('saveProfileToLocalStorage');
  },
  saveProfileToLocalStorage(state) {
    const parsed = JSON.stringify(state.profile);
    localStorage.setItem('profile', parsed);
  },
  setToggleAuthorized(state, toggleAuthorized) {
    state.toggleAuthorized = toggleAuthorized;
  },
  setAuthorizedModel(state, authorizedModel) {
    state.authorizedModel = authorizedModel;
  },
};
