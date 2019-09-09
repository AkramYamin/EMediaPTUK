<?php 

	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
	/*
	$collage = '';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$collage = $_POST['coll-id']; 
	} else {
		$collage = $_COOKIE['user-coll'];
	} */

		// Retreav Collage Data
		$stmt 	= $conn->prepare('SELECT * FROM `collage`');
		$stmt   ->execute();
		$rows   = $stmt ->fetchall();
		foreach ($rows as $row) { ?>
					<li class="change-col hide-coll" style="display: none" col-name="<?php echo $row['col_name']; ?>" value="<?php echo $row['col_id'] ; ?>"><a><img src="<?php echo $coll . $row['col_pic'] ?>"> <span>
						<?php echo $row['col_name'] ; ?>
					</span></a></li>
		<?php } ?>