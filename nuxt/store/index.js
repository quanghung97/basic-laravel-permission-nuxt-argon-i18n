export const state = () => ({
  locales: ['vi', 'en'],
  locale: 'vi'
})

export const mutations = {
  SET_LANG(state, locale) {
    if (state.locales.indexOf(locale) !== -1) {
      state.locale = locale
    }
  }
}
