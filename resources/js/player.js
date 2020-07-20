$( document ).ready(function() {

  player = new Player();

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

  // click track name event
  $('.playtrack').click(function() {
    player.loadTrack($(this));
    $('.player-btn-pause').show();
    $('.player-btn-play').hide();
    player.HTMLelement.play();
  });

  // load first track
  console.log('load first track');
  player.loadTrack($('.playtrack').first());
});
