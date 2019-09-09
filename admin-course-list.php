<?php 
	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
	$userId = $adminType = '';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$userId = $_COOKIE['user-id'];

				$stmt 	= $conn->prepare('SELECT `admin_type` FROM `admins` WHERE `user_id` = ?');
				$stmt   ->execute(array($userId));
				$row 	= $stmt->fetch();
				$adminType = $row['admin_type'];
				// Fetch Courses For This Admin
				if(strlen($adminType)== 1){
					$adminType = '000' . $adminType;
				} else if(strlen($adminType)==2){
					$adminType = '00' . $adminType;
				} else if(strlen($adminType)==3){
					$adminType = '0' . $adminType;
				}
				if($adminType[3] == 1) {
					$stmt 	= $conn->prepare('SELECT `name`, `weight`, `id` FROM `uni_mand_courses`');
					$stmt   ->execute();
					$rows 	= $stmt->fetchall();
					foreach ($rows as $row) { ?>
						<tr>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['id']; ?></td>
										<td><?php echo $row['weight']; ?></td>
						</tr>
					<?php }
				} elseif ($adminType[3] == 2) {
					$stmt 	= $conn->prepare('SELECT `name`, `weight`, `id` FROM `uni_opt_courses`');
					$stmt   ->execute();
					$rows 	= $stmt->fetchall();
					foreach ($rows as $row) { ?>
						<tr>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['id']; ?></td>
										<td><?php echo $row['weight']; ?></td>
						</tr>
					<?php }
				} elseif ($adminType[3] == 3) {
					$stmt 	= $conn->prepare('SELECT `name`, `id`, `weight` FROM `coll_mand_courses` WHERE `coll_id` = ?');
					$stmt   ->execute(array($adminType[0]));
					$rows 	= $stmt->fetchall();
					foreach ($rows as $row) { ?>
						<tr>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['id']; ?></td>
										<td><?php echo $row['weight']; ?></td>
						</tr>
					<?php }
				} elseif ($adminType[3] == 4) {
					$stmt 	= $conn->prepare('SELECT `name`, `id`, `weight` FROM `sp_mand_courses` WHERE `sp_id` = ?');
					$stmt   ->execute(array($adminType[1] . $adminType[2]));
					$rows 	= $stmt->fetchall();
					foreach ($rows as $row) { ?>
						<tr>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['id']; ?></td>
										<td><?php echo $row['weight']; ?></td>
						</tr>
					<?php }
				} elseif ($adminType[3] == 5) {
					$stmt 	= $conn->prepare('SELECT `name`, `id`, `weight` FROM `sp_opt_courses` WHERE `sp_id` = ?');
					$stmt   ->execute(array($adminType[1] . $adminType[2]));
					$rows 	= $stmt->fetchall();
					foreach ($rows as $row) { ?>
						<tr>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['id']; ?></td>
										<td><?php echo $row['weight']; ?></td>
						</tr>
					<?php }
				} elseif ($adminType[3] == 6) {
					$stmt 	= $conn->prepare('SELECT `name`, `weight`, `id` FROM `uni_other_courses`');
					$stmt   ->execute();
					$rows 	= $stmt->fetchall();
					foreach ($rows as $row) { ?>
						<tr>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['id']; ?></td>
										<td><?php echo $row['weight']; ?></td>
						</tr>
					<?php }
				}
		} else {
			header('Location: http://localhost/eduMedia/');
			exit;
		}