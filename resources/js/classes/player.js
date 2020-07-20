global.$ = global.jQuery = require('jquery');

class Player {

  constructor() {

    this.HTMLelement = $('audio')[0];
    this.HTMLelement.onended = function() {
      // this.playNext();
    };
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

    this.resetScrubber();

    // update info
    this.updateTrackInfo();
  }

  /**
   * setup scrubber for loaded track
   */
  resetScrubber() {

    // reset scrubber
    // @hacks here be hacks
    this.HTMLelement.currentTime = 0;
    $('.player-ctrl-seek').attr('value', 0);
    $('.player-ctrl-seek').attr('max', $('audio')[0].duration);

    this.HTMLelement.addEventListener('timeupdate',function () {
      $('.player-ctrl-seek').attr('value', parseInt($('audio')[0].currentTime, 10));
    });

    $('.player-ctrl-seek').on("change", function(e) {
      var newValue = e.target.value;
      $('audio')[0].currentTime = parseInt(newValue);
    });
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
