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

    // load first track
    this.loadTrack($('.playtrack').first());
  }

  loadTrack(track) {

    this.track = track;

    // prepare HTML audio element
    this.HTMLelement.load();
    this.HTMLelement.pause();
    $('audio source').attr('src', this.track.data('filepath'));

    // highlight playing track
    $('.playtrack').removeClass('playing');
    this.track.addClass('playing');

    // reset scrubber
    this.HTMLelement.currentTime = 0;
    $(".player-ctrl-seek").attr("value", 0).attr("max", this.HTMLelement.duration);

    // listeners
    this.HTMLelement.addEventListener('ended',function(){
      this.playNext();
    });

    // update info
    this.updateTrackInfo();
  }

  playNext() {
    loadTrack(this.track.next());
    this.HTMLelement.play();
  }

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


/*

function trackPlay (track) {

  var audio = $('audio')[0];
  var trackid = track.data('trackid');

  // reset scrubber
  audio.currentTime = 0;
  $(".player-ctrl-seek").attr("value", 0).attr("max", audio.duration);

  // listeners
  audio.addEventListener('ended',function(){
    trackPlayNext();
  });

  // scrubber
  audio.addEventListener('timeupdate',function () {
    curtime = parseInt(audio.currentTime, 10);
    $(".player-ctrl-seek").attr("value", curtime);
  });
  $(".player-ctrl-seek").bind("change", function() {
    var audio = $('audio')[0];
    audio.currentTime = $(this).val();
    $(".player-ctrl-seek").attr("max", audio.duration);
  });


  trackLoad(track);
  $.ajax({
     type: "POST",
     data: {"_token": $('meta[name="csrf-token"]').attr('content'),"id": trackid},
     url: '/track/addplay',
     success: function(msg){
       // change audio source
       audio.play();
       // swap player btns
       $('.player-btn-pause').show();
       $('.player-btn-play').hide();
     }
  });
}

function trackPlayNext() {

  if ($('.player-btn-repeat').hasClass('selected')) {
    // loop track
    trackPlay($('.playtrack.playing'));
  } else if ($('.player-btn-shuffle').hasClass('selected')) {
    // shuffle
    trackPlay($('.playtrack').eq(Math.floor(Math.random()*$('.playtrack').count())));
  } else {
    // play next
    trackPlay($('.playtrack.playing').next());
  }

}
*/
$( document ).ready(function() {

  player = new Player();

  // clickevent to play track
  $('.playtrack').click(function() {
    player.loadTrack($(this));
    $('.player-btn-pause').show();
    $('.player-btn-play').hide();
    player.HTMLelement.play();
  });

  // player btns
  $('.player-btn-pause').click(function(){
    player.HTMLelement.pause();
    $('.player-btn-pause').hide();
    $('.player-btn-play').show();
  });

  $('.player-btn-play').click(function(){
    player.HTMLelement.play();
    $('.player-btn-pause').show();
    $('.player-btn-play').hide();
  });

  /*

  $('.player-btn-back').click(function() {

    var currentTrack = $('.playtrack.playing');
    if (!currentTrack.is(':first-child')) {
      currentTrack.removeClass('playing').prev().addClass('playing');
    }

    if ($('.player-btn-play').is(':visible')) {
      trackPlay($('.playtrack.playing'));
    } else {
      trackLoad($('.playtrack.playing'));
    }
  });

  $('.player-btn-next').click(function() {

    var currentTrack = $('.playtrack.playing');
    if (!currentTrack.is(':last-child')) {
      currentTrack.removeClass('playing').next().addClass('playing');
    }

    if ($('.player-btn-play').is(':visible')) {
      trackPlay($('.playtrack.playing'));
    } else {
      trackLoad($('.playtrack.playing'));
    }
  });

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

  */
});
