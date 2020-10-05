$( document ).ready(function() {

  player = new Player();
  player.loadTrack($('.playtrack').first(), initButtons());
});

function initButtons() {

  console.log('bazinga!');
  console.log("init buttons");
  console.log(player);

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

  $('.player-btn-back').click(player.playPrev);
  $('.player-btn-next').click(player.playNext);
}
