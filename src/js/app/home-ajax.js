var tag = document.createElement('script');
var player;
var firstScriptTag = document.getElementsByTagName('script')[0];

tag.src = "https://www.youtube.com/iframe_api";
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

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

function onPlayerReady(event) {
    event.target.setPlaybackQuality('360');
    event.target.playVideo();

    // MUTE BUTTON
    $(".eq").on("click", function() {
        if( $(".eq").hasClass("mute")) {
            $(".eq").removeClass("mute");
            $("#bars").fadeOut("fast");
            player.mute();
        } else {
            $(".eq").addClass("mute");
            $("#bars").fadeIn("fast");
            player.unMute();
        }
    }).trigger(".click");


    // AJAX RELOAD MOVIE & MUSIC WHEN PLAYER END
    window.setInterval(function(){
        var statement = player.getPlayerState();
        if (statement == 0) {
            $.ajax({
                url     : "config/home-player.php" + location.search,
                type    : "POST",
                dataType: 'JSON',
                data: {ajax:true},
    
                success : function(data, status, xhr) {
                    player.loadVideoById(data.music.music_link);
                    $('.music_title').text(data.music.music_title);
                    $('.movie_title').text(data.movie.title);
                    $('.release_date').text('Sortie le : ' + data.movie.release_date);
                    $('.director').text('Réalisé par : ' + data.credits.crew[0].name);
                    $('.genre').text('Genre : ' + data.movie.genres[0].name);
                    $('.actors').text('Avec : ' + data.credits.cast[0].name + "  /  " + data.credits.cast[1].name + "  /  " + data.credits.cast[2].name );
                    $('.music_composer').text(data.music.composer);
                    $('.amazon_music').attr( 'href', 'https://www.amazon.fr/s/ref=nb_sb_noss_2?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&url=search-alias%3Dpopular&field-keywords=' + data.movie.title + '+Bande+Originale');
                    $('.amazon_movie').attr( 'href', 'https://www.amazon.fr/s/ref=nb_sb_noss_2?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&url=search-alias%3Ddvd&field-keywords=' + data.movie.title);
                    $('.overview').text('Résumé : ' + data.movie.overview);
                    $('.poster').attr('src', 'http://image.tmdb.org/t/p/w500/' + data.movie.poster_path);
                }
            });
        }
    }, 2000);
    
     // AJAX RELOAD MOVIE & MUSIC WHEN SKIP
     $('.reload').click(function() {
        $.ajax({
            url     : "./config/home-player.php" + location.search,
            type    : "POST",
            dataType: 'JSON',
            data: {ajax:true},
    
            success : function(data, status, xhr) {
                player.loadVideoById(data.music.music_link);
                $('.music_title').text(data.music.music_title);
                $('.movie_title').text(data.movie.title);
                $('.release_date').text('Sortie le : ' + data.movie.release_date);
                $('.director').text('Réalisé par : ' + data.credits.crew[0].name);
                $('.genre').text('Genre : ' + data.movie.genres[0].name);
                $('.actors').text('Avec : ' + data.credits.cast[0].name + "  /  " + data.credits.cast[1].name + "  /  " + data.credits.cast[2].name );
                $('.music_composer').text(data.music.composer);
                $('.amazon_music').attr( 'href', 'https://www.amazon.fr/s/ref=nb_sb_noss_2?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&url=search-alias%3Dpopular&field-keywords=' + data.movie.title + '+Bande+Originale');
                $('.amazon_movie').attr( 'href', 'https://www.amazon.fr/s/ref=nb_sb_noss_2?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&url=search-alias%3Ddvd&field-keywords=' + data.movie.title);
                $('.overview').text('Résumé : ' + data.movie.overview);
                $('.poster').attr('src', 'http://image.tmdb.org/t/p/w500/' + data.movie.poster_path);
            }
        });
    
    });
}


      
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