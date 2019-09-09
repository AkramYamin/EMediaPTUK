<?php 
	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
	
	$courses = '';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$courses = $_POST['courses'];
			$stmt 	= $conn->prepare('DELETE FROM `user_schedual` WHERE `user_id` = ?');
			$stmt   ->execute(array($_COOKIE['user-id']));
			?>
			<script src="<?php echo $js; ?>materialize.min.js"></script>
			<?php
			foreach ($courses as $course) {
				$course = str_replace("\n", "", $course);
				$res = explode(',', $course);
				$stmt 	= $conn->prepare('INSERT INTO `user_schedual`(`user_id`, `course_id`, `course_type`) VALUES (?, ?, ?)');
				$stmt   ->execute(array($_COOKIE['user-id'], $res[0], $res[1]));
						if($res[1] == 1) {?>
							<li class="collection-item dismissable">
								<div><span style="
									background-color: #FAF3DF;
									padding: 2px 6px;
									border-radius: 7px;
								">
								<?php $cn 	= $conn->prepare('SELECT `name` FROM `uni_mand_courses` WHERE `id` = ?');
											$cn   ->execute(array($res[0]));
											$cnr 	= $cn->fetch();
											echo $cnr['name'];
											?></span><input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>share.php?course-id=<?php echo $course; ?>&ct=<?php echo '1' ?>
										">
										<a onclick="
											$(this).prev('#courseUrl').val($(this).prev('#courseUrl').val().replace(/\s/g,''));
   											$(this).prev('#courseUrl').select();
   											try{
   											document.execCommand('copy');
   											 Materialize.toast('تم نسخ الرابط الى الحافظة', 4000);
   										} catch (err){
   											 Materialize.toast('حدث خطأ', 4000);
   										}
										" class=" tooltipped cop secondary-content" data-position="top" data-delay="50" data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $course; ?>">
																<i class="material-icons hvr-float-shadow">content_copy</i>
															</a>
															<a href="#sad" id="course-details" course-id="<?php echo $course; ?>" onclick="
																var coursesId = $(this).attr('course-id');
														        $.ajax({  
														                  type: 'POST',
														                  url: 'uni-mand-course-details.php',
														                  data: {
														                    'course-id' : coursesId
														                  },
														                  success : function(data) {
														                    $('#cd').html(data);
														                  },
														                  error : function(){
														                        alert('Whoops! This didn\'t work. Please contact us.')
														                    }
														                });

															" class="secondary-content tooltipped dow modal-trigger modal-close mmmmmmm" data-position="top" data-delay="50" data-tooltip="تحميل ملفات المادة">
																<i class="fa fa-book hvr-icon-down" aria-hidden="true"></i>
															</a>
											</a>
										</div>
									</li>
									<?php 
						} elseif ($res[1] == 2) {
								?>
							<li class="collection-item dismissable">
								<div><span style="
									background-color: #FAF3DF;
									padding: 2px 6px;
									border-radius: 7px;
								">
								<?php $cn 	= $conn->prepare('SELECT `name` FROM `uni_opt_courses` WHERE `id` = ?');
											$cn   ->execute(array($res[0]));
											$cnr 	= $cn->fetch();
											echo $cnr['name'];
											?></span><input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>share.php?course-id=<?php echo $course; ?>&ct=<?php echo '2' ?>
										">
										<a onclick="
											$(this).prev('#courseUrl').val($(this).prev('#courseUrl').val().replace(/\s/g,''));
   											$(this).prev('#courseUrl').select();
   											try{
   											document.execCommand('copy');
   											 Materialize.toast('تم نسخ الرابط الى الحافظة', 4000);
   										} catch (err){
   											 Materialize.toast('حدث خطأ', 4000);
   										}
										" class=" tooltipped cop secondary-content" data-position="top" data-delay="50" data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $course; ?>">
																<i class="material-icons hvr-float-shadow">content_copy</i>
															</a>
															<a href="#sad" id="course-details" course-id="<?php echo $course; ?>" onclick="
																var coursesId = $(this).attr('course-id');
														        $.ajax({  
														                  type: 'POST',
														                  url: 'uni-opt-course-details.php',
														                  data: {
														                    'course-id' : coursesId
														                  },
														                  success : function(data) {
														                    $('#cd').html(data);
														                  },
														                  error : function(){
														                        alert('Whoops! This didn\'t work. Please contact us.')
														                    }
														                });

															" class="secondary-content tooltipped dow modal-trigger modal-close mmmmmmm" data-position="top" data-delay="50" data-tooltip="تحميل ملفات المادة">
																<i class="fa fa-book hvr-icon-down" aria-hidden="true"></i>
															</a>
											</a>
										</div>
									</li>
									<?php 
						} elseif ($res[1] == 3) {
							?>
							<li class="collection-item dismissable">
								<div><span style="
									background-color: #FAF3DF;
									padding: 2px 6px;
									border-radius: 7px;
								">
								<?php $cn 	= $conn->prepare('SELECT `name` FROM `coll_mand_courses` WHERE `id` = ?');
											$cn   ->execute(array($res[0]));
											$cnr 	= $cn->fetch();
											echo $cnr['name'];
											?></span><input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>share.php?course-id=<?php echo $course; ?>&ct=<?php echo '3' ?>
										">
										<a onclick="
											$(this).prev('#courseUrl').val($(this).prev('#courseUrl').val().replace(/\s/g,''));
   											$(this).prev('#courseUrl').select();
   											try{
   											document.execCommand('copy');
   											 Materialize.toast('تم نسخ الرابط الى الحافظة', 4000);
   										} catch (err){
   											 Materialize.toast('حدث خطأ', 4000);
   										}
										" class=" tooltipped cop secondary-content" data-position="top" data-delay="50" data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $course; ?>">
																<i class="material-icons hvr-float-shadow">content_copy</i>
															</a>
															<a href="#sad" id="course-details" course-id="<?php echo $course; ?>" onclick="
																var coursesId = $(this).attr('course-id');
														        $.ajax({  
														                  type: 'POST',
														                  url: 'coll-mand-course-details.php',
														                  data: {
														                    'course-id' : coursesId
														                  },
														                  success : function(data) {
														                    $('#cd').html(data);
														                  },
														                  error : function(){
														                        alert('Whoops! This didn\'t work. Please contact us.')
														                    }
														                });

															" class="secondary-content tooltipped dow modal-trigger modal-close mmmmmmm" data-position="top" data-delay="50" data-tooltip="تحميل ملفات المادة">
																<i class="fa fa-book hvr-icon-down" aria-hidden="true"></i>
															</a>
											</a>
										</div>
									</li>
									<?php 
								
						} elseif ($res[1] == 4) {
								?>
							<li class="collection-item dismissable">
								<div><span style="
									background-color: #FAF3DF;
									padding: 2px 6px;
									border-radius: 7px;
								">
								<?php $cn 	= $conn->prepare('SELECT `name` FROM `sp_mand_courses` WHERE `id` = ?');
											$cn   ->execute(array($res[0]));
											$cnr 	= $cn->fetch();
											echo $cnr['name'];
											?></span><input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>share.php?course-id=<?php echo $course; ?>&ct=<?php echo '4' ?>
										">
										<a onclick="
											$(this).prev('#courseUrl').val($(this).prev('#courseUrl').val().replace(/\s/g,''));
   											$(this).prev('#courseUrl').select();
   											try{
   											document.execCommand('copy');
   											 Materialize.toast('تم نسخ الرابط الى الحافظة', 4000);
   										} catch (err){
   											 Materialize.toast('حدث خطأ', 4000);
   										}
										" class=" tooltipped cop secondary-content" data-position="top" data-delay="50" data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $course; ?>">
																<i class="material-icons hvr-float-shadow">content_copy</i>
															</a>
															<a href="#sad" id="course-details" course-id="<?php echo $course; ?>" onclick="
																var coursesId = $(this).attr('course-id');
														        $.ajax({  
														                  type: 'POST',
														                  url: 'sp-mand-course-details.php',
														                  data: {
														                    'course-id' : coursesId
														                  },
														                  success : function(data) {
														                    $('#cd').html(data);
														                  },
														                  error : function(){
														                        alert('Whoops! This didn\'t work. Please contact us.')
														                    }
														                });

															" class="secondary-content tooltipped dow modal-trigger modal-close mmmmmmm" data-position="top" data-delay="50" data-tooltip="تحميل ملفات المادة">
																<i class="fa fa-book hvr-icon-down" aria-hidden="true"></i>
															</a>
											</a>
										</div>
									</li>
									<?php 
						} elseif ($res[1] == 5) {
								?>
							<li class="collection-item dismissable">
								<div><span style="
									background-color: #FAF3DF;
									padding: 2px 6px;
									border-radius: 7px;
								">
								<?php $cn 	= $conn->prepare('SELECT `name` FROM `sp_opt_courses` WHERE `id` = ?');
											$cn   ->execute(array($res[0]));
											$cnr 	= $cn->fetch();
											echo $cnr['name'];
											?></span><input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>share.php?course-id=<?php echo $course; ?>&ct=<?php echo '5' ?>
										">
										<a onclick="
											$(this).prev('#courseUrl').val($(this).prev('#courseUrl').val().replace(/\s/g,''));
   											$(this).prev('#courseUrl').select();
   											try{
   											document.execCommand('copy');
   											 Materialize.toast('تم نسخ الرابط الى الحافظة', 4000);
   										} catch (err){
   											 Materialize.toast('حدث خطأ', 4000);
   										}
										" class=" tooltipped cop secondary-content" data-position="top" data-delay="50" data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $course; ?>">
																<i class="material-icons hvr-float-shadow">content_copy</i>
															</a>
															<a href="#sad" id="course-details" course-id="<?php echo $course; ?>" onclick="
																var coursesId = $(this).attr('course-id');
														        $.ajax({  
														                  type: 'POST',
														                  url: 'sp-opt-course-details.php',
														                  data: {
														                    'course-id' : coursesId
														                  },
														                  success : function(data) {
														                    $('#cd').html(data);
														                  },
														                  error : function(){
														                        alert('Whoops! This didn\'t work. Please contact us.')
														                    }
														                });

															" class="secondary-content tooltipped dow modal-trigger modal-close mmmmmmm" data-position="top" data-delay="50" data-tooltip="تحميل ملفات المادة">
																<i class="fa fa-book hvr-icon-down" aria-hidden="true"></i>
															</a>
											</a>
										</div>
									</li>
									<?php 
						} elseif ($res[1] == 6) {
								?>
							<li class="collection-item dismissable">
								<div><span style="
									background-color: #FAF3DF;
									padding: 2px 6px;
									border-radius: 7px;
								">
								<?php $cn 	= $conn->prepare('SELECT `name` FROM `uni_other_courses` WHERE `id` = ?');
											$cn   ->execute(array($res[0]));
											$cnr 	= $cn->fetch();
											echo $cnr['name'];
											?></span><input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>share.php?course-id=<?php echo $course; ?>&ct=<?php echo '6' ?>
										">
										<a onclick="
											$(this).prev('#courseUrl').val($(this).prev('#courseUrl').val().replace(/\s/g,''));
   											$(this).prev('#courseUrl').select();
   											try{
   											document.execCommand('copy');
   											 Materialize.toast('تم نسخ الرابط الى الحافظة', 4000);
   										} catch (err){
   											 Materialize.toast('حدث خطأ', 4000);
   										}
										" class=" tooltipped cop secondary-content" data-position="top" data-delay="50" data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $course; ?>">
																<i class="material-icons hvr-float-shadow">content_copy</i>
															</a>
															<a href="#sad" id="course-details" course-id="<?php echo $course; ?>" onclick="
																var coursesId = $(this).attr('course-id');
														        $.ajax({  
														                  type: 'POST',
														                  url: 'uni-other-course-details.php',
														                  data: {
														                    'course-id' : coursesId
														                  },
														                  success : function(data) {
														                    $('#cd').html(data);
														                  },
														                  error : function(){
														                        alert('Whoops! This didn\'t work. Please contact us.')
														                    }
														                });

															" class="secondary-content tooltipped dow modal-trigger modal-close mmmmmmm" data-position="top" data-delay="50" data-tooltip="تحميل ملفات المادة">
																<i class="fa fa-book hvr-icon-down" aria-hidden="true"></i>
															</a>
											</a>
										</div>
									</li>
									<?php 
						}
			}
    } else {
    	header('Location: http://localhost/eduMedia/');
		exit;
    }			