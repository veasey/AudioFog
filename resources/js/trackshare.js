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
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

global.$ = global.jQuery = require('jquery');

function trackInfoLoad (track) {

  // clear info
  $('.song-title').text('');
  $('.song-album').text('');
  $('.song-year').text('');
  $('.song-desc').text('');

  // toggle jumbotrons
  $('.jumbotron.welcome').hide();
  $('.jumbotron.info').show();

  // title
  $('.song-title').text(track.find('.title').text());

  // album
  if (track.data('album')) {
    $('.song-album').text(track.data('album'));
  }

  // year
  if (track.data('year')) {
    $('.song-year').text(track.data('year'));
  }

  // desc
  if (track.data('desc')) {
    $('.song-desc').text(track.data('desc'));
  }
}

function trackLoad (track) {

  $('audio')[0].load();
  $('audio')[0].pause();
  $('audio source').attr('src', track.data('filepath'));

  $('.playtrack').removeClass('playing');
  track.addClass('playing');
}

function trackPlay (track) {

  var audio = $('audio');
  var trackid = track.data('trackid');

  // play next track
  audio[0].addEventListener('ended',function(){
    trackPlay(track.next());
  });

  trackInfoLoad(track);

  trackLoad(track);
  $.ajax({
     type: "POST",
     data: {"_token": $('meta[name="csrf-token"]').attr('content'),"id": trackid},
     url: '/track/addplay',
     success: function(msg){
       // change audio source
       audio[0].play();
     }
  });
}

$( document ).ready(function() {

  // autoload first track
  trackLoad($('.playtrack').first());
  // clickevent to play track
  $('.playtrack').click(function() {
    trackPlay($(this));
  });

  // init tooltips
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });
});
