global.$ = global.jQuery = require('jquery');

function trackInfoLoad (track) {

  // clear info
  $('.song-title').text('');
  $('.song-album').text('');
  $('.song-year').text('');

  // toggle jumbotrons
  $('.jumbotron.welcome').hide();
  $('.jumbotron.info').show();

  // title
  var title = track.find('title').text();
  if (track.data('artist').length()) {
    title = track.data('artist') + ' - ' + title;
  }
  $('.song-title').text(title);

  // album
  if (track.data('album').length()) {
    $('.song-album').text(track.data('album'));
  }

  // year
  if (track.data('year').length()) {
    $('.song-year').text(track.data('year'));
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
