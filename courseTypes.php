<?php 

	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$newSp = $_POST['new-sp'];
	}
	else {
		if(!isset($_COOKIE['user-sp'])) {
	    	$newSp = 1;
	    } else if(isset($_SESSION['user-sp'])){
	    	$newSp  = $_SESSION['user-sp'];
	    } else{
	    	$newSp = $_COOKIE['user-sp'];
	    }
	}
		if(!isset($_COOKIE['user-id'])) {
	    	$in = 0;
	    } else {
	    	$in = 1;
	    }
		// Retreav Collage Data
		$stmt 	= $conn->prepare('SELECT * FROM `course_type`');
		$stmt   ->execute();
		$rows   = $stmt ->fetchall();
		foreach ($rows as $row) { ?>
					<li class="change-courses" onclick="
						var coursesType = $(this).attr('value');
				        var newSp       = $(this).attr('sp');
				        $.ajax({  
				                  type: 'POST',
				                  url: 'getCourses.php',
				                  data: {
				                    'courses-type' : coursesType,
				                    'new-sp' : newSp
				                  },
				                  success : function(data) {
				                    $('#ct' + coursesType).html(data);
				                  },
				                  error : function(){
				                        alert('Whoops! This didn\'t work. Please contact us.');
				                    }
				                });
					" sp="<?php echo $newSp;?>" value="<?php echo $row['course_type_id']; ?>">
						<div class="collapsible-header">
							<i class="material-icons">queue</i><?php echo $row['course_type_name']; ?>
						</div>
						<div class="collapsible-body">
					<?php if($in == 1 ){ ?>
							<a href="#ask-for-course" admin-id="
								<?php 
									$getColl 	= $conn->prepare('SELECT`sp_col_fk` FROM `specialty` WHERE `sp_id` = ?');
									$getColl  	->execute(array($newSp));
									$co 		= $getColl ->fetch();
									$coll 	= $co['sp_col_fk'];
									if($row['course_type_id'] <6 && $row['course_type_id'] >3){
										$tempNewCourse = $newSp;
										if($newSp < 10 ) {
											$tempNewCourse = '0'. $newSp;
										}
										echo $coll . $tempNewCourse . $row['course_type_id'];
									}
									else if($row['course_type_id'] == 3){
										echo $coll . '00' . $row['course_type_id'];
									} else {
										echo '000' . $row['course_type_id'];
									}
									?>
							" class="ask asc hoverable tooltipped modal-trigger" onClick="
								$('#asc #admin-id').attr('value', $.trim($(this).attr('admin-id')));
							" data-position="top" data-delay="50" data-tooltip="أطلب من المسؤول إضافة مادة">أطلب مادة</a>
					<?php 
						}else {?>
							<a href="#login" class="ask hoverable tooltipped modal-trigger" data-position="top" data-delay="50" data-tooltip="قم بتسجيل الدخول لتتمتع بهذه الميزة">أطلب مادة</a>
						<?php } ?>
 
						<table class="bordered striped centered courses-table">
							<thead>
								<tr>
										<th>تنزيل ومشاركة</th>
										<th>عدد التنزيلات</th>
										<th>اسم المساق</th>
								</tr>
							</thead>
							<tbody id="ct<?php echo $row['course_type_id']; ?>">

							</tbody>
						</table>
				</div>
					</li>
		<?php } ?>