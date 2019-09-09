<?php require  'includes/func/init.php'; ?>
<!DOCTYPE HTML>
    <html>
    
            <head>
		    <meta property="og:url"                content="<?php echo 'http://www.emediaptuk.com' . $_SERVER[REQUEST_URI];?>" />
                    <meta property="og:type"               content="article" />
                    <meta property="og:title"              content="<?php if ($_SERVER["REQUEST_METHOD"] == "GET") {
				
								$course_id = $_GET['course-id'];
								$ct 	   = $_GET['ct'];
									// Retreav Course Data From DataBase
								if( $ct == 1) {
									$stmt 	= $conn->prepare('SELECT * FROM `uni_mand_courses` WHERE `id` = ?');
									$stmt   ->execute(array($course_id));
									$row   = $stmt ->fetch();
								} elseif ( $ct == 2) {
									$stmt 	= $conn->prepare('SELECT * FROM `uni_opt_courses` WHERE `id` = ?');
									$stmt   ->execute(array($course_id));
									$row   = $stmt ->fetch();
								} elseif ( $ct == 3) {
									$stmt 	= $conn->prepare('SELECT * FROM `coll_mand_courses` WHERE `id` = ?');
									$stmt   ->execute(array($course_id));
									$row   = $stmt ->fetch();
								} elseif ( $ct == 4) {
									$stmt 	= $conn->prepare('SELECT * FROM `sp_mand_courses` WHERE `id` = ?');
									$stmt   ->execute(array($course_id));
									$row   = $stmt ->fetch();
								} elseif ( $ct == 5) {
									$stmt 	= $conn->prepare('SELECT * FROM `sp_opt_courses` WHERE `id` = ?');
									$stmt   ->execute(array($course_id));
									$row   = $stmt ->fetch();
								} elseif ( $ct == 6) {
									$stmt 	= $conn->prepare('SELECT * FROM `uni_other_courses` WHERE `id` = ?');
									$stmt   ->execute(array($course_id));
									$row   = $stmt ->fetch();
								} 
									echo $row['name'];
							} ?>" />
                    <meta property="og:description"        content=" تعلم >>> شارك >>> اكبر اكثر  " />
                    <meta property="og:image"              content="https://i.imgur.com/BgEFjDq.jpg" />
                    <meta property="fb:app_id"              content="545279099183454" />
                    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">   
                    <meta name="HandheldFriendly" content="true">
                    <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">
                    <meta name="viewport" content="width=device-width">
                <title>eduMedia</title>
                    <link rel="stylesheet" href="<?php echo $css; ?>normalize.css">
                    <link rel="stylesheet" href="<?php echo $css; ?>slider.css">
                    <link rel="stylesheet" href="<?php echo $css; ?>web.css">
                <!-- import fontowsem-->
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <!-- Compiled and minified CSS -->
                    <link rel="stylesheet" href="<?php echo $css; ?>materialize.min.css">
                <!-- import material icos-->
                    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                    <script src="<?php echo $js; ?>jquery-3.2.1.min.js"></script>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2260312770176813",
    enable_page_level_ads: true
  });
</script>
            </head>
    
            <body id="ab">
		<!-- start ask for content -->
				<div id="ask-for-content" class="modal popup ask-for">
		<div class="modal-content">
				<div class="dow-logo">
 <img src="layout/imgs/logo.jpg" alt="PTUKTESTY" class="expand-logo-dow  circle"/>
				</div>
		<a class="modal-action modal-close close" href="#">&times;</a>
				<div class="">
						<h4>طلب أسئلة وتلاخيص</h4>
					<form id="asm"  class="col s12" method="post" action="ask-for-content.php">

						<div class='row'>
							<div class='col s12 m12 l12'>
											<p class="col l3 m6 s12">
										      <input type="checkbox" class="needs" value="5" name="needs[]" id="ix" />
										      <label for="ix">اسئلة فيرست</label>
										    </p>
										    <p class="col l3 m6 s12">
										      <input type="checkbox" class="needs" value="2" name="needs[]" id="ib" />
										      <label for="ib">تلخيص فيرست</label>
										    </p>
										    <p class="col l3 m6 s12">
										      <input type="checkbox" class="needs" value="6" name="needs[]" id="sx" />
										      <label for="sx">أسئلة سكند</label>
										    </p>
										    <p class="col l3 m6 s12">
										      <input type="checkbox" class="needs" value="3" name="needs[]" id="sb" />
										      <label for="sb">تلخيص سكند</label>
										    </p>
										    <p class="col l3 m6 s12">
										      <input type="checkbox" class="needs" value="7" name="needs[]" id="fx" />
										      <label for="fx">أسئلة فاينال</label>
										    </p>
										    <p class="col l3 m6 s12">
										      <input type="checkbox" class="needs" value="4" name="needs[]" id="fb" />
										      <label for="fb">تلخيص فاينال</label>
										    </p>
										    <p class="col l3 m6 s12">
										      <input type="checkbox" class="needs" value="1" name="needs[]" id="b" />
										      <label for="b">كتاب المادة</label>
										    </p>
								</div>
							</div>
							<input type="number" id="coursse-id" hidden="hidden" value=""/>
							<input type="number" id="coursse-admin" hidden="hidden" value=""/>
							<p id="asm-done" style="
								background-color: green;
								text-align: center;
								color: #FFF;
								padding: 5px;
								border-radius: 4px;
								font-weight: bold;
								margin: 0 -10px -15px;
								display: none;
							">تم ارسال طلبك بنجاح ، سيتم التنفيذ باسرع وقت ممكن</p>
							<p id="asm-err" style="
								background-color: red;
								text-align: center;
								color: #FFF;
								padding: 5px;
								border-radius: 4px;
								font-weight: bold;
								margin: 0 -10px -15px;
								display: none;
							">الرجاء تحديد طلبك</p>
							<div class="row">
								<div class='input-field col s12 m12 l12'>
								<button type="submit" style="margin-right: 5%;">ارسال</button>								
							</div>
						</div>
					</form>
				</div></div></div>
		<!-- end ask for content-->
		<!-- start login popup-->
		 <div id="login" class="modal popup">
		<div class="modal-content">
				<div class="dow-logo">
				<img src="layout/imgs/logo.jpg" alt="PTUKTESTY" class="expand-logo-dow  circle"/>
				</div>
		<a class="modal-action modal-close close" href="#">&times;</a>
				<div class="login-div">
						<h4>أهلا بعودتك</h4>
						<p id="invalid-login" style="
										display: none;
										background-color: #ff6969;
										border-radius: 5px;
										margin-top: 5px;
										width: 100%;
										color: #FFF;
										border: 1px solid red;
										text-align: center;

								">اسم المستخدم او كلمة لمرور غير صحيحة</p>
						<form method="POST" action="login.php" id="login-form">
						<div class='row'>
							<div class='input-field col s12'>
								<input placeholder="البريد الالكتروني" type='email' id='login-mail' name="login-mail" />
							</div>
						</div>

						<div class='row'>
							<div class='input-field col s12'>
								<input placeholder="الرقم السري" type='password' id='login-password' name="login-password" />
							</div>
							<label style='float: right;' class="forget">
								<a class='pink-text' href='#!'><b>نسيت كلمة المرور</b></a>
							</label>
						</div>

						<center>
							<div class='row'>
								<button type="submit" name='btn_login' class='col s12 btn btn-large indigo' >دخول</button>
							</div>
						</center>
						</form>
				<div id="show-create-new-account-div"><a href="#!">إنشاء حساب</a></div>
			</div>
				<div class="sign-up-div" id="sign-up-div">
						<h4>إنشاء حساب جديد</h4>
						<p id="valid-signup" style="
										display: none;
										background-color: #23bc20;
										border-radius: 5px;
										margin-top: 5px;
										width: 100%;
										color: #FFF;
										border: 1px solid green;
										text-align: center;

								">تمت العملية بنجاح </p>
								<p id="invalid-signup" style="
										display: none;
										background-color: #ff6969;
										border-radius: 5px;
										margin-top: 5px;
										width: 100%;
										color: #FFF;
										border: 1px solid red;
										text-align: center;

								"></p>
					<form action="signUp.php" method="post" id="singup-form">

						<div class='row'>
							<div class='input-field col s12 m6 l6'>
								<input placeholder="إسم المستخدم" type='text' id="suser-name" name='suser-name' />
							</div>
								<div class='input-field col s12 m6 l6'>
								<input placeholder="الرقم الجامعي " id="suser-number" type='text' name='suser-number' />
							</div>
						</div>
							<div class="row">
							<div class='input-field col s12 m6 l6'>
								<input placeholder="البريد الالكتروني" id="suser-mail" type='text' name='suser-mail' />
							</div>
									<div class='input-field col s12 m6 l6'>
								<input placeholder="تأكيد البريد الالكتروني" id="suser-remail" type='text' name='suser-remail' />
							</div>
							
							</div>
						<div class='row'>
							<div class='input-field col s12 m6 l6'>
								<input placeholder="الرقم السري" id="suser-pass" type='password' name='suser-pass' />
							</div>
								<div class='input-field col s12 m6 l6'>
								<input placeholder="تأكيد الرقم السري" id="suser-repass" type='password' name="suser-repass" />
							</div>
								
						</div>
							<div class="row">
							<div class="input-field col s7 m7 l7">
									<select id="suser-sp" name="suser-sp" required class="validate">
										<?php 
											$collage 	= $conn->prepare('SELECT `col_name`, `col_id` FROM `collage`');
											$collage    ->execute();
											$rows   		= $collage ->fetchall();
											foreach ($rows as $row) { ?>
												<optgroup label="<?php echo $row['col_name'] ; ?>">
													<?php 
														$spe 		= $conn->prepare('SELECT  `sp_id`, `sp_name` FROM `specialty` WHERE `sp_col_fk` = ?');
														$spe   	->execute(array($row['col_id']));
														$rowws   = $spe ->fetchall();
														foreach ($rowws as $roww) { ?>
															<option value="<?php echo $roww['sp_id'] ; ?>"><?php echo $roww['sp_name'] ; ?></option>
														<?php } ?>
												</optgroup>
										<?php } ?>
									</select>
									<label style="    position: relative;
									top: -52px;
									right: 3px;">اختر تخصصك</label>
							</div>
							<div class="col s4 m4 l4 gender">
								<p style="display: inline-block;">
							      <input name="gender" class="with-gap" type="radio" id="ma" value="0" required />
							      <label for="ma">ذكر</label>
							   </p>
							   <p style="display: inline-block;">
							      <input name="gender" class="with-gap" type="radio" value="1" id="fe" />
							      <label for="fe">انثى</label>
							   </p>
							</div>
							</div>
						<center>
							<div class='row'>
								<button type='submit' name='btn_login' class='col s12 btn btn-large indigo'>إنشاء حساب</button>
							</div>
						</center>
					</form>
				<div id="show-login-div"><a href="#!">دخول</a></div>
			</div>
		</div>
	</div>
		<!-- end login popup-->
		<div class="share" style="background-color: #FAFAFA ;margin: 0 auto; height: 100%;width: 70%">
			<div id="sad" style="width: 100%!important;position: relative;" class="dowmodal">
				<div class="dow-content">

				<?php if($in == 1) { ?>
						<a href="#ask-for-content" course-id="" course-admin="" class="ask asm hoverable tooltipped modal-trigger modal-close" data-position="bottom" data-delay="50" data-tooltip="أطلب من المسؤول اضافة أسئلة وتلاخيص ">أطلب محتوى</a>
				<?php 
					} else { ?>
						<a href="#login" class="ask hoverable tooltipped modal-trigger modal-close" data-position="bottom" data-delay="50" data-tooltip="قم بتسجيل الدخول للتمتع بهذه الميزة">أطلب محتوى</a>
					<?php } ?>
			<div class="dow-logo">
				<a href="http://<?php echo $host ; ?>" >
				<img src="layout/imgs/logo.jpg" alt="PTUKTESTY" class="expand-logo-dow  circle"/>
</a>
					<hr>
			</div>
			<div id="cd">
					<?php 
		require $func . 'connect.php'; //Connect To Database
		if(!isset($_COOKIE['user-id'])) {
	    $in = 0;
	    } 

		else {
		    $in = 1;
		}
		$course_id = $course_sp = '' ;
		if ($_SERVER["REQUEST_METHOD"] == "GET") {
				
				$course_id = $_GET['course-id'];
				$ct 	   = $_GET['ct'];
					// Retreav Course Data From DataBase
				if( $ct == 1) {
					$stmt 	= $conn->prepare('SELECT * FROM `uni_mand_courses` WHERE `id` = ?');
					$stmt   ->execute(array($course_id));
					$row   = $stmt ->fetch();
				} elseif ( $ct == 2) {
					$stmt 	= $conn->prepare('SELECT * FROM `uni_opt_courses` WHERE `id` = ?');
					$stmt   ->execute(array($course_id));
					$row   = $stmt ->fetch();
				} elseif ( $ct == 3) {
					$stmt 	= $conn->prepare('SELECT * FROM `coll_mand_courses` WHERE `id` = ?');
					$stmt   ->execute(array($course_id));
					$row   = $stmt ->fetch();
				} elseif ( $ct == 4) {
					$stmt 	= $conn->prepare('SELECT * FROM `sp_mand_courses` WHERE `id` = ?');
					$stmt   ->execute(array($course_id));
					$row   = $stmt ->fetch();
				} elseif ( $ct == 5) {
					$stmt 	= $conn->prepare('SELECT * FROM `sp_opt_courses` WHERE `id` = ?');
					$stmt   ->execute(array($course_id));
					$row   = $stmt ->fetch();
				} elseif ( $ct == 6) {
					$stmt 	= $conn->prepare('SELECT * FROM `uni_other_courses` WHERE `id` = ?');
					$stmt   ->execute(array($course_id));
					$row   = $stmt ->fetch();
				} ?>
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
							<button style="margin-bottom: 1px;" class="hoverable login modal-trigger" href="#login"> دخول<p style="font-size: 13px">قم بتسجيل الدخول للتمتع بميزات التعليق والتقييم وطلب المواد ومزايا اخرى</p></button>
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

						
						<?php } else {
										header('Location: http://localhost/eduMedia/');
										exit;
									}?>

			</div>
		</div>
	</div>
		
<footer class="footer">
				
		<div class="copyright row">
				<div class="col s12 m6 l4"><span class="l" >&copy; 2018 , Akram Yamin , All rights reserved </span></div>
				<div class="col s12 m6 l4 contact"><span >
				<a href="https://www.facebook.com/ak.yamin.7" target="_blank"><img src="layout/imgs/fb.png"></a>
				<a href="https://www.linkedin.com/in/akram-yamin-82399a100/" target="_blank"><img src="layout/imgs/li.png"></a>
				<a href="https://www.youtube.com/channel/UCheeDMx3cKyF_Whw7E16xRg" target="_blank"><img src="layout/imgs/yt.png"></a></span></div>
				<div class="col s12 m12 l4"><span class="r " ><span style="background-color: #FFF; padding: 2px; border-radius: 2px;position: relative;
		top: -2px;"><span style="font-weight: bold; background-color: #264e90; border-radius: 1px">&nbsp;e </span><sub style="color: #000; font-weight: bold">&nbsp;media </sub></span>&nbsp;| Web Design &amp; Development by Akram Yamin </span></div>
		
		
		
		
		
		</div>
</footer>    </div>
		<!-- end footer-->
		
		<!-- import js files-->
		
		</div>
<?php require $temp . 'footer.php'; ?>