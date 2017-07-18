<?php
    require_once 'includes/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OnerProd | Beatmaker & Rapper</title>

    <!-- Css Files -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/flaticon.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="css/color.css" rel="stylesheet">
    <link href="css/color-one.css" rel="stylesheet">
    <link href="css/color-two.css" rel="stylesheet">
    <link href="css/slick-slider.css" rel="stylesheet">
    <link href="css/prettyphoto.css" rel="stylesheet">
    <link href="css/jplayer.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--// Main Wrapper \\-->
<div class="wm-main-wrapper wm-overflow-section" id="head">

    <?php include("includes/header.php"); ?>
    <?php include("includes/bio.php"); ?>


    <!--// Main Content \\-->
    <div class="wm-main-content">
    <?php
            if(isset($_GET['id'])){
        $id = $_GET['id'];

        $q = $db->prepare("SELECT * FROM articles WHERE id=?");
        $q->execute([$id]);
        $count = $q->rowCount();
        if($count == 1){


        $q = $db->prepare("SELECT * FROM articles WHERE id=?");
        $q->execute([$id]);
        $req = $q->fetch();

    ?>

<!-- Modal -->
<div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 style="color:black;" class="modal-title" id="buyModalLabel">Purchase a beat!</h4>
      </div>
      <div class="modal-body">
            <form action="payment/payment.php" method="post" id="paypal_form" target="_blank">
            <input type="hidden" name="id" value="<?php echo $req['id'];?>" />
            <h3 style="color:black;">Buy beat - <?php echo $req['title'];?> (<?php echo $req['price'];?> €)</h3>
            <div class="form-group">
            <label for="inputEmail">Your email <em>(The download link will be sent to you)</em></label>
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Your email adresss" required>
            </div>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">Submit</button>
            </form>


      </div>
    </div>
  </div>
</div>



<?php }

}?>

<?php
            if(isset($_GET['success'])){
        $id = $_GET['success'];

        $q = $db->prepare("SELECT * FROM articles WHERE id=?");
        $q->execute([$id]);
        $count = $q->rowCount();
        if($count == 1){


        $q = $db->prepare("SELECT * FROM articles WHERE id=?");
        $q->execute([$id]);
        $req = $q->fetch();

    ?>

<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 style="color:green;" class="modal-title" id="successModalLabel">Payment successfull!</h3>
      </div>
      <div class="modal-body">
            <h3 style="color:black;">Your payment was proccessed and you will soon recieve an email with a download link to your beat.</h3><br>
            <p style="color:black;">Product information:</p>
            
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                        <thead>
                        <tr style="color:black;">
                            <th>Title :</th>
                            <th>Tags :</th>
                            <th>Length :</th>
                            <th>Price :</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th><?php echo $req['title'];?></th>
                            <th><?php echo $req['tags'];?></th>
                            <th><?php echo $req['length'];?></th>
                            <th><?php echo $req['price'];?></th>
                        </tr>
                        </tbody>
              </table>
              <button type="button" class="btn btn-warning pull-right" data-dismiss="modal">Close</button>
            </div>
      </div>
    </div>
  </div>
</div>



<?php }

}?>

        <?php include("includes/beats.php"); ?>
        <?php include("includes/videos.php"); ?>
        <?php //include("includes/contact.php"); ?>

    </div>
    <!--// Main Content \\-->

    <?php include("includes/footer.php"); ?>

    <div class="clearfix"></div>
</div>
<!--// Main Wrapper \\-->

<!-- jQuery (necessary for JavaScript plugins) -->
<script type="text/javascript" src="script/jquery.js"></script>
<script type="text/javascript" src="script/modernizr.js"></script>
<script type="text/javascript" src="script/jquery-ui.js"></script>
<script type="text/javascript" src="script/bootstrap.min.js"></script>
<script type="text/javascript" src="script/jquery.prettyphoto.js"></script>
<script type="text/javascript" src="script/jquery.countdown.min.js"></script>
<script type="text/javascript" src="script/fitvideo.js"></script>
<script type="text/javascript" src="script/skills.js"></script>
<script type="text/javascript" src="script/slick.slider.min.js"></script>
<script type="text/javascript" src="script/jquery.jplayer.js"></script>
<script type="text/javascript" src="script/jplayer.playlist.js"></script>
<script type="text/javascript" src="script/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="script/moment.min.js"></script>
<script type="text/javascript" src="script/fullcalendar.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="script/waypoints-min.js"></script>
<script type="text/javascript" src="script/isotope.min.js"></script>
<script type="text/javascript" src="script/functions.js"></script>
<script type="text/javascript">
$(document).ready(function () {

    $('#buyModal').modal('show');

});
</script>
<script type="text/javascript">
$(document).ready(function () {

    $('#successModal').modal('show');

});
</script>
<?php include 'includes/playlist.php' ?>



</body>
</html>