
// 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      // var music_id = '<?=$music->music_link?>';
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '390',
          width: '640',
          videoId: music_id,
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.setPlaybackQuality('360');
        event.target.playVideo();

        // MUTE BUTTON
      $(".eq").on("click", function(){
          if( $(".eq").hasClass("mute")) {
            $(".eq").removeClass("mute");
              player.mute();
          } else {
              $(".eq").addClass("mute");
              player.unMute();
          }
      }).trigger(".click");


      // AJAX RELOAD MOVIE & MUSIC WHEN PLAYER END
        window.setInterval(function(){
          var statement = player.getPlayerState();
          if (statement == 0) {
            $.ajax({
              url     : "config/home-player.php",
              type    : "POST",
              dataType: 'JSON',
              data: {ajax:true},
              success : function(data, status, xhr) {
                console.log(data.music);
                console.log(data.movie);
                player.loadVideoById(data.music.music_link);
                $('.title').text(data.music.music_title);
            $('.composer').text(data.music.composer);
            $('.poster').attr('src', 'http://image.tmdb.org/t/p/w500/' + data.movie.poster_path);
             }
        });
          }
      }, 2000);

        // AJAX RELOAD MOVIE & MUSIC WHEN SKIP
        $('.reload').click(function() {

               $.ajax({
              url     : "config/home-player.php",
              type    : "POST",
              dataType: 'JSON',
              data: {ajax:true},
              success : function(data, status, xhr) {
                console.log(data.music);
                console.log(data.movie);
                player.loadVideoById(data.music.music_link);
                $('.title').text(data.music.music_title);
            $('.composer').text(data.music.composer);
            $('.poster').attr('src', 'http://image.tmdb.org/t/p/w500/' + data.movie.poster_path);
              }
    });

    });


      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      
      function onPlayerStateChange(event) {
        var done = false;

        if (event.data == YT.PlayerState.PLAYING && !done) {


      window.setInterval(function(){
        var duration = player.getDuration();
        var currentTime = player.getCurrentTime();
        $(".current_time").css({
            "width": ( currentTime / duration ) * 100 + "%"
        });

    }, 500);



          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }