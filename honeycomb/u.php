<link href="css/genel.css" rel="stylesheet"/> <style>
body{
	margin: 0px;
	padding: 0px;
	float: fixed;
	position: left;
}
</style><body><?php $u	= $_GET["u"];?>

<script src="http://www.youtube.com/player_api"></script>

<div id="player"></div>

<script> var player;

function onYouTubePlayerAPIReady() {
    player = new YT.Player('player', {
        playerVars: {
            'autoplay': 1,
            'controls': 0,
            'autohide': 1,
            'wmode': 'opaque',
            'showinfo': 0,
            'loop': 1,
            'mute': 1,
            //'start': 15,
            //'end': 110,
            'playlist': '<?php echo "{$u}";?>'
        },
        videoId: '<?php echo "{$u}";?>',
        events: {
            'onReady': onPlayerReady
        }
    });

}

function onPlayerReady(event) {
    event.target.mute();
    $('#text').fadeIn(400);
    //why this? Well, if you want to overlay text on top of your video, you
    //will have to fade it in once your video has loaded in order for this
    //to work in Safari, or your will get an origin error.
}

//this pauses the video when it's out of view, just wrap your video in .m-//video
$(window).scroll(function() {
   var hT = $('.m-video').height(),
       wS = $(this).scrollTop();
   if (wS > hT) {
      player.pauseVideo();
   }
   else {
      player.playVideo();
   }
});</script>
</body>
