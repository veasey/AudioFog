global.$ = global.jQuery = require('jquery');

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

  trackLoad(track);
  $.ajax({
     type: "POST",
     data: {"_token": $('meta[name="csrf-token"]').attr('content'),"id": trackid},
     url: '/track/addplay',
     success: function(msg){
       // change audio source
       audio[0].play();

       // play next track
       /*
       audio[0].addEventListener('ended',function(){
         trackPlay(track.next());
       });
       */
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
