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

class Player {

  constructor() {

    this.HTMLelement = $('audio')[0];
    this.HTMLelement.onended = function() {
      // this.playNext();
    };

    // scrubber on change
    $('.player-ctrl-seek').on("change", function(newValue) {
      $('audio')[0].currentTime = newValue;
    });
  }

  /**
   * prepare track so we can play it
   */
  loadTrack(track) {

    $('.playtrack').removeClass('playing');
    this.track = track.addClass('playing');

    // prepare HTML audio element
    $('audio source').attr('src', track.data('filepath'));
    this.HTMLelement.load();
    this.HTMLelement.pause();

    // reset scrubber
    // @hacks here be hacks
    this.HTMLelement.currentTime = 0;
    $('.player-ctrl-seek').attr('value', 0);
    $('.player-ctrl-seek').attr('max', $('audio')[0].duration);

    this.HTMLelement.addEventListener('timeupdate',function () {
      $('.player-ctrl-seek').attr('value', parseInt($('audio')[0].currentTime, 10));
    });

    // update info
    this.updateTrackInfo();
  }

  /**
   * play next track
   */
  playNext(next = true) {

    console.log('play next 3');

    // debug
    // why is this method being run before onEnded should be triggered?
    if (!this.track) {
      console.log('why');
    } console.log('good');
    return false;

    if(!$('.player-btn-repeat').hasClass('selected')) {
      if ($('.player-btn-shuffle').hasClass('selected')) {
        // random track
        this.track.removeClass('playing');
        $('.playtrack').eq(Math.floor(Math.random() * $('.playtrack').length)).addClass('playing');
      } else {
        if (next && !this.track.is(':first-child')) {
          // next track
          this.track.removeClass('playing').next().addClass('playing');
        } else if (!this.track.is(':last-child')) {
          // previous track
          this.track.removeClass('playing').prev().addClass('playing');
        }
      }
    }

    this.loadTrack($('.playtrack.playing'));

    if ($('.player-btn-pause').is(':visible')) {
      this.HTMLelement.play();
    }
  }

  /**
   * update meta data in header
   */
  updateTrackInfo() {

    // clear all previous track info
    $('.song-title, .song-album, .song-year, .song-desc').text('');

    // display track title
    $('.song-title').text(this.track.find('.title').text());
    // display track album
    if (this.track.data('album')) {
      $('.song-album').text(this.track.data('album'));
    }
    // display track year
    if (this.track.data('year')) {
      $('.song-year').text(this.track.data('year'));
    }
    // display track desc
    if (this.track.data('desc')) {
      $('.song-desc').text(this.track.data('desc'));
    }
  }
};

$( document ).ready(function() {

  player = new Player();

  // player btns

  $('.player-btn-pause').click(function(){
    $('.player-btn-pause').hide();
    $('.player-btn-play').show();
    player.HTMLelement.pause();
  });

  $('.player-btn-play').click(function(){
    $('.player-btn-pause').show();
    $('.player-btn-play').hide();
    player.HTMLelement.play();
  });

  $('.player-btn-back').click(player.playNext());
  $('.player-btn-next').click(player.playNext(false));

  $('.player-btn-repeat').click(function() {
    $('.player-btn-shuffle').removeClass('selected');
    $(this).toggleClass('selected');
  });

  $('.player-btn-shuffle').click(function() {
    $('.player-btn-repeat').removeClass('selected');
    $(this).toggleClass('selected');
  });

  $('.player-btn-download').click(function(e) {
    e.preventDefault();
    window.location.href = $('audio source').attr('src');
  });

  // click track name event
  $('.playtrack').click(function() {
    player.loadTrack($(this));
    $('.player-btn-pause').show();
    $('.player-btn-play').hide();
    player.HTMLelement.play();
  });

  // load first track
  console.log('load first track');
  player.loadTrack($('.playtrack').first());
});
