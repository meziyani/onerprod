<h1>An error has occured!</h1>
<?php 
	session_start();
	if(isset($_SESSION['user'])){
		if(isset($_GET['error']) && !empty($_GET['error'])){
			echo $_GET['error'];
			if(isset($_GET['prev']) && !empty($_GET['prev'])){
				echo '<br><a href="'.$_GET['prev'].'">Go to the previous page.</a>';
			}
		}
	} else {
		header('Location: index.php');
	}


?>