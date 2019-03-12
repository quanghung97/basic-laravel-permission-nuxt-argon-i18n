import Vue from 'vue'
import globalComponents from "./globalComponents";
import globalDirectives from "./globalDirectives";
import VueLazyload from "vue-lazyload";

Vue.use(globalComponents);
Vue.use(globalDirectives);
Vue.use(VueLazyload);
