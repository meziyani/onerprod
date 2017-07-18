<?php

$q = $db->prepare('SELECT * from settings where id=?');
$q->execute([1]);
$req = $q->fetch();

$biofr = $req['biofr'];
$bioen = $req['bioen'];

?>

<!--// Main Section \\-->
<div class="wm-main-section wm-contdown-full" id="bio">
    <span class="wm-light-layer"></span>
    <div class="container">
        <div class="row">

            <!--// Music Beat Dates \\-->
            <div class="col-md-12">

                <div class="wm-event-timer">
                    <div class="wm-fancy-title wm-fancy-darkcolor">
                        <span>Who is Oner ?</span>
                        <h2>My Biography</h2>
                    </div>

                    <div class="wm-tabs">
                        <ul role="tablist" class="wm-tabs-wrap">
                            <li class="active" role="presentation"><a data-toggle="tab" role="tab" href="#en" aria-expanded="true"><img src="./images/en.png"> English</a></li>
                            <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#fr" aria-expanded="false"><img src="./images/fr.png"> Français</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="en">
                                <div class="wm-description-section">
                                    <p>
                                        <?php

                                        echo $bioen;

                                        ?>

                                    </p>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="fr">
                                <div class="wm-description-section">
                                    <p>
                                        <?php

                                        echo $biofr;

                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FIRST STYLE
                    <ul class="nav nav-tabs">
                        <li class="active"><a style="color: #3a3a3a" data-toggle="tab" href="#en"><img src="./images/en.png"> English</a></li>
                        <li><a style="color: #3a3a3a" data-toggle="tab" href="#fr"><img src="./images/fr.png"> Français</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="en" class="tab-pane fade in active">
                            <h3>HOME</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div id="fr" class="tab-pane fade">
                            <h3>Menu 1</h3>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>-->

                </div>

            </div>
            <!--// Music Beat Dates \\-->

        </div>
    </div>
</div>
<!--// Main Section \\-->