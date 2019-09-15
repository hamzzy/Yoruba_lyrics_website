
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/LyricsPost.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('lyrics-post', require('./components/LyricsPost.vue').default);
Vue.component('lyric-form', require('./components/LyricPosComponent.vue').default);
Vue.component('latest', require('./components/Latest.vue').default);
Vue.component('comment', require('./components/LyricsComment').default);
Vue.component('edit-lyrics', require('./components/EditLyrics').default);
Vue.component('l', require('./components/Dashboard/LyricListComponent').default);
Vue.component('search-component',require('./components/SearchComponent').default);
Vue.component('profile-form',require('./components/Dashboard/ProfileUpdate').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

import tinymce from 'vue-tinymce-editor'
Vue.component('tinymce', tinymce);





const app = new Vue({
    el: '#app'
});
