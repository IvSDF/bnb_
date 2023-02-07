import Vue from "vue";

require('./bootstrap');

import VueRouter  from "vue-router";
import router from "./routes";
import Index from "./Index.vue";
import {value} from "lodash/seq";
import moment from "moment/moment";
import StarRating from "./shared/components/StarRating.vue";
import FatalError from "./shared/components/FatalError.vue";
import ValidationErrors from "./shared/components/ValidationErrors.vue";
import Success from "./shared/components/Success.vue";

window.Vue = require('vue').default;

Vue.use(VueRouter);
Vue.filter("fromNow", value => moment(value).fromNow());
Vue.component("star-rating", StarRating);
Vue.component("fatal-error", FatalError);
Vue.component("success", Success);
Vue.component('v-errors', ValidationErrors);

const app = new Vue({
    el: '#app',
    router,
    components: {
      "index": Index
    },
}).$mount('#app')

