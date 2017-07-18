<?php
include 'includes/header.php';

		if(isset($_POST['ytid1'])){
			$i = 0;
			while($i < 3){
				$q = $db->prepare('UPDATE videos SET youtubeid=?, title=?, description=?, date=? WHERE id=?');
				$q->execute([$_POST['ytid'.($i+1)], $_POST['title'.($i+1)], $_POST['description'.($i+1)], $_POST['date'.($i+1)], $i+1]);
				$i++;
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

            <div class="container col-lg-6">
                        <form action="videos.php" method="post">
                        	<?php 

                        		$q = $db->prepare('SELECT * from videos');
                        		$q->execute();
                        		$result = $q->fetchAll();
                        		foreach ($result as $row) {

                        	?>
                        	<h2>Video <?php echo $row['id'];?></h2>
                            <div class="form-group">
                                <label for="ytid<?php echo $row['id'];?>">Youtube ID</label>
                                <input type="text" value="<?php echo $row['youtubeid']?>" name="ytid<?php echo $row['id'];?>" class="form-control" id="ytid<?php echo $row['id'];?>" required>
                            </div>
                            <div class="form-group">
                                <label for="date<?php echo $row['id'];?>">Date</label>
                                <input type="date" value="<?php echo $row['date']?>" name="date<?php echo $row['id'];?>" class="form-control" id="date<?php echo $row['id'];?>" required>
                            </div>
                            <div class="form-group">
                                <label for="title<?php echo $row['id'];?>">Title</label>
                                <input type="text" value="<?php echo $row['title']?>" name="title<?php echo $row['id'];?>" class="form-control" id="title<?php echo $row['id'];?>" required>
                            </div>
                            <div class="form-group">
                                <label for="description<?php echo $row['id'];?>">Description</label>
                                <input type="text" value="<?php echo $row['description']?>" name="description<?php echo $row['id'];?>" class="form-control" id="description<?php echo $row['id'];?>" required>
                            </div>
                            <?php }?>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

            </div>

        </div>
        <!-- /.row -->



<?php
include 'includes/footer.php';
?>