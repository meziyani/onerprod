<?php
include 'includes/header.php';
//$SQL = "INSERT INTO articles VALUES ('','G-Eazy - Guala','Rap, Beat, Cloud rap','5:16','http://www.rap-up.com/app/uploads/2017/03/g-eazy-dj-carnage-guala1.jpg', 0, 0, 32.55, 'G-Eazy, Carnage - Guala ft. Thirty Rack.mp3', '')";
//$db->query($SQL);
?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Administration
                    <small>Articles</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Administration</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Articles
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <h2>Articles <a href="addarticle.php"><button type="button" class="btn btn-default">Add Article</button></a></h2> 
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Tags</th>
                            <th>Length</th>
                            <th>Image</th>
                            <th>Type</th>
                            <th>State</th>
                            <th>Price</th>
                            <th>Prelisten</th>
                            <th>Download</th>
                            <th>Modifier</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $SQL = "SELECT * FROM articles";
                                $reponse = $db->query($SQL);
                                while ($req = $reponse->fetch()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $req['title']; ?></td>
                                        <td><?php echo $req['tags']; ?></td>
                                        <td><?php echo $req['length']; ?></td>
                                        <td><?php echo $req['image']; ?></td>
                                        <td><?php if($req['type'] == 0){
                                                echo '<button class="btn btn-basic">Vente non-restreinte</button>';
                                            } else {
                                                echo '<button class="btn btn-basic">Vente unique</button>';
                                            }?></td>
                                        <td><?php if($req['type'] == 0){
                                                echo '(Vente non-restreinte)';
                                            } else {
                                                if($req['sold'] == 0){
                                                    echo '<button class="btn btn-warning">Non vendu</button>';
                                                } else {
                                                    echo '<button class="btn btn-success">Vendu</button>';
                                                }
                                            }
                                            ?></td>
                                        <td><?php echo $req['price']; ?></td>
                                        <td><?php echo $req['listen']; ?></td>
                                        <td><?php echo $req['download']; ?></td>
                                        <td><a href="editarticle.php?id=<?php echo $req['id']?>"><button class="btn btn-default">Modifier</button></a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<?php
include 'includes/footer.php';
?>