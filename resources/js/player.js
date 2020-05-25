global.$ = global.jQuery = require('jquery');

$( document ).ready(function() {

  $('.playtrack').click(function() {

    $('.playtrack').removeClass('playing');
    $(this).addClass('playing');

    var audio = $('audio');
    var filename = $(this).data('filepath');
    var trackid = $(this).data('trackid');

    // increase number of plays
    //$.post("/track/addplay", { trackid: trackid });

    $.ajax({

       type: "POST",
       data: {"_token": $('meta[name="csrf-token"]').attr('content'),"id": trackid},
       url: '/track/addplay',
       success: function(msg){

         // change audio source
         audio[0].pause();
         //$('audio source').attr('src', '');
         audio[0].load();//suspends and restores all audio element
         $('audio source').attr('src', filename);
         audio[0].play();
       }
    });
  });

  // init tooltips
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });
});
