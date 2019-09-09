<?php 
		require  'includes/func/init.php';
		require $func . 'connect.php'; //Connect To Database
		if(!isset($_COOKIE['user-id'])) {
	    $in = 0;
	    } 

		else {
		    $in = 1;
		}
		$course_id = $course_sp = '' ;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
				$course_id = $_POST['course-id'];

					// Retreav Course Data From DataBase
					$stmt 	= $conn->prepare('SELECT * FROM `uni_other_courses` WHERE `id` = ?');
					$stmt   ->execute(array($course_id));
					$row   = $stmt ->fetch();
					?>
						<ul class="collection with-header dow-collection">
							<li class="collection-header"><h4><?php  echo $row['name']; ?></h4></li>
							<li class="collection-item">
								<div>الكتاب
									<?php  if($row['main_book'] != '') {
										 ?>
									<a where="<?php  echo $row['main_book']; ?>" 
										onclick="
										var path = $(this).attr('where');
										window.open('download.php?path=' + path);
									" 
									 class="secondary-content tooltipped dm" data-position="top" data-delay="50" data-tooltip="تنزيل كتاب المادة">
										<i class="fa fa-book  hvr-icon-down" aria-hidden="true"></i>
									</a>
									<?php } else {?>
										<a class="secondary-content tooltipped de" style="color: #DDD !important;" data-position="top" data-delay="50" data-tooltip="الكتاب غير موجود">
										<i class="fa fa-exclamation-circle " aria-hidden="true"></i>
									</a>
									<?php }?>
								</div>
							</li>
							<li class="collection-item">
								<div>حلول المادة
									<?php  if($row['first_material'] != '') {
										 ?>
									<a where="<?php  echo $row['first_material']; ?>" 
										onclick="
										var path = $(this).attr('where');
										window.open('download.php?path=' + path);
									" 
									 class="secondary-content tooltipped dm" data-position="top" data-delay="50" data-tooltip="تنزيل حلول المادة">
										<i class="fa fa-book  hvr-icon-down" aria-hidden="true"></i>
									</a>
									<?php } else {?>
										<a class="secondary-content tooltipped de" style="color: #DDD !important;" data-position="top" data-delay="50" data-tooltip="الحلول غير موجودة">
										<i class="fa fa-exclamation-circle " aria-hidden="true"></i>
									</a>
									<?php }?>
								</div>
							</li>
							<li class="collection-item">
								<div>سلايدات المادة
									<?php  if($row['second_material'] != '') {
										 ?>
									<a where="<?php  echo $row['second_material']; ?>" 
										onclick="
										var path = $(this).attr('where');
										window.open('download.php?path=' + path);
									" 
									 class="secondary-content tooltipped dm" data-position="top" data-delay="50" data-tooltip="تنزيل سلايدات المادة">
										<i class="fa fa-book  hvr-icon-down" aria-hidden="true"></i>
									</a>
									<?php } else {?>
										<a class="secondary-content tooltipped de" style="color: #DDD !important;" data-position="top" data-delay="50" data-tooltip="السلايدات غير موجودة">
										<i class="fa fa-exclamation-circle " aria-hidden="true"></i>
									</a>
									<?php }?>
								</div>
							</li>
							<li class="collection-item">
								<div>تلخيص المادة
									<?php  if($row['final_material'] != '') {
										 ?>
									<a where="<?php  echo $row['final_material']; ?>" 
										onclick="
										var path = $(this).attr('where');
										window.open('download.php?path=' + path);
									" 
									 class="secondary-content tooltipped dm" data-position="top" data-delay="50" data-tooltip="تنزيل تلخيص المادة">
										<i class="fa fa-book  hvr-icon-down" aria-hidden="true"></i>
									</a>
									<?php } else {?>
										<a class="secondary-content tooltipped de" style="color: #DDD !important;" data-position="top" data-delay="50" data-tooltip="التلخيص غير موجود">
										<i class="fa fa-exclamation-circle " aria-hidden="true"></i>
									</a>
									<?php }?>
								</div>
							</li>
							<li class="collection-item">
								<div>امتحانات المادة
									<?php  if($row['first_exam'] != '') {
										 ?>
									<a where="<?php  echo $row['first_exam']; ?>"
										onclick="
										var path = $(this).attr('where');
										window.open('download.php?path=' + path);
									" 
									 class="secondary-content tooltipped de" data-position="top" data-delay="50" data-tooltip="تنزيل اسئلة فيرست">
										<i class="fa fa-tasks  hvr-icon-down" aria-hidden="true"></i>
									</a>
									<?php } else {?>
										<a class="secondary-content tooltipped de" style="color: #DDD !important;" data-position="top" data-delay="50" data-tooltip="الاسئلة غير موجودة">
										<i class="fa fa-exclamation-circle " aria-hidden="true"></i>
									</a>
									<?php }?>
									<?php  if($row['second_exam'] != '') {
										 ?>
									<a where="<?php  echo $row['second_exam']; ?>"
										onclick="
										var path = $(this).attr('where');
										window.open('download.php?path=' + path);
									" 
									 class="secondary-content tooltipped de" data-position="top" data-delay="50" data-tooltip="تنزيل اسئلة سكند">
										<i class="fa fa-tasks  hvr-icon-down" aria-hidden="true"></i>
									</a>
									<?php } else {?>
										<a class="secondary-content tooltipped de" style="color: #DDD !important;" data-position="top" data-delay="50" data-tooltip="الاسئلة غير موجودة">
										<i class="fa fa-exclamation-circle " aria-hidden="true"></i>
									</a>
									<?php }?>
									<?php  if($row['final_exam'] != '') {
										 ?>
									<a where="<?php  echo $row['final_exam']; ?>"
										onclick="
										var path = $(this).attr('where');
										window.open('download.php?path=' + path);
									" 
									 class="secondary-content tooltipped de" data-position="top" data-delay="50" data-tooltip="تنزيل اسئلة فاينال">
										<i class="fa fa-tasks  hvr-icon-down" aria-hidden="true"></i>
									</a>
									<?php } else {?>
										<a class="secondary-content tooltipped de" style="color: #DDD !important;" data-position="top" data-delay="50" data-tooltip="الاسئلة غير موجودة">
										<i class="fa fa-exclamation-circle " aria-hidden="true"></i>
									</a>
									<?php }?>
								</div>
							</li>
						</ul>



						 <hr>
						 <h4>المزيد</h4>
				
						
					<?php 
						// Retreav Course Comments From DataBase
						$stmt 	= $conn->prepare('SELECT * FROM `others` WHERE `other_course` = ? and `other_status` = 1');
						$stmt   ->execute(array($course_id));
						$oths   = $stmt ->fetchall();
						foreach ($oths as $oth) {
							
						// feach auther data
						$auther 	= $conn->prepare('SELECT `user_nic_name`, `user_pic` FROM `users` WHERE `user_id` = ?');
						$auther    ->execute(array($oth['other_auther']));
						$auth   = $auther ->fetch();
						?>
							<div class="comment">
							<div class="comment-headear">
								<img src="<?php echo $pic . $auth['user_pic']; ?>" alt="profile image">
								<span><?php echo $oth['other_date']; ?></span>
								<span class="auth-name"><?php echo $auth['user_nic_name'][0];?></span>
							</div>
							<?php 
								// feach other likes data
								$likes 		= $conn->prepare('SELECT * FROM `likes` WHERE `like_type` = 1 and `other_id` = ?');
								$likes    	->execute(array($oth['other_id']));
								$likesNum 	= $likes->rowCount();
								$likes 		= $conn->prepare('SELECT * FROM `likes` WHERE `like_type` = 0 and `other_id` = ? ');
								$likes    	->execute(array($oth['other_id']));
								$disLikesNum 	= $likes->rowCount();
								?>
							<div class="comment-body <?php
								if($likesNum >= $disLikesNum)
									echo('comment-good');
								else
									echo('comment-bad');
							 ?>
							 "><?php echo $oth['other_desc']; ?></div>
							<?php 
								if ($in == 1) { ?>
									<div class="comment-footer z-depth-1">
										<span><?php echo $likesNum; ?></span>
										<a other-id="<?php echo $oth['other_id']; ?>" onclick="
										var that = $(this);
										var otherId = $(this).attr('other-id');
										var URL = '';
										if($(this).hasClass('liked')) {
											URL = 'dellike.php';
										} else {
											URL = 'like.php';
										}
									        $.ajax({  
									                  type: 'POST',
									                  url: URL,
									                  data: {
									                    'otherId' : otherId,
									                    'likeType': '1'
									                  },
									                  success : function(data) {
									                  	if(that.hasClass('liked')){
									                  		that.prev('span').text(parseInt(that.prev('span').text())-1);
									                  	} else {
									                  		that.prev('span').text(parseInt(that.prev('span').text())+1);
									                  	}
									                    that.toggleClass('liked');
									                    if (that.siblings('a').hasClass('disliked')){
									                    	that.siblings('a').removeClass('disliked');
									                    	that.siblings('a').prev('span').text(parseInt(that.siblings('a').prev('span').text())-1);
								                    	}	
									                  },
									                  error : function(){
									                        alert('Whoops! This didn\'t work. Please contact us.');
									                    }
									                });
										" class="like
											<?php 
												// check if user liked this comment
											$ifl 		= $conn->prepare('SELECT * FROM `likes` WHERE `like_type` = 1 and `other_id` = ? and user_id = ? ');
											$ifl    	->execute(array($oth['other_id'], $_COOKIE['user-id']));
											if( $ifl->rowCount() ==1 ) {
												echo('liked');
											}
											?>
											">
											<i class="fa fa-thumbs-o-up hvr-icon-grow-rotate dslk" aria-hidden="true"></i>
										</a>
										<span><?php echo $disLikesNum; ?></span>
										<a other-id="<?php echo $oth['other_id']; ?>" onclick="
									        var otherId = $(this).attr('other-id');
									        var that = $(this);
									        var URL = '';
											if($(this).hasClass('disliked')) {
												URL = 'dellike.php';
											} else {
												URL = 'like.php';
											}
								        $.ajax({  
								                  type: 'POST',
								                  url: URL,
								                  data: {
								                    'otherId' : otherId,
								                    'likeType': '0'
								                  },
								                  success : function(data) {
								                  	if(that.hasClass('disliked')){
									                  		that.prev('span').text(parseInt(that.prev('span').text())-1);
									                  	} else {
									                  		that.prev('span').text(parseInt(that.prev('span').text())+1);
									                  	}
								                    that.toggleClass('disliked');
								                    if (that.siblings('a').hasClass('liked')){
								                    	that.siblings('a').removeClass('liked');
								                    	that.siblings('a').prev('span').text(parseInt(that.siblings('a').prev('span').text())-1);
								                    }
								                  },
								                  error : function(){
								                        alert('Whoops! This didn\'t work. Please contact us.');
								                    }
								                });
										" 
										class="dislike
											<?php 
												// check if user liked this comment
											$ifd 		= $conn->prepare('SELECT * FROM `likes` WHERE `like_type` = 0 and `other_id` = ? and user_id = ? ');
											$ifd    	->execute(array($oth['other_id'], $_COOKIE['user-id']));
											if( $ifd->rowCount() ==1 ) {
												echo('disliked');
											}
											?>
											">
											<i class="fa fa-thumbs-o-down hvr-icon-shrink lk" aria-hidden="true"></i>
										</a>
									</div>
							<?php } else {
								echo "</br>";
							} ?>
							</div>
						<?php }  ?>
						<?php 
							if($in == 0) { ?>
						<div class="comment-login ">
							<button class="z-depth-3 hoverable login modal-trigger modal-close" href="#login"> دخول<p style="font-size: 13px">قم بتسجيل الدخول للتمتع بميزات التعليق والتقييم وطلب المواد ومزايا اخرى</p></button>
						</div>
						<?php } else { ?>
							<div class=" add-comment">
								<p style="
									background-color: green;
									text-align: center;
									margin-top: 21px;
									font-size: 18px;
									color: #FFF;
									line-height: 40px;
									display: none;
									position: relative;
									top: -10px;
								" id="comment-sent">تعليقك بانتظار الموافقة من المسؤول ...!</p>
							<div class="row">
								<div class="col l1 m1 s2">
									<img src="<?php echo $pic . $_SESSION['user-pic'] ; ?>" alt="profile image">
									<span style="
										position: relative;
										right: -41px;
										top: -20px;
										background-color: #6463e2;
										border-radius: 3px;
										padding: 0 5px;
										font-size: 15px;
										color: #fff;
										text-transform: capitalize;
									" class="auth-name"><?php echo $_SESSION['user-name'][0];?></span>
								</div>
										<div class="col l11 m11 s10">
											<div class="add-comment-body ">
												<textarea name="comment-feild" id="comment-feild" placeholder="أضف تعليقا ، حل ، أو روابط تعليمية ... "></textarea>
											</div>
										</div>
							</div>
								<a class="add-comment-footer z-depth-1" style="cursor: pointer;" class="add-comment" admin-id="<?php  echo $row['admin']; ?>"
									course-id="<?php  echo $row['id']; ?>"
								 onclick="
									var adminId 	 	= $(this).attr('admin-id');
							        var commentContent  = $('#comment-feild').val();
							        var courseId 		= $(this).attr('course-id');
							        if (commentContent  == '') {
							        } else {

							        $.ajax({  
							                  type: 'POST',
							                  url: 'comment.php',
							                  data: {
							                    'adminId': adminId,
							                    'commentContent': commentContent,
							                    'courseId': courseId
							                  },
							                  success : function(data) {
							                    $('#comment-sent').css({'display' : 'block'});
							                    setTimeout(function () {
						                        	$('#comment-sent').css('display', 'none');
						                        }, 3000);
						                        $('#comment-feild').val('');
							                  },
							                  error : function(){
							                        alert('Whoops! This didn\'t work. Please contact us.');
							                    }
							                }); 
							    }
								">
									<div>أطلب النشر
										<i class="fa fa-share-square-o hvr-icon-wobble-horizontal" aria-hidden="true"></i>
									</div>
								</a>
							</div>
						<?php } ?>

						
						<?php
							?>
			<script src="<?php echo $js; ?>materialize.min.js"></script>
			<?php
						 } else {
										header('Location: http://localhost/eduMedia/');
										exit;
									}
