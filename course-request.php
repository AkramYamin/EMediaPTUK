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
				$req 	= $conn->prepare('SELECT `content_name`, req_id FROM `ask_course` WHERE `course_admin_id` = ? and `status` = 1');
				$req   ->execute(array($adminType));
				$res 	= $req->fetchall();
				foreach ($res as $re) {?>
					<li class="row"> مرحبا 
						<span class="name"><?php echo $adminName; ?></span>
						أرجو منك إضافة مادة
						<span class="cour" req-id="<?php echo$re['req_id']; ?>"><?php echo $re['content_name']; ?></span>
						<div>
						<button class="add hoverable">إضافة</button>
						<button class="del hoverable" onclick="
				              var reqId = $(this).parent().siblings('.cour') .attr('req-id'),
				              that = $(this);
				              $.ajax({  
				                    type: 'POST',
				                    url: 'del-course-req.php',
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
						">حذف</button>
						</div>
					</li>

				<?php }

		} else {
			header('Location: http://localhost/eduMedia/');
			exit;
		}