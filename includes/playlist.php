<script type="text/javascript">
$(document).ready(function () {

var myPlayer = new jPlayerPlaylist({
jPlayer: "#jquery_mainplayer",
cssSelectorAncestor: "#jp_container_5"
}, [
//php writePlaylist('Y',' (!!duration!!)');
//php writePlaylist('Y',"<span style='color:#828282'> (!!duration!!)</span>");
    <?php
    require_once 'db.php';
    $SQL = "SELECT * FROM articles";
    $reponse = $db->query($SQL);
    while ($req = $reponse->fetch()) { 
        if($req['type'] == 0 && $req['sold'] == 0){
        ?>


        {
        title: "<?php echo $req['title'];?> <i style='color: #adadad'><?php echo $req['tags'];?></i> &nbsp; <span><?php echo $req['length'];?></span>",
        mp3: "prelisten/<?php echo $req['listen'];?>",
        poster: "covers/<?php echo $req['image'];?>", //COVER
        album_buy_mp3: "index.php?id=<?php echo $req['id'];?>"
        },
        <?php
        }
    }
        ?>
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

    $("#jquery_mainplayer").bind($.jPlayer.event.play, function(event) {
        $('#current-track5').empty();
        $('#current-track5').append(myPlayer.playlist[myPlayer.current].title);
    });

});
</script>