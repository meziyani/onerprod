<?php
include 'includes/header.php';
        
		

        if(isset($_GET['delete'])){
        	$q = $db->prepare("SELECT * FROM articles WHERE id=?");
        	$q->execute([$_GET['delete']]);
            $req = $q->fetch();

			unlink('../prelisten/'.$req['listen']);
			unlink('../covers/'.$req['image']);

        	$q =$db->prepare('DELETE FROM articles WHERE id = ?');
        	$q->execute([$_GET['delete']]);

        	header('Location: articles.php');
        }

        if(isset($_POST['id'])){
            $q = $db->prepare("UPDATE articles SET title=?, tags=?, length=?, image=?, type=?, sold=?, price=?, listen=?, download=? WHERE id=?");
            $q->execute([$_POST['title'], $_POST['tags'], $_POST['length'], $_POST['image'], $_POST['type'],$_POST['sold'],$_POST['price'],$_POST['listen'],$_POST['download'],$_POST['id']]);
        }

        


        $q = $db->prepare("SELECT * FROM articles WHERE id=?");
        if(!isset($_GET['id'])){
            $q->execute([$_POST['id']]);
        }else{
            $q->execute([$_GET['id']]);
        }
        
        $req = $q->fetch();

    

?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Administration
                    <small>Articles > Edit Article</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Administration</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Articles > Edit Article
                    </li>
                </ol>
            </div>

            <div class="container col-lg-12">
            <h3>Click on this big red button to delete the article. <strong>Be careful! </strong> <a href="?delete=<?php 
            				if(!isset($_GET['id'])){
					            echo $_POST['id'];
					        }else{
					            echo $_GET['id'];
					        }
            			?>"><button class="btn btn-danger">Delete</button></a><hr></h3>
                    <br>
            			
                        <form action="editarticle.php" method="post">
                            <div class="form-group">
                                <label for="id">Id (Ne pas toucher idéalement)</label>
                                <input type="text" value="<?php echo $req['id']?>" name="id" class="form-control" id="id" placeholder="Ne pas toucher">
                            </div>
                            <div class="form-group">
                                <label for="inputTitle">Title</label>
                                <input type="text" value="<?php echo $req['title']?>" name="title" class="form-control" id="inputTitle" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="inputTags">Tags</label>
                                <input type="text" value="<?php echo $req['tags']?>" name="tags" class="form-control" id="inputTags" placeholder="Tags">
                            </div>
                            <div class="form-group">
                                <label for="inputLength">Length</label>
                                <input type="text" value="<?php echo $req['length']?>" name="length" class="form-control" id="inputLength" placeholder="Length">
                            </div>
                            <div class="form-group">
                                <label for="inputImage">Image</label>
                                <input type="text" value="<?php echo $req['image']?>" name="image" class="form-control" id="inputImage" placeholder="Image">
                            </div>
                            <div class="form-group">
                                <label for="inputType">Type</label>
                                <input type="text" value="<?php echo $req['type']?>" name="type" class="form-control" id="inputType" placeholder="0 = Vente Illimitée && 1 = Vente Unique">
                            </div>
                            <div class="form-group">
                                <label for="inputState">State</label>
                                <input type="text" value="<?php echo $req['sold']?>" name="sold" class="form-control" id="inputState" placeholder="0 = Non vendu && 1 = Vendu">
                            </div>
                            <div class="form-group">
                                <label for="inputPrice">Price</label>
                                <input type="text" value="<?php echo $req['price']?>" name="price" class="form-control" id="inputPrice" placeholder="Price">
                            </div>
                            <div class="form-group">
                                <label for="inputPrelisten">Prelisten</label>
                                <input type="text" value="<?php echo $req['listen']?>" name="listen" class="form-control" id="inputPrelisten" placeholder="Prelisten">
                            </div>
                            <div class="form-group">
                                <label for="inputDownload">Download</label>
                                <input type="text" value="<?php echo $req['download']?>" name="download" class="form-control" id="inputDownload" placeholder="Download">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <hr>
                    
                    

            </div>

        </div>
        <!-- /.row -->



<?php
include 'includes/footer.php';
?>