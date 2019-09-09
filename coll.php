<?php 

	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database

		// Retreav Collage Data
		$stmt 	= $conn->prepare('SELECT * FROM `collage`');
		$stmt   ->execute();
		$rows   = $stmt ->fetchall();
		foreach ($rows as $row) { ?>
					<li >
						<a  >
							<img class="tooltipped change-col" value="<?php echo $row['col_id']; ?>" col-name="<?php echo $row['col_name']; ?>" data-position="buttom" data-delay="50" data-tooltip="<?php echo $row['col_name']; ?>" src=" 
							<?php echo $coll . $row['col_pic'] ?>">
						</a>
					</li>
		<?php } ?>