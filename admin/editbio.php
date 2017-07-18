<?php
include 'includes/header.php';
        
        if(isset($_POST['biofr'])){
            $q = $db->prepare("UPDATE settings SET biofr=?, bioen=? WHERE id=1");
            $q->execute([$_POST['biofr'], $_POST['bioen']]);
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
                    <small>Articles > Edit Biography</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Administration</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Articles > Edit Biography
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">
                        <form action="editbio.php" method="post">
                        	<label for="biofr">Biographie en francais</label><br>
                            <textarea name="biofr" id="biofr" cols="40" rows="4" tabindex="80"><?php echo $req['biofr']?></textarea><br />
                            <label for="bioen">Biographie en anglais</label><br>
                            <textarea name="bioen" id="bioen" cols="40" rows="4" tabindex="80"><?php echo $req['bioen']?></textarea><br />
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

            </div>
        </div>

<?php
include 'includes/footer.php';
?>