$( document ).ready(function() {
  $('.playtrack').click(function() {

    $('.playtrack').removeClass('playing');
    $(this).addClass('playing');

    var audio = $('audio');
    var filename = $(this).data('filepath');

    // change audio source
    audio[0].pause();
    audio[0].load();//suspends and restores all audio element
    $('audio source').attr('src', filename);
    audio[0].play();
  });
});
