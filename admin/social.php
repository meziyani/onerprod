<?php
include 'includes/header.php';
		if(isset($_POST['youtube'])){
			$q = $db->prepare("UPDATE settings SET youtube=?, instagram=?, twitter=?, soundcloud=?, facebook=? WHERE id=1");
            $q->execute([$_POST['youtube'], $_POST['instagram'] ,$_POST['twitter'] ,$_POST['soundcloud'] ,$_POST['facebook']]);
		}
            

        $q = $db->prepare("SELECT * FROM settings WHERE id=1");
        $q->execute();       
        $req = $q->fetch();

    

?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Administration
                    <small>Articles > Edit Social Links</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Administration</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Articles > Edit Social Links
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">
                        <form action="social.php" method="post">
                            <div class="form-group">
                                <label for="inputYoutube">Youtube</label>
                                <input type="text" value="<?php echo $req['youtube']?>" name="youtube" class="form-control" id="inputYoutube" placeholder="Youtube">
                            </div>
                            <div class="form-group">
                                <label for="inputInstagram">Instagram</label>
                                <input type="text" value="<?php echo $req['instagram']?>" name="instagram" class="form-control" id="inputInstagram" placeholder="Instagram">
                            </div>
                            <div class="form-group">
                                <label for="inputTwitter">Twitter</label>
                                <input type="text" value="<?php echo $req['twitter']?>" name="twitter" class="form-control" id="inputTwitter" placeholder="Twitter">
                            </div>
                            <div class="form-group">
                                <label for="inputSoundcloud">Soundcloud</label>
                                <input type="text" value="<?php echo $req['soundcloud']?>" name="soundcloud" class="form-control" id="inputSoundcloud" placeholder="Soundcloud">
                            </div>
                            <div class="form-group">
                                <label for="inputFacebook">Facebook</label>
                                <input type="text" value="<?php echo $req['facebook']?>" name="facebook" class="form-control" id="inputFacebook" placeholder="facebook">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

            </div>
        </div>

<?php
include 'includes/footer.php';
?>