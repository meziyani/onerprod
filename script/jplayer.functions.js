$(document).ready(function () {

    var myPlayer = new jPlayerPlaylist({

            jPlayer: "#jquery_mainplayer",
            cssSelectorAncestor: "#jp_container_5"
        }, [
            //php writePlaylist('Y',' (!!duration!!)');
            //php writePlaylist('Y',"<span style='color:#828282'> (!!duration!!)</span>");
            {
                title: "%InstrumentalName <i style='color: #adadad'>#Tag1 #Tag2</i> &nbsp; <span>03:08</span>",
                mp3: "http://www.jplayer.org/audio/mp3/Miaow-03-Lentement.mp3",
                poster: "extra-images/album-player-1.jpg", //COVER
                album_buy_mp3: "%BUYLINK/%SONGID"
            },
        ],
        {

            playlistOptions: {loopOnPrevious: true,},
            loop: true,
            swfPath: "images/jplayer.swf",
            supplied: "mp3, oga",
            wmode: "window",
            useStateClassSkin: true,
            autoBlur: false,
            preload: 'auto',
            preload: 'metadata',
            smoothPlayBar: true,
            audioFullScreen: true,
            keyEnabled: true,
            size: {width: "89px", height: "84px"},
        });

    var $jp = $('#jquery_jplayer_5');
    $jp.on($.jPlayer.event.play, function (e) {
        $('#current-track5').empty();
        $('#current-track5').append(myPlayer.playlist[myPlayer.current].title);
    });

});