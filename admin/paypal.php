<?php
include 'includes/header.php';
            if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['apiSignature'])){
            
                        $q = $db->prepare('UPDATE paypal SET username=?, password=? WHERE id=1');
                        $q->execute([$_POST['username'], $_POST['password']]);
                        $q = $db->prepare('UPDATE paypal SET apiSignature=? WHERE id=1');
                        $q->execute([$_POST['apiSignature']]);

            }

        $q = $db->prepare('SELECT * from paypal WHERE id=1');
        $q->execute([]);
        $req = $q->fetch();
            

        

    

?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Administration
                    <small>> Edit Paypal API Credentials</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Administration</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> > Edit Paypal API Credentials
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">
                        
                        <p>Warning, you must have a business account to use the paypal api!</p>

                        <form action="paypal.php" method="post">
                            <h3>Change Paypal API Information</h3>
                            <div class="form-group">
                                <label for="inputUsername">Username</label>
                                <input type="text" name="username" class="form-control" id="inputUsername" value="<?php echo $req['username']?>" placeholder="Your Paypal API username" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <input type="text" name="password" class="form-control" id="inputPassword" value="<?php echo $req['password']?>" placeholder="Your Paypal API password" required>
                            </div>
                            <div class="form-group">
                                <label for="inputSignature">API Signature</label>
                                <input type="text" name="apiSignature" class="form-control" id="inputSignature" value="<?php echo $req['apiSignature']?>" placeholder="Your Paypal API Signature" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

            </div>
        </div>

<?php
include 'includes/footer.php';
?>