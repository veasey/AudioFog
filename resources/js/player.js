global.$ = global.jQuery = require('jquery');

function loadTrack( track) {

  $('audio')[0].load();
  $('audio')[0].pause();
  $('audio source').attr('src', track.data('filepath'));

  $('.playtrack').removeClass('playing');
  track.addClass('playing');
}


$( document ).ready(function() {

  // autoload first track
  loadTrack($('.playtrack').first());

  $('.playtrack').click(function() {

    loadTrack($(this));

    var audio = $('audio');
    var trackid = $(this).data('trackid');

    $.ajax({

       type: "POST",
       data: {"_token": $('meta[name="csrf-token"]').attr('content'),"id": trackid},
       url: '/track/addplay',
       success: function(msg){

         // change audio source
         audio[0].play();
       }
    });
  });

  // init tooltips
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });
});
