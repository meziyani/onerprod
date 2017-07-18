
<!--// Main Section \\-->
<div class="wm-main-section wm-ourvideo-full" id="videos">
    <div class="container">
        <div class="row">

            <!--// Music Beat Dates \\-->
            <div class="col-md-12">

                <div class="wm-fancy-title wm-fancy-darkcolor">
                    <span>latest Video Releases</span>
                    <h2>My Videos</h2>
                </div>
                <div class="wm-ourvideo-slider">
                    <?php

                    $q = $db->prepare('SELECT * from videos where id=?');
                    $q->execute([1]);
                    $req = $q->fetch();

                    $youtubeid = $req['youtubeid'];
                    $title = $req['title'];
                    $description = $req['description'];
                    $date = $req['date'];

                    ?>
                    <div class="wm-ourvideo-wrap">
                        <figure>
                            <iframe width="604" height="340" src="https://www.youtube.com/embed/<?php echo $youtubeid?>" frameborder="0" allowfullscreen></iframe>
                        </figure>
                        <div class="wm-ourvideo-text">
                            <time><?php echo $date?></time>
                            <h4><a href="#LIEN"><?php echo $title?></a></h4>
                            <p><?php echo $description?></p>
                        </div>
                    </div>
                    <?php

                    $q = $db->prepare('SELECT * from videos where id=?');
                    $q->execute([2]);
                    $req = $q->fetch();

                    $youtubeid = $req['youtubeid'];
                    $title = $req['title'];
                    $description = $req['description'];
                    $date = $req['date'];

                    ?>
                    <div class="wm-ourvideo-wrap">
                        <figure>
                            <iframe width="604" height="340" src="https://www.youtube.com/embed/<?php echo $youtubeid?>" frameborder="0" allowfullscreen></iframe>
                        </figure>
                        <div class="wm-ourvideo-text">
                            <time><?php echo $date?></time>
                            <h4><a href="#LIEN"><?php echo $title?></a></h4>
                            <p><?php echo $description?></p>
                        </div>
                    </div>
                    <?php

                    $q = $db->prepare('SELECT * from videos where id=?');
                    $q->execute([3]);
                    $req = $q->fetch();

                    $youtubeid = $req['youtubeid'];
                    $title = $req['title'];
                    $description = $req['description'];
                    $date = $req['date'];

                    ?>
                    <div class="wm-ourvideo-wrap">
                        <figure>
                            <iframe width="604" height="340" src="https://www.youtube.com/embed/<?php echo $youtubeid?>" frameborder="0" allowfullscreen></iframe>
                        </figure>
                        <div class="wm-ourvideo-text">
                            <time><?php echo $date?></time>
                            <h4><a href="#LIEN"><?php echo $title?></a></h4>
                            <p><?php echo $description?></p>
                        </div>
                    </div>
                </div>

            </div>
            <!--// Music Beat Dates \\-->

        </div>
    </div>
</div>
<!--// Main Section \\-->