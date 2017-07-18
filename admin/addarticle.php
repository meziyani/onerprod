<?php
include 'includes/header.php';
            
        if(isset($_POST['title'])){

            $dossier = '../prelisten/';
            $fichier = $_FILES['listen']['name'];
            move_uploaded_file($_FILES['listen']['tmp_name'], $dossier . $fichier);
            $dossier = '../covers/';
            $fichier = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier);

            $q = $db->prepare("INSERT into articles (title,tags,length,image,type,sold,price,listen,download) VALUES (?,?,?,?,?,?,?,?,?)");
            $q->execute([$_POST['title'], $_POST['tags'], $_POST['length'], $_FILES['image']['name'], $_POST['type'],$_POST['sold'],$_POST['price'],$_FILES['listen']['name'],$_POST['download']]);

            
        }


?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Administration
                    <small>Articles > Add Article</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Administration</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Articles > Add Article
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">
                        <form action="addarticle.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputTitle">Title</label>
                                <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Title" required>
                            </div>
                            <div class="form-group">
                                <label for="inputTags">Tags</label>
                                <input type="text" name="tags" class="form-control" id="inputTags" placeholder="Tags" required>
                            </div>
                            <div class="form-group">
                                <label for="inputLength">Length</label>
                                <input type="text" name="length" class="form-control" id="inputLength" placeholder="Length" required>
                            </div>
                            <div class="form-group">
                                <label for="inputImage">Image</label>
                                <input type="file" name="image" class="form-control" id="inputImage" placeholder="Image" required>
                            </div>
                            <div class="form-group">
                                <label for="inputType">Type</label>
                                <input type="text" name="type" class="form-control" id="inputType" placeholder="0 = Vente Illimitée && 1 = Vente Unique" required>
                            </div>
                            <div class="form-group">
                                <label for="inputState">State</label>
                                <input type="text" name="sold" class="form-control" id="inputState" placeholder="0 = Non vendu && 1 = Vendu" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPrice">Price</label>
                                <input type="text" name="price" class="form-control" id="inputPrice" placeholder="Price (En euros)" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPrelisten">Prelisten</label>
                                <input type="file" name="listen" class="form-control" id="inputPrelisten" placeholder="Prelisten" required>
                            </div>
                            <div class="form-group">
                                <label for="inputDownload">Download</label>
                                <input type="text" name="download" class="form-control" id="inputDownload" placeholder="Download" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

            </div>
        </div>

<?php
include 'includes/footer.php';
?>