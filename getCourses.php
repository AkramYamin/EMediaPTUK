<?php 

	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
	$spp = $ct = '';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$spp = $_POST['new-sp']; 
			$ct  = $_POST['courses-type'];
	// Retreav Courses From DataBase
			if ($ct == 1) {
				// select from uni-mand-courses
				$stmt 	= $conn->prepare('SELECT `name`, `downloads`, `id`, admin FROM `uni_mand_courses`');
				$stmt   ->execute();
				$rows   = $stmt ->fetchall();
				foreach ($rows as $row) { ?>
								<tr>
									<td>
										<input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>/share.php?course-id=<?php echo $row['id']; ?>&ct=<?php echo $ct; ?>
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
										" class=" tooltipped cop" data-position="top" data-delay="50" data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $row['id']; ?>">
											<i class="material-icons hvr-float-shadow">content_copy</i>
										</a>
										<a href="#sad" id="course-details" onclick="
      											$('#sad .asm').attr('course-id', $.trim($(this).attr('course-id')));
      											$('#sad .asm').attr('course-admin', $.trim($(this).attr('cour-adm')));
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

										" course-id="<?php echo $row['id']; ?>" cour-adm="<?php echo $row['admin']; ?>"  class=" tooltipped dow modal-trigger " data-position="top" data-delay="50" data-tooltip="تحميل ملفات المادة">
											<i class="fa fa-book hvr-icon-down" aria-hidden="true"></i>
										</a>
									</td>
									<td>
										<button class="download-button"><?php echo $row['downloads']; ?></button>
									</td>
									<td><?php echo $row['name']; ?>
									</td>
								</tr>
										<?php }
			} elseif ($ct == 2) {
				// select from uni-opt-courses
				$stmt 	= $conn->prepare('SELECT `name`, `downloads`, `id`, admin FROM `uni_opt_courses`');
				$stmt   ->execute();
				$rows   = $stmt ->fetchall();
				foreach ($rows as $row) { ?>
								<tr>
									<td><input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>/share.php?course-id=<?php echo $row['id']; ?>&ct=<?php echo $ct; ?>
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
										" class=" tooltipped cop" data-position="top" data-delay="50" data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $row['id']; ?>">
											<i class="material-icons hvr-float-shadow">content_copy</i>
										</a>
										<a href="#sad" id="course-details" onclick="
      											$('#sad .asm').attr('course-id', $.trim($(this).attr('course-id')));
      											$('#sad .asm').attr('course-admin', $.trim($(this).attr('cour-adm')));
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

										" course-id="<?php echo $row['id']; ?>" cour-adm="<?php echo $row['admin']; ?>"  class=" tooltipped dow modal-trigger " data-position="top" data-delay="50" data-tooltip="تحميل ملفات المادة">
											<i class="fa fa-book hvr-icon-down" aria-hidden="true"></i>
										</a>
									</td>
									<td>
										<button class="download-button"><?php echo $row['downloads']; ?></button>
									</td>
									<td><?php echo $row['name']; ?>
									</td>
								</tr>
										<?php }
			} elseif ($ct == 3) {
				// get collage id
				$collage 	= $conn->prepare('SELECT `sp_col_fk` FROM `specialty` WHERE `sp_id` = ?');
				$collage   ->execute(array($spp));
				$col   = $collage ->fetch();
				$collId = $col['sp_col_fk'];

				// select from coll-mand-courses
				$stmt 	= $conn->prepare('SELECT `name`, `id`, `downloads`, admin FROM `coll_mand_courses` WHERE `coll_id` = ?');
				$stmt   ->execute(array($collId));
				$rows   = $stmt ->fetchall();
				foreach ($rows as $row) { ?>
								<tr>
									<td><input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>/share.php?course-id=<?php echo $row['id']; ?>&ct=<?php echo $ct; ?>
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
										" class=" tooltipped cop" data-position="top" data-delay="50" data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $row['id']; ?>">
											<i class="material-icons hvr-float-shadow">content_copy</i>
										</a>
										<a href="#sad" id="course-details" onclick="
      											$('#sad .asm').attr('course-id', $.trim($(this).attr('course-id')));
      											$('#sad .asm').attr('course-admin', $.trim($(this).attr('cour-adm')));
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

										" course-id="<?php echo $row['id']; ?>" cour-adm="<?php echo $row['admin']; ?>"  class=" tooltipped dow modal-trigger " data-position="top" data-delay="50" data-tooltip="تحميل ملفات المادة">
											<i class="fa fa-book hvr-icon-down" aria-hidden="true"></i>
										</a>
									</td>
									<td>
										<button class="download-button"><?php echo $row['downloads']; ?></button>
									</td>
									<td><?php echo $row['name']; ?>
									</td>
								</tr>
										<?php }
			} elseif ($ct == 4) {
				// select from sp-mand-courses
				$stmt 	= $conn->prepare('SELECT `name`, `id`, `downloads`, admin FROM `sp_mand_courses` WHERE `sp_id` = ?');
				$stmt   ->execute(array($spp));
				$rows   = $stmt ->fetchall();
				foreach ($rows as $row) { ?>
								<tr>
									<td><input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>/share.php?course-id=<?php echo $row['id']; ?>&ct=<?php echo $ct; ?>
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
										" class=" tooltipped cop" data-position="top" data-delay="50" data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $row['id']; ?>">
											<i class="material-icons hvr-float-shadow">content_copy</i>
										</a>
										<a href="#sad" id="course-details" onclick="
      											$('#sad .asm').attr('course-id', $.trim($(this).attr('course-id')));
      											$('#sad .asm').attr('course-admin', $.trim($(this).attr('cour-adm')));
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

										" course-id="<?php echo $row['id']; ?>" cour-adm="<?php echo $row['admin']; ?>"  class=" tooltipped dow modal-trigger " data-position="top" data-delay="50" data-tooltip="تحميل ملفات المادة">
											<i class="fa fa-book hvr-icon-down" aria-hidden="true"></i>
										</a>
									</td>
									<td>
										<button class="download-button"><?php echo $row['downloads']; ?></button>
									</td>
									<td><?php echo $row['name']; ?>
									</td>
								</tr>
										<?php }
			} elseif ($ct == 5) {
				// select from sp-opt-courses
				$stmt 	= $conn->prepare('SELECT `name`, `id`, `downloads`, admin FROM `sp_opt_courses` WHERE `sp_id` = ?');
				$stmt   ->execute(array($spp));
				$rows   = $stmt ->fetchall();
				foreach ($rows as $row) { ?>
								<tr>
									<td><input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>/share.php?course-id=<?php echo $row['id']; ?>&ct=<?php echo $ct; ?>
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
										" class=" tooltipped cop" data-position="top" data-delay="50" data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $row['id']; ?>">
											<i class="material-icons hvr-float-shadow">content_copy</i>
										</a>
										<a href="#sad" id="course-details" onclick="
      											$('#sad .asm').attr('course-id', $.trim($(this).attr('course-id')));
      											$('#sad .asm').attr('course-admin', $.trim($(this).attr('cour-adm')));
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

										" course-id="<?php echo $row['id']; ?>" cour-adm="<?php echo $row['admin']; ?>" class=" tooltipped dow modal-trigger " data-position="top" data-delay="50" data-tooltip="تحميل ملفات المادة">
											<i class="fa fa-book hvr-icon-down" aria-hidden="true"></i>
										</a>
									</td>
									<td>
										<button class="download-button"><?php echo $row['downloads']; ?></button>
									</td>
									<td><?php echo $row['name']; ?>
									</td>
								</tr>
										<?php }
			} elseif ($ct == 6) {
				// select from uni-other-courses
				$stmt 	= $conn->prepare('SELECT `name`, `downloads`, `id`, admin FROM `uni_other_courses`');
				$stmt   ->execute();
				$rows   = $stmt ->fetchall();
				foreach ($rows as $row) { ?>
								<tr>
									<td><input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>/share.php?course-id=<?php echo $row['id']; ?>&ct=<?php echo $ct; ?>
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
										" class=" tooltipped cop" data-position="top" data-delay="50" data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $row['id']; ?>">
											<i class="material-icons hvr-float-shadow">content_copy</i>
										</a>
										<a href="#sad" id="course-details" onclick="
      											$('#sad .asm').attr('course-id', $.trim($(this).attr('course-id')));
      											$('#sad .asm').attr('course-admin', $.trim($(this).attr('cour-adm')));
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

										" course-id="<?php echo $row['id']; ?>" cour-adm="<?php echo $row['admin']; ?>" class=" tooltipped dow modal-trigger " data-position="top" data-delay="50" data-tooltip="تحميل ملفات المادة">
											<i class="fa fa-book hvr-icon-down" aria-hidden="true"></i>
										</a>
									</td>
									<td>
										<button class="download-button"><?php echo $row['downloads']; ?></button>
									</td>
									<td><?php echo $row['name']; ?>
									</td>
								</tr>
										<?php }
			}
			?>
			<script src="<?php echo $js; ?>materialize.min.js"></script>
			<?php
			 } else {
			header('Location: http://localhost/eduMedia/');
			exit;
		}