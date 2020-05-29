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

  var audio = $('audio');
  var trackid = track.data('trackid');

  // play next track
  audio[0].addEventListener('ended',function(){
    trackPlay(track.next());
  });

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
