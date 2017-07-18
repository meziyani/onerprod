<?php
include 'includes/header.php';
		if(isset($_POST['user'])){

            $q = $db->prepare("SELECT * FROM admins WHERE userName=?");
            $q->execute([$_SESSION['user']]);       
            $req = $q->fetch();

            if(isset($_POST['old']) && isset($_POST['new']) && isset($_POST['confirm'])){
            
                        if($req['userPass'] == hash("sha256" , $_POST['old'])){
                        if($_POST['new'] == $_POST['confirm']){
                            $q = $db->prepare("UPDATE admins SET userPass=? WHERE userName=?");
                            $q->execute([hash("sha256" , $_POST['new']), $_SESSION['user']]);

                            header("Location: logout.php?logout");
                        } else{
                            header('Location: error.php?error=You did not confirm your password the right way&prev=profile.php');
                        }

                }
            }

            if($_SESSION['user'] != $_POST['user']){
            $q = $db->prepare("UPDATE admins SET userName=? WHERE userName=?");
            $q->execute([$_POST['user'], $_SESSION['user']]);

            header("Location: logout.php?logout");

            }
            

			
		}
            

        

    

?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Administration
                    <small>> Edit Profile</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Administration</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> > Edit Profile
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">
                        
                        <form action="profile.php" method="post">
                            <h3>Change Password</h3>
                            <div class="form-group">
                                <label for="inputOld">Old Password</label>
                                <input type="password" name="old" class="form-control" id="inputOld" placeholder="Your old password">
                            </div>
                            <div class="form-group">
                                <label for="inputNew">New Password</label>
                                <input type="password" name="new" class="form-control" id="inputConfirm" placeholder="Your new password">
                            </div>
                            <div class="form-group">
                                <label for="inputConfirm">Confirm</label>
                                <input type="password" name="confirm" class="form-control" id="inputConfirm" placeholder="Confirm new password">
                            </div>
                            <h3>Change Username</h3>
                            <div class="form-group">
                                <label for="inputUser">Username</label>
                                <input type="text" name="user" value="<?php echo $_SESSION['user'];?>" class="form-control" id="inputUser" placeholder="Change your username" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

            </div>
        </div>

<?php
include 'includes/footer.php';
?>