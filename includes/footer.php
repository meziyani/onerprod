<?php

$q = $db->prepare('SELECT * from settings where id=?');
$q->execute([1]);
$req = $q->fetch();

$youtube = $req['youtube'];
$insta = $req['instagram'];
$twitter = $req['twitter'];
$soundcloud = $req['soundcloud'];

?>

<!--// Footer \\-->
<footer id="wm-footer" class="footer-two">

    <!--// Footer Top Section \\-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wm-footer-widgets">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="wm-footer-widget-title" align="center"><h2>Facebook</h2></div>
                            <figure style="margin-left: auto;margin-right: auto">
                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FONEROFFICIEL%2F&tabs=timeline&width=960&height=450&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=1456815131308124"
                                        width="100%" height="450" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true">

                                </iframe>
                            </figure>
                        </div>
                        <div class="col-md-7">
                            <div class="wm-footer-widget-title" align="center"><h2>Soundcloud</h2></div>
                            <figure style="margin-left: auto;margin-right: auto">
                                <iframe width="100%" height="450" scrolling="no" frameborder="no"
                                        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/25701351&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true">
                                </iframe>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
    </div>
    <!--// Footer Top Section \\-->


    <!--// Footer Bottom Section \\-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wm-footer-bottom-section">
                    <div class="row">
                        <!--<div class="col-md-7">
                            <div class="wm-newslatter-section">
                                <div class="wm-footer-widget-title"><h2>Get notified of next beats releases:</h2></div>
                                <form>
                                    <input type="text" value="your@mail.com" onblur="if(this.value == '') { this.value ='your@mail.com'; }"
                                           onfocus="if(this.value =='your@mail.com') { this.value = ''; }">
                                    <input type="submit" value="Subscribe Now" class="wm-color wm-bordercolor">
                                </form>
                            </div>
                        </div>!-->
                        <div class="col-md-5 pull-right">
                            <div class="wm-footer-social-media">
                                <ul class="wm-footer-icons">
                                    <li><a target="_blank" href="<?php echo $soundcloud;?>""><i class="flaticon-shape"></i> Soundcloud</a></li>
                                    <li><a target="_blank" href="<?php echo $youtube;?>"><i class="flaticon-play"></i> youtube</a></li>
                                    <li><a target="_blank" href="<?php echo $twitter;?>""><i class="flaticon-social-2"></i> twitter</a></li>
                                    <li><a target="_blank" href="<?php echo $insta;?>""><i class="flaticon-social-3"></i> Instagram</a></li>
                                </ul>
                                <p>Oner Production © 2017, All Right Reserved - by <a target="_blank" href="http://kchahine.com">K. Chahine</a> & <a href="http://www.meziyani.net">Y. Meziani</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Footer Bottom Section \\-->


</footer>
<!--// Footer \\-->