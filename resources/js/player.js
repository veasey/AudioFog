global.$ = global.jQuery = require('jquery');

function trackInfoLoad (track) {

  // clear info
  $('.song-title').text('');
  $('.song-album').text('');
  $('.song-year').text('');
  $('.song-desc').text('');

  // toggle jumbotrons
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

  trackInfoLoad(track);

  $('audio')[0].load();
  $('audio')[0].pause();
  $('audio source').attr('src', track.data('filepath'));

  $('.playtrack').removeClass('playing');
  track.addClass('playing');
}

function trackPlay (track) {

  var audio = $('audio')[0];
  var trackid = track.data('trackid');

  // reset scrubber
  audio.currentTime = 0;
  $(".player-ctrl-seek").attr("value", 0).attr("max", 9999);

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

$( document ).ready(function() {

  // autoload first track
  trackLoad($('.playtrack').first());

  // clickevent to play track
  $('.playtrack').click(function() {
    trackPlay($(this));
  });

  // player btns
  $('.player-btn-pause').click(function(){
    $('audio')[0].pause();
    $('.player-btn-pause').hide();
    $('.player-btn-play').show();
  });

  $('.player-btn-play').click(function(){
    $('audio')[0].play();
    $('.player-btn-pause').show();
    $('.player-btn-play').hide();
  });

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
});
