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

				//Fetch Material Types
					$cont 	= $conn->prepare('SELECT `content_type_name` FROM `content_types`');
					$cont   ->execute();
					$types 	= $cont->fetchall();

				//Fetch Course Requests For This Admin
				$req 	= $conn->prepare('SELECT `course_id`, `material_type` ,req_id FROM `ask_material` WHERE `admin_id` = ? and `status` = 1');
				$req   ->execute(array($adminType));
				$res 	= $req->fetchall();
				foreach ($res as $re) {?>
					<li class="row"> مرحبا 
						<span class="name"><?php echo $adminName; ?></span>
						 أرجو منك إضافة
						 <span class="con"><?php echo $types[$re['material_type']-1]['content_type_name']; ?></span> لمادة
						 <span class="cour" req-id="<?php echo $re['req_id']; ?>"><?php
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
									$cour   ->execute(array($re['course_id']));
									$courseName	= $cour->fetch();
								  	echo $courseName['name']; 
								} elseif ($adminType[3] == 2) {
									$cour 	= $conn->prepare('SELECT `name` FROM `uni_opt_courses` WHERE `id` = ?');
									$cour   ->execute(array($re['course_id']));
									$courseName	= $cour->fetch();
								  	echo $courseName['name']; 
								} elseif ($adminType[3] == 3) {
									$cour 	= $conn->prepare('SELECT `name` FROM `coll_mand_courses` WHERE `id` = ?');
									$cour   ->execute(array($re['course_id']));
									$courseName	= $cour->fetch();
								  	echo $courseName['name']; 
								} elseif ($adminType[3] == 4) {
									$cour 	= $conn->prepare('SELECT `name` FROM `sp_mand_courses` WHERE `id` = ?');
									$cour   ->execute(array($re['course_id']));
									$courseName	= $cour->fetch();
								  	echo $courseName['name']; 
								} elseif ($adminType[3] == 5) {
									$cour 	= $conn->prepare('SELECT `name` FROM `sp_opt_courses` WHERE `id` = ?');
									$cour   ->execute(array($re['course_id']));
									$courseName	= $cour->fetch();
								  	echo $courseName['name']; 
								} elseif ($adminType[3] == 6) {
									$cour 	= $conn->prepare('SELECT `name` FROM `uni_other_courses` WHERE `id` = ?');
									$cour   ->execute(array($re['course_id']));
									$courseName	= $cour->fetch();
								  	echo $courseName['name']; 
								}
						  ?></span>
						 <div>
						 <button class="add hoverable">إضافة</button>
						 <button class="del hoverable" onclick="
				              var reqId = $(this).parent().siblings('.cour').attr('req-id');
				              var that = $(this);
				              $.ajax({  
				                    type: 'POST',
				                    url: 'del-content-req.php',
				                    data: {
				                      'req_id' : reqId
				                    },
				                    success : function(data) {	
				                    	that.closest('li').remove();
				                    },
				                    error : function(){
				                          alert('Whoops! This didn\'t work. Please contact us.')
				                      }
				              });
						">حذف</button>
						 </div>
					</li>
				<?php }

		} else {
			header('Location: http://localhost/eduMedia/');
			exit;
		}