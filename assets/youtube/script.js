
//Loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
// Creates an iframe (and YouTube player) after the API code downloads.
var ytplayer;
//videos IDs in index order
var playlistIDs = 'djV11Xbc914,egZ_wCYP_VM,s6VaeFCxta8';//index 0, 1, 2
function onYouTubeIframeAPIReady() {
  ytplayer = new YT.Player('ytplayer', {
    modestbranding :1,
    height: '363',
    width: '600',
    playerVars:{rel:0},
    events: {
      'onReady': onPlayerReady
    }
  });
}
//The API will call this function when the video player is ready.
function onPlayerReady(event) {
  ytplayer.cuePlaylist(playlistIDs, 0);
}


(function($) {

   
    $(document).ready(function(){
        var links = $('#ytnavigation a');
        links.eq(0).addClass('current');
        links.bind({
            click:function(e){
                e.preventDefault();
                links.removeClass('current');
                ytplayer.playVideoAt($(this).attr('data-video-index'));
                $(this).addClass('current');
            }
        });
    });

})(jQuery);
