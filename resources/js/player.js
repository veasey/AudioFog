global.$ = global.jQuery = require('jquery');

class Player {

  constructor() {

    this.HTMLelement = $('audio')[0];

    // listeners
    /*
    this.HTMLelement.addEventListener('ended',function(){
      this.playNext();
    });
    */

    // load first track
    this.loadTrack($('.playtrack').first());
  }

  loadTrack(track) {

    this.track = track;

    // highlight playing track
    $('.playtrack').removeClass('playing');
    this.track.addClass('playing');

    // prepare HTML audio element
    $('audio source').attr('src', this.track.data('filepath'));
    this.HTMLelement.load();
    this.HTMLelement.pause();

    // reset scrubber
    this.HTMLelement.currentTime = 0;
    $(".player-ctrl-seek").attr("value", 0).attr("max", this.HTMLelement.duration);

    // update info
    this.updateTrackInfo();
  }

  playNext(next = true) {

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

    if ($('.player-btn-play').is(':visible')) {
      this.HTMLelement.play();
    }
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

$( document ).ready(function() {

  player = new Player();

  // click track name event
  $('.playtrack').click(function() {
    player.loadTrack($(this));
    $('.player-btn-pause').show();
    $('.player-btn-play').hide();
    player.HTMLelement.play();
  });

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
});
