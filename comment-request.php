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
					// Get Admin Name
				$adminName 	= $conn->prepare('SELECT `user_nic_name` FROM `users` WHERE `user_id` = ?');
				$adminName   ->execute(array($userId));
				$adm 	= $adminName->fetch();
				$adminName = $adm['user_nic_name'];

				//Fetch Course Requests For This Admin
				$req 	= $conn->prepare('SELECT `other_desc`, `other_course`, other_id FROM `others` WHERE `other_admin_id` = ? and `other_status` =0');
				$req   ->execute(array($adminType));
				$res 	= $req->fetchall();
				foreach ($res as $re) {?>
						<li class="row">
							<span class="mat-name"><?php
						 	//Fetch Course Name
						 	if(strlen($adminType)== 1){
								$adminType = '000' . $adminType;
							} else if(strlen($adminType)==2){
								$adminType = '00' . $adminType;
							} else if(strlen($adminType)==3){
								$adminType = '0' . $adminType;
							}
								if($adminType[3] == 1) {
									$cour 	= $conn->prepare('SELECT `name` FROM `uni_mand_courses` WHERE `id` = ?');
									$cour   ->execute(array($re['other_course']));
									$courseName	= $cour->fetch();
								  	echo $courseName['name']; 
								} elseif ($adminType[3] == 2) {
									$cour 	= $conn->prepare('SELECT `name` FROM `uni_opt_courses` WHERE `id` = ?');
									$cour   ->execute(array($re['other_course']));
									$courseName	= $cour->fetch();
								  	echo $courseName['name']; 
								} elseif ($adminType[3] == 3) {
									$cour 	= $conn->prepare('SELECT `name` FROM `coll_mand_courses` WHERE `id` = ?');
									$cour   ->execute(array($re['other_course']));
									$courseName	= $cour->fetch();
								  	echo $courseName['name']; 
								} elseif ($adminType[3] == 4) {
									$cour 	= $conn->prepare('SELECT `name` FROM `sp_mand_courses` WHERE `id` = ?');
									$cour   ->execute(array($re['other_course']));
									$courseName	= $cour->fetch();
								  	echo $courseName['name']; 
								} elseif ($adminType[3] == 5) {
									$cour 	= $conn->prepare('SELECT `name` FROM `sp_opt_courses` WHERE `id` = ?');
									$cour   ->execute(array($re['other_course']));
									$courseName	= $cour->fetch();
								  	echo $courseName['name']; 
								} elseif ($adminType[3] == 6) {
									$cour 	= $conn->prepare('SELECT `name` FROM `uni_other_courses` WHERE `id` = ?');
									$cour   ->execute(array($re['other_course']));
									$courseName	= $cour->fetch();
								  	echo $courseName['name']; 
								}
						  ?></span>
							<span class="comm-content" req-id="<?php echo $re['other_id'] ; ?>"><?php echo $re['other_desc']; ?></span>
							<div class="tow-btn">
								<button class="accept hoverable" onclick="
							              var reqId = $(this).parent().siblings('.comm-content').attr('req-id'),
							              that = $(this);
							              $.ajax({  
							                    type: 'POST',
							                    url: 'accept-comment-req.php',
							                    data: {
							                      'reqId' : reqId
							                    },
							                    success : function(data) {
							                    	that.closest('li').remove();
							                    },
							                    error : function(){
							                          alert('Whoops! This didn\'t work. Please contact us.');
							                      }
							              });
						">قبول</button>
								<button class="den hoverable"onclick="
							              var reqId = $(this).parent().siblings('.comm-content').attr('req-id'),
							              that = $(this);
							              $.ajax({  
							                    type: 'POST',
							                    url: 'del-comment-req.php',
							                    data: {
							                      'reqId' : reqId
							                    },
							                    success : function(data) {	
							                    	that.closest('li').remove();
							                    },
							                    error : function(){
							                          alert('Whoops! This didn\'t work. Please contact us.')
							                      }
							              });
						">رفض</button>
							</div>
						</li>
				<?php }

		} else {
			header('Location: http://localhost/eduMedia/');
			exit;
		}