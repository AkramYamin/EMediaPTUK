<?php 
		require  'includes/func/init.php';
		require  $temp . 'header.php' ;
?>		<iframe id="my_iframe" style="display:none;"></iframe>
		<div class="mid">    
		<!-- Page Layout here -->
		<!--start slider-->
		 <div class="slider">
		<ul class="slides">
			<li>
				<img src="<?php echo $img; ?>1tut.jpg"> <!-- random image -->
				<div class="caption center-align">
					<h3 style="color: #fff;">منصة التواصل التعليمي eMedia</h3>
					<h5 class="light  text-lighten-3" style="color: #fff;">شارك المحتوى التعليمي ، أسئلة سنوات ، تلاخيص المواد الجامعية</h5>
				</div>
			</li>
			<li>
				<img src="<?php echo $img; ?>2tut.jpg"> <!-- random image -->
				<div class="caption left-align">
					<h3>وصول سريع للمحتوى</h3>
					<h5 class="light  text-lighten-3" style="color: #FFF;">المواد مؤرشفة ومصنفة بطريقة سهلة الاستخدام</h5>
				</div>
			</li>
			<li>
				<img src="<?php echo $img; ?>3tut.jpg"> <!-- random image -->
				<div class="caption center-align">
					<h3>بيئة تفاعلية</h3>
					<h5 class="light  text-lighten-3" style="color: #FFF;">شارك روابطك التعليمية المفضلة ، شروحاتك ،حلولك ، وساهم في بناء بيئة علمية تفاعلية</h5>
				</div>
			</li>
			<li>
				<img src="<?php echo $img; ?>4tut.jpg"> <!-- random image -->
				<div class="caption right-align">
					<h3>روابط الوصول السريع</h3>
					<h5 class="light  text-lighten-3" style="color: #FFF;">قم بإنشاء حساب لتتمتع بمزايا اضافة جدول دراسي وتوفر عناء البحث عن المواد كل مرة</h5>
				</div>
			</li>
			<li>
				<img src="<?php echo $img; ?>5tut.jpg"> <!-- random image -->
				<div class="caption left-align">
					<h3>شارك تجربتك</h3>
					<h5 class="light  text-lighten-3" style="color: #FFF;">قم <span style="color: #000;">بترك</span> تعليق ، تقييم للمحتوى الموجود على الموقع لتساعد الطلاب على اختيار  المسار الصحيح</h5>
				</div>
			</li>
		</ul>
	</div>
		
		
		
		
		
		<!-- start fixed button-->
		
		<?php if($in == 0){?>
			<div class="fixed-action-btn virtical">
		<a class="btn-floating blue lighten-2 darken-1 btn-large modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="تواصل معنا" href="#contact-us-modal">
				<i class="material-icons" style="position: relative;
left: 2px;">send</i></a>
			</div>
		<?php } else {?>
		<div class="fixed-action-btn virtical">
		<a class="btn-floating btn-large orange darken-1 pulse">
			<i class="large material-icons">edit</i>
		</a>
		<ul>
				<li>
					<a id="log-out" class="btn-floating red tooltipped" data-position="left" data-delay="50" data-tooltip="تسجيل الخروج">
					<i class="material-icons">exit_to_app</i></a>
				</li>
			<li>
				<a class="btn-floating blue lighten-2 darken-1 modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="تواصل معنا" href="#contact-us-modal">
				<i class="material-icons">send</i></a>
			</li>
				<li>
					<a class="btn-floating green modal-trigger tooltipped" data-position="left" data-delay="20" data-tooltip="أضف جدولك الدراسي" href="#add_table">
					<i class="material-icons">grid_on</i></a>
				</li>
		</ul>
	</div>
		<?php } ?>
		<input type="search" id="search-field">
		<!-- end fixed button-->
		
		<!-- end slider-->
		
		
		<!-- start  contact us modal -->

	<!-- Modal Structure -->
	<div id="contact-us-modal" class="modal">
		<form id="contact-us" action="contactUs.php" method="POST">
		<div class="modal-content">
			<h4>اترك تعليقا ، اقتراحا ، أو فكرة </h4>
				<textarea class="con-us-text-area" id="con-us-text-area" placeholder="اترك تعليقك "></textarea>
		</div>
		<div class="modal-footer ">
			<button class="modal-action blue lighten-2  send-contact waves-effect waves-light btn hoverable" type="submit"><i class="material-icons">send</i></button>
		</div>
		</form>
	</div>
		<!-- end contact us modal -->




		<!-- start edit profile -->
				<div id="edit-prifile" class="modal popup">
		<div class="modal-content">
				<div class="dow-logo">
				<img src="layout/imgs/logo.jpg" alt="PTUKTESTY" class="expand-logo-dow  circle"/>
				</div>
		<a class="modal-action modal-close close" href="#">&times;</a>
						<h4>إعدادات الحساب</h4>
						<div class='row'>
							<form id="setUserName" action="setUserName.php" method="post"> 
								<div class='input-field col s9 m9 l9 push-m3 push-l3 push-s3'>
									<input placeholder="اسم المستخدم الجديد"  type="text" name='newUserName' id='newUserName' />
								</div>
								<div class='input-field col s3 m3 l3 pull-m9 pull-s9 pull-l9'>
									<button type="submit">تعديل</button>
								</div>
							</form>
						</div>
						<p id="name-done" style="
							text-align: center;
							background-color: green;
							color: #FFF;
							font-size: 18px;
							padding: 2px 2px;
							margin-top: 10px;
							border-radius: 4px;
							display: none;
						">تمت العملية بنجاح ، قم بتسجيل الدخول لتحديث الملومات</p>			
						<div class='row'>
							<form id="setPassword" action="setPass.php" method="POST">
							<div class='input-field col s9 m9 l9 push-m3 push-l3 push-s3'>
								<input placeholder="كلمة المرور الجديدة" type='password' name='newPassword' id='newPassword' />
							</div>
							<div class='input-field col s9 m9 l9 push-m3 push-l3 push-s3'>
								<input placeholder="تأكيد كلمة المرور الجديدة" type='password' name='reNewPassword' id='reNewPassword' />
							</div>
								<div class='input-field col s3 m3 l3 pull-m9 pull-s9 pull-l9'>
								<button type="submit">تعديل</button>
							</form>
						</div>
				</div>
				<p id="pass-done" style="
							text-align: center;
							background-color: green;
							color: #FFF;
							font-size: 18px;
							padding: 2px 2px;
							margin-top: 10px;
							border-radius: 4px;
							display: none;
						">تمت عملية التعديل بنجاح</p>
			</div>
		</div>
		<!-- end edit profile-->



				<!-- start ask for course -->
				<div id="ask-for-course" class="modal popup ask-for">
		<div class="modal-content">
				<div class="dow-logo">
				<img src="layout/imgs/logo.jpg" alt="PTUKTESTY" class="expand-logo-dow  circle"/>
				</div>
		<a class="modal-action modal-close close" href="#">&times;</a>
				<div class="">
						<h4>طلب مادة</h4>
					<form id="asc" class="col s12" method="post" action="ask-for-course.php">

						<div class='row'>
							<div class='input-field col s9 m9 l9 push-m3 push-l3 push-s3'>
								<input placeholder="المادة المطلوبة" type='text' name='ask-course-field' id='ask-course-field' />
							</div>
								<div class='input-field col s3 m3 l3 pull-m9 pull-s9 pull-l9'>
								<button type="submit">ارسال</button>
							</div>
						</div>
						<input type="number" id="admin-id" hidden="hidden" value="">
						<p id="asc-done" style="
								background-color: green;
								text-align: center;
								color: #FFF;
								padding: 5px;
								border-radius: 4px;
								font-weight: bold;
								margin: 10px -10px -15px;
								display: none;
							">تم ارسال طلبك بنجاح ، سيتم التنفيذ باسرع وقت ممكن</p>
							<p id="asc-err" style="
								background-color: red;
								text-align: center;
								color: #FFF;
								padding: 5px;
								border-radius: 4px;
								font-weight: bold;
								margin: 10px -10px -15px;
								display: none;
							">الرجاء تحديد طلبك</p>
					</form>

				</div></div></div>
		<!-- end ask for course-->
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
										      <input type="checkbox" class="needs" value="1" name="needs[]" id="b" />
										      <label for="b">كتاب المادة</label>
										    </p>
											<p class="col l3 m6 s12">
										      <input type="checkbox" class="needs" value="2" name="needs[]" id="ib" />
										      <label for="ib">حلول المادة</label>
										    </p>
											<p class="col l3 m6 s12">
										      <input type="checkbox" class="needs" value="3" name="needs[]" id="sb" />
										      <label for="sb">سلايدات المادة</label>
										    </p>
											<p class="col l3 m6 s12">
										      <input type="checkbox" class="needs" value="4" name="needs[]" id="fb" />
										      <label for="fb">تلخيص المادة</label>
										    </p>
											<p class="col l3 m6 s12">
										      <input type="checkbox" class="needs" value="5" name="needs[]" id="ix" />
										      <label for="ix">اسئلة فيرست</label>
										    </p>
										    
										    <p class="col l3 m6 s12">
										      <input type="checkbox" class="needs" value="6" name="needs[]" id="sx" />
										      <label for="sx">أسئلة سكند</label>
										    </p>
										    <p class="col l3 m6 s12">
										      <input type="checkbox" class="needs" value="7" name="needs[]" id="fx" />
										      <label for="fx">أسئلة فاينال</label>
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
								<input placeholder="كلمة المرور" type='password' id='login-password' name="login-password" />
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
							<div class='input-field col s12 m6 l6 push-m6 push-l6 '>
								<input placeholder="إسم المستخدم" type='text' id="suser-name" name='suser-name' />
							</div>
								<div class='input-field col s12 m6 l6 pull-m6    pull-l6 '>
								<input placeholder="الرقم الجامعي " id="suser-number" type='text' name='suser-number' />
							</div>
						</div>
							<div class="row">
							<div class='input-field col s12 m6 l6 push-m6 push-l6 '>
								<input placeholder="البريد الالكتروني" id="suser-mail" type='text' name='suser-mail' />
							</div>
									<div class='input-field col s12 m6 l6 pull-m6    pull-l6'>
								<input placeholder="تأكيد البريد الالكتروني" id="suser-remail" type='text' name='suser-remail' />
							</div>
							
							</div>
						<div class='row'>
							<div class='input-field col s12 m6 l6 push-m6 push-l6 '>
								<input placeholder="الرقم السري" id="suser-pass" type='password' name='suser-pass' />
							</div>
								<div class='input-field col s12 m6 l6 pull-m6  pull-l6'>
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
		
		
		
		 <!-- start navigation bar-->
		<nav class="z-depth-2">
			<div class="nav-wrapper">
					<ul class="left">
							<li >
					<img id="logo" class="nav-image-circle expand-logo logo-img-bg" src="layout/imgs/logo.jpg" alt="profile picture">
							</li>
							<li><span id="min-logo" ><span style="    background-color: #FFF;
		padding: 2px;
		border-radius: 2px;
		position: relative;
		top: -5px;
		padding: 12px 26px;
		margin-left: 10px;"><span style="font-weight: bold;
		background-color: #264e90;
		border-radius: 2px;
		color: #FFF;
		font-size: 28px;
		position: relative;
		line-height: -1px;
		top: 4px;">&nbsp;e </span><sub style="color: #000;
		font-weight: bold;
		font-size: 12px;
		position: relative;
		top: 8px;">&nbsp;media </sub></span>&nbsp;</span></li>
				</ul>
				<?php if($in == 0){ ?>
				<ul class="log-in-buttons">
							<li>
						<button class=" login modal-trigger" href="#login">دخول / تسجيل</button>
						</li>
					
					</ul>
					<ul class="coll-list">
					<?php include 'coll.php'; ?>
					</ul>
					 <a class='dropdown-button  menu' href='#' style="display:none" data-activates='main-menu'>
					 	<img class="prof" style="padding: 0; top:3px;"  src="<?php echo $img ; ?>list.PNG" >

					 </a>
					<?php }else {?>
						<a class='dropdown-button  menu' href='#' data-activates='main-menu'>
							<img class="prof tooltipped" data-position="buttom" data-delay="50" data-tooltip="! 
							<?php echo $_SESSION['user-name'] ?> مرحبا"
							 src="<?php echo $pic .  $_SESSION['user-pic']; ?>" >
						</a>
						<ul class="coll-list">
						<?php include 'coll.php'; ?>
						</ul>
					<?php }

					?>

			<!-- Dropdown Structure -->
			<ul id='main-menu' class='dropdown-content z-depth-2'>
					<?php if($in == 0){?>
					<li class="login-menu"><button class=" modal-trigger" href="#login">دخول / تسجيل</button></li>
					<?php } else {

						?>
					<li class="edit-profile">
						<button id="ed" class=" modal-trigger" href="#edit-prifile"class="hoverable">الحساب<i class="material-icons">edit</i></button>

						<?php 
							// Check If This User Is Admin
							if ($in == 1){

								$stmt 	= $conn->prepare('SELECT `admin_status` FROM `users` WHERE `user_id` = ?');
								$stmt   ->execute(array($_SESSION['user-id']));
								$row 	= $stmt -> fetch();
								if ($row['admin_status'] == 1){
									echo '<button class="hoverable modal-trigger" id="admin-btn" href="#admin-panel" >مسؤول <i class="material-icons">verified_user</i></button>' ;
								}else {
									
									echo "<script>$('#ed').css({'width' : '100%'});</script>";
									
								}
							}else {
								echo '<button class="hoverable modal-trigger" href="#admin-panel" >مسؤول <i class="material-icons">verified_user</i></button>' ;
							}
						} ?>
					</li>
					<?php 
					if ($in == 1){ ?>
					<li class="edit-profile">
						<button class="modal-trigger hoverable table-log green" href="#add_table">الجدول الدراسي 
							<i class="material-icons">grid_on</i>
						</button>
						<button id="log-out" onclick="
							$.ajax({  
                  type: 'POST',
                  url: 'logout.php',
                  success : function(data) {
                    location.reload();
                  },
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.');
                    }
                });
						" class="hoverable table-log red">خروج
							<i class="material-icons">exit_to_app</i>
						</button>
					</li>
					<?php } ?>
					<?php include 'collList.php'; ?>
			</ul> 
			</div>
		</nav>
		<!-- end navigation bar-->



		<?php 
							// Check If This User Is Admin
							if ($in == 1){

								$stmt 	= $conn->prepare('SELECT `admin_status` FROM `users` WHERE `user_id` = ?');
								$stmt   ->execute(array($_SESSION['user-id']));
								$row 	= $stmt -> fetch();
								if ($row['admin_status'] == 1){ ?>
									<!-- start admin panel modal-->
		<div id="admin-panel" class="modal popup">
				<!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID  class="close-animatedModal" -->
				<div class="close" > 
						<a class="modal-action modal-close hoverable tooltipped" data-position="buttom" data-delay="50" data-tooltip="العودة للرئيسية"  href="#">
			&times
						</a>
				</div>
				<div class="admin-header">
					<div class="admin-logo">
						<img src="layout/imgs/logo.jpg" alt="PTUKTESTY" class="z-depth-1"/>
					</div>
					<ul>
						<li><span><?php echo $_SESSION['user-name']; ?></span><i class="material-icons">verified_user</i></li>
						<li><span><?php echo $_SESSION['coll-name']; ?></span><i class="material-icons">equalizer</i></li>
						<li><span><?php echo $_SESSION['sp-name']; ?></span><i class="material-icons">group</i></li>
						<li><span><?php 
											$stmt 	= $conn->prepare('SELECT `admin_type` FROM `admins` WHERE `user_id` = ?');
											$stmt   ->execute(array($_SESSION['user-id']));
											$row 	= $stmt->fetch();
											$adminType = $row['admin_type'];
											if(strlen($adminType)== 1){
												$adminType = '000' . $adminType;
											} else if(strlen($adminType)==2){
												$adminType = '00' . $adminType;
											} else if(strlen($adminType)==3){
												$adminType = '0' . $adminType;
											}
											$stmt 	= $conn->prepare('SELECT `course_type_name` FROM `course_type` WHERE `course_type_id` = ?');
											$stmt   ->execute(array($adminType[3]));
											$row 	= $stmt->fetch();
											echo $row['course_type_name'];
						?></span><i class="material-icons">event_note</i></li>
					</ul>
				</div>
				<div class="modal-content">
				 <div class="row">
						<div class="col l7 m7 s12">
						 <div class="admin-sec ">
								<div class="hed bad z-depth-1"><h5 class="ref-comment ref">تعليقات</h5>
								 <div class="admin-badges">10</div></div>
								

								 <div class="cont">
								 <ul class="to-accept">
									</ul>
								 </div>
								</div>
								
						 <div class="admin-sec ">
								<div class="hed good z-depth-1"><h5>إضافة مادة جديدة</h5></div>
								

								 <div class="cont">
										 <div class="add-course">
								 <table class="bordered striped centered courses-table">
				<thead>
					<tr>
							<th>اسم المساق </th>
							<th>رقم المساق </th>
							<th>عدد الساعات</th>
					</tr>
				</thead>

				<tbody class="admin-courses-table">
						
				</tbody>
			</table></div>
										<div class="add-cors">
										<div class="row">
											<form id="add-course" action="add-course.php" method="post">
												<div class="input-field col s12 push-m8 m4 push-l8 l4">
															<input placeholder="اسم المساق" type="text" name="course-name" id="course-name">
														</div>
												<div class="input-field col s12 push-m1 m3 push-l1 l3 ">
															<input placeholder="رقم المساق" type="number" name="course-number" id="course-number">
														</div>
												<div class="input-field col s12 m3 pull-l5 pull-m5 l3">
															<input placeholder="عدد الساعات" type="number" max="4" min="1" name="course-weight" id="course-weight">
														</div>
												<div class="input-field col pull-m10 s12 m2 pull-l10 l2">
															<button type="submit">إضافة</button>
														</div>
														</form>
													</div>
													<p id="add-course-done" style="
								background-color: green;
								text-align: center;
								color: #FFF;
								padding: 5px;
								border-radius: 4px;
								font-weight: bold;
								margin: 10px;
								display: none;
							">تمت عملية الإضافة بنجاح</p>
							<p id="add-course-err" style="
								background-color: red;
								text-align: center;
								color: #FFF;
								padding: 5px;
								border-radius: 4px;
								font-weight: bold;
								margin: 10px;
								display: none;
							">رقم المساق موجود بالفعل الرجاء التأكد من معلومات المساق</p>
										 </div>
								 </div>
								</div>
								
						 <div class="admin-sec ">
								<div class="hed good z-depth-1"><h5>إضافة محتوى جديد</h5></div>
								 <div class="cont">
										 <div class="add-content">
												 <div class="row">
												 	<form id="upload-form" method="POST" enctype="multipart/form-data" action="upload-file.php">
																						 <div class="input-field col s12 m3 l3 push-m9 push-l9">
														<select id="course-to-upload">
															<?php 
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
					$stmt 	= $conn->prepare('SELECT `name`, `id` FROM `uni_mand_courses`');
					$stmt   ->execute();
					$rows 	= $stmt->fetchall();
					foreach ($rows as $row) { ?>
										<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
					<?php }
				} elseif ($adminType[3] == 2) {
					$stmt 	= $conn->prepare('SELECT `name`, `id` FROM `uni_opt_courses`');
					$stmt   ->execute();
					$rows 	= $stmt->fetchall();
					foreach ($rows as $row) { ?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
					<?php }
				} elseif ($adminType[3] == 3) {
					$stmt 	= $conn->prepare('SELECT `name`, `id` FROM `coll_mand_courses` WHERE `coll_id` = ?');
					$stmt   ->execute(array($adminType[0]));
					$rows 	= $stmt->fetchall();
					foreach ($rows as $row) { ?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
					<?php }
				} elseif ($adminType[3] == 4) {
					$stmt 	= $conn->prepare('SELECT `name`, `id` FROM `sp_mand_courses` WHERE `sp_id` = ?');
					$stmt   ->execute(array($adminType[1] . $adminType[2]));
					$rows 	= $stmt->fetchall();
					foreach ($rows as $row) { ?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
					<?php }
				} elseif ($adminType[3] == 5) {
					$stmt 	= $conn->prepare('SELECT `name`, `id` FROM `sp_opt_courses` WHERE `sp_id` = ?');
					$stmt   ->execute(array($adminType[1] . $adminType[2]));
					$rows 	= $stmt->fetchall();
					foreach ($rows as $row) { ?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
					<?php }
				} elseif ($adminType[3] == 6) {
					$stmt 	= $conn->prepare('SELECT `name`, `id` FROM `uni_other_courses`');
					$stmt   ->execute();
					$rows 	= $stmt->fetchall();
					foreach ($rows as $row) { ?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
					<?php }
				}?>
														</select>
														<label style="position: relative;top: -55px;right: 0px;">اختر مادة</label>
													</div>
																								<div class="input-field col s12 m3 l3 push-m3 push-l3">
														<select id="content-to-upload">
																<?php 
														$spe 		= $conn->prepare('SELECT * FROM `content_types`');
														$spe   	->execute();
														$rowws   = $spe ->fetchall();
														foreach ($rowws as $roww) { ?>
															<option value="<?php echo $roww['content_type_id'] ; ?>"><?php echo $roww['content_type_name'] ; ?></option>
														<?php } ?>
														</select>
														<label style="position: relative;top: -55px;right: 0px;">اختر نوع المحتوى</label>
													</div>
														 <div class="input-field col s12 m6 l6 pull-m6 pull-l6">
																<div class="upload-content">
																		<span>إختر ملف</span>
																 <input type="file" id="up-file">
																 </div><button type="submit" ">إضافة</button></div>
														 </form>
												 </div>
												 <p id="upload-status" style="
												 background-color: #1382FF;
												display: block;
												padding: 0 12px;
												margin: 0;
												font-weight: bold;
												border-radius: 3px;
												color: #FFF;
												 "></p>
												 <p id="prog" style="
												 height: 19px;
												 display: none;
												 background-color: #FFF;
												 border: 2px solid #DDD;
												 "	>
												 	<span id="upload-prog" style="
														background-color: #44e000;
														float: right;
														height: 15px;
														font-size: 10px;
														color: #000;
														text-align: center;
												 	"></span>
												 </p>
												</div>
								 </div>
								</div>
						 </div>
						 <div class="col l5 m5 s12">
						 <div class="admin-sec">
								 <div class="hed bad z-depth-1"><h5 class="ref-content ref">طلبات المحتوى</h5><div class="admin-badges">10</div></div>
								 <div class="cont">
								 <ul class="to-add-content">
									</ul>
								 </div></div>
								 <div class="admin-sec">
								 <div class="hed bad z-depth-1"><h5 class="ref-course ref">طلبات المواد</h5><div class="admin-badges">10</div></div>
								 <div class="cont">
								 <ul class="to-add-course">
									</ul>
								 </div></div>
						 </div>
						</div>
				 
				</div>
		</div>
								<?php
								}else {}
						} ?>
		
		

		<!-- start sections -->
		<div class="row">
				<div class=" col s12 l4 push-l8 m5 push-m7">
				<div class="inner-container course-list-container">
						<div class="div-head"><h6><span class="collage-name">
							<?php 
							if(isset($_SESSION['coll-name'])){echo $_SESSION['coll-name']; 
						}
							else{
								echo "الهندسة والتكنولوجيا";
							} ?>
						</span></h6></div>
						
								<div class="list-type5 ">
								<ul class="sp">
									<?php include 'spList.php'; ?>
								</ul>
</div>

		</div>
		
		</div>
		<div class=" col s12 l8 pull-l4 m7 pull-m5">
				<div class="inner-container course-list-container">
						<div class="div-head " id="moad"><h6><span class="sp-name">
							<?php 
								if(isset($_SESSION['sp-name'])) {
									echo $_SESSION['sp-name'];
								} else {
									echo "هندسة انظمة الحاسوب";
								} ?>

						</span><a id="adv-plan" href="content/plan/1/plan.pdf" target="_blank" class=" tooltipped " data-position="top" data-delay="50" data-tooltip="الخطة الدراسية"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
</a></h6></div>
						<ul class="collapsible courses-type" data-collapsible="accordion">
							<?php include 'courseTypes.php'; ?>
	</ul>


						
				</div>
				</div>
		
				</div>
		 <!-- show and download Structure -->
	<div id="sad" class="modal dowmodal">
		<div class="modal-content dow-content">
		<span class="modal-close">&times;</span>

				<?php if($in == 1) { ?>
						<a href="#ask-for-content" course-id="" course-admin="" class="ask asm hoverable tooltipped modal-trigger modal-close" data-position="bottom" data-delay="50" data-tooltip="أطلب من المسؤول اضافة أسئلة وتلاخيص ">أطلب محتوى</a>
				<?php 
					} else { ?>
						<a href="#login" class="ask hoverable tooltipped modal-trigger modal-close" data-position="bottom" data-delay="50" data-tooltip="قم بتسجيل الدخول للتمتع بهذه الميزة">أطلب محتوى</a>
					<?php } ?>
			<div class="dow-logo">
				<img src="layout/imgs/logo.jpg" alt="PTUKTESTY" class="expand-logo-dow  circle"/>
					<hr>
			</div>
			<div id="cd">

			</div>
		</div>
	</div>
		<!-- end comment div-->
		
		
		
		<!-- end show and download Structure -->
		
		<!-- start add teble-->
		<div id="add_table" class="modal add-Schedule">
		<div class="modal-content add-Schedule-content">
				<div class="add-Schedule-logo">
				<img src="layout/imgs/logo.jpg" alt="PTUKTESTY" class="expand-logo-dow  circle"/>
				</div>
			<h4>أضف جدولك الدراسي</h4>
				<hr>
				<div class="select-courses">
						<div class="row">
				<div class="input-field col s12 m12 l12">
					<form id="add-schedual" action="add-schedual.php" method="POST">
					<select multiple id="course-selector" name="course-selector">
											<?php 
												$ct 	= $conn->prepare('SELECT `course_type_id`, `course_type_name` FROM `course_type`');
												$ct    ->execute();
												$rows   		= $ct ->fetchall();
												foreach ($rows as $row) { ?>
													<optgroup label="<?php echo $row['course_type_name'] ; ?>">
														<?php 
															if( $row['course_type_id'] == 1) {
																$cl 		= $conn->prepare('SELECT `name`, `id` FROM `uni_mand_courses`');
																$cl   	->execute();
																$rowws   = $cl ->fetchall();
																foreach ($rowws as $roww) { ?>
																	<option value="
																	<?php echo $roww['id'] ; ?>,<?php echo $row['course_type_id'] ; ?>">
																	<?php echo $roww['name'] ; ?></option>
															<?php } 
															} elseif ($row['course_type_id'] == 2) {
																$cl 		= $conn->prepare('SELECT `name`, `id` FROM `uni_opt_courses`');
																$cl   	->execute();
																$rowws   = $cl ->fetchall();
																foreach ($rowws as $roww) { ?>
																	<option value="
																	<?php echo $roww['id'] ; ?>,<?php echo $row['course_type_id'] ; ?>">
																	<?php echo $roww['name'] ; ?></option>
															<?php } 
															} elseif ($row['course_type_id'] == 3) {
																$cl 		= $conn->prepare('SELECT `name`, `id` FROM `coll_mand_courses` where coll_id = ?');
																$cl   	->execute(array($_SESSION['user-coll']));
																$rowws   = $cl ->fetchall();
																foreach ($rowws as $roww) { ?>
																	<option value="
																	<?php echo $roww['id'] ; ?>,<?php echo $row['course_type_id'] ; ?>">
																	<?php echo $roww['name'] ; ?></option>
															<?php } 																
															} elseif ($row['course_type_id'] == 4) {
																$cl 		= $conn->prepare('SELECT `name`, `id` FROM `sp_mand_courses` WHERE sp_id = ?');
																$cl   	->execute(array($_SESSION['user-sp']));
																$rowws   = $cl ->fetchall();
																foreach ($rowws as $roww) { ?>
																	<option value="
																	<?php echo $roww['id'] ; ?>,<?php echo $row['course_type_id'] ; ?>">
																	<?php echo $roww['name'] ; ?></option>
															<?php } 
															} elseif ($row['course_type_id'] == 5) {
																$cl 		= $conn->prepare('SELECT `name`, `id` FROM `sp_opt_courses` WHERE sp_id = ?');
																$cl   	->execute(array($_SESSION['user-sp']));
																$rowws   = $cl ->fetchall();
																foreach ($rowws as $roww) { ?>
																	<option value="
																	<?php echo $roww['id'] ; ?>,<?php echo $row['course_type_id'] ; ?>">
																	<?php echo $roww['name'] ; ?></option>
															<?php } 
															} elseif ($row['course_type_id'] == 6) {
																$cl 		= $conn->prepare('SELECT `name`, `id` FROM `uni_other_courses`');
																$cl   	->execute();
																$rowws   = $cl ->fetchall();
																foreach ($rowws as $roww) { ?>
																	<option value="
																	<?php echo $roww['id'] ; ?>,<?php echo $row['course_type_id'] ; ?>">
																	<?php echo $roww['name'] ; ?></option>
															<?php } 
															}

														?> 
													</optgroup>
											<?php } ?>
			  		</select>
			 	</div>
				</div>
				</div>
				<div class="row">
						<ul class="collection with-header my-schedule" id="my-schedule">
							<?php
								$stmt 	= $conn->prepare('SELECT * FROM `user_schedual` WHERE `user_id`= ?');
								$stmt   ->execute(array($_COOKIE['user-id']));
								$rows 	= $stmt->fetchall();
								foreach ($rows as $row) {
									if($row['course_type'] == 1) {?>
							<li class="collection-item dismissable">
								<div><span style="
									background-color: #FAF3DF;
									padding: 2px 6px;
									border-radius: 7px;
								">
								<?php $cn 	= $conn->prepare('SELECT `name` FROM `uni_mand_courses` WHERE `id` = ?');
											$cn   ->execute(array($row['course_id']));
											$cnr 	= $cn->fetch();
											echo $cnr['name'];
											?></span><input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>share.php?course-id=<?php echo $row['course_id']; ?>&ct=<?php echo '1' ?>
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
										" class=" tooltipped cop secondary-content" data-position="top" data-delay="50" data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $row['course_id']; ?>">
																<i class="material-icons hvr-float-shadow">content_copy</i>
															</a>
															<a href="#sad" id="course-details" course-id="<?php echo $row['course_id']; ?>" onclick="
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
						} elseif ($row['course_type'] == 2) {
								?>
							<li class="collection-item dismissable">
								<div><span style="
									background-color: #FAF3DF;
									padding: 2px 6px;
									border-radius: 7px;
								">
								<?php $cn 	= $conn->prepare('SELECT `name` FROM `uni_opt_courses` WHERE `id` = ?');
											$cn   ->execute(array($row['course_id']));
											$cnr 	= $cn->fetch();
											echo $cnr['name'];
											?></span><input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>share.php?course-id=<?php echo $row['course_id']; ?>&ct=<?php echo '2' ?>
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
										" class=" tooltipped cop secondary-content" data-position="top" data-delay="50" data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $row['course_id']; ?>">
																<i class="material-icons hvr-float-shadow">content_copy</i>
															</a>
															<a href="#sad" id="course-details" course-id="<?php echo $row['course_id']; ?>" onclick="
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
						} elseif ($row['course_type'] == 3) {
							?>
							<li class="collection-item dismissable">
								<div><span style="
									background-color: #FAF3DF;
									padding: 2px 6px;
									border-radius: 7px;
								">
								<?php $cn 	= $conn->prepare('SELECT `name` FROM `coll_mand_courses` WHERE `id` = ?');
											$cn   ->execute(array($row['course_id']));
											$cnr 	= $cn->fetch();
											echo $cnr['name'];
											?></span><input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>share.php?course-id=<?php echo $row['course_id']; ?>&ct=<?php echo '3' ?>
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
										" class=" tooltipped cop secondary-content" data-position="top" data-delay="50" data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $row['course_id']; ?>">
																<i class="material-icons hvr-float-shadow">content_copy</i>
															</a>
															<a href="#sad" id="course-details" course-id="<?php echo $row['course_id']; ?>" onclick="
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
								
						} elseif ($row['course_type'] == 4) {
								?>
							<li class="collection-item dismissable">
								<div><span style="
									background-color: #FAF3DF;
									padding: 2px 6px;
									border-radius: 7px;
								">
								<?php $cn 	= $conn->prepare('SELECT `name` FROM `sp_mand_courses` WHERE `id` = ?');
											$cn   ->execute(array($row['course_id']));
											$cnr 	= $cn->fetch();
											echo $cnr['name'];
											?></span><input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>share.php?course-id=<?php echo $row['course_id']; ?>&ct=<?php echo '4' ?>
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
										"  class=" tooltipped cop secondary-content" data-position="top" data-delay="50" 
												data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $row['course_id']; ?>">
																<i class="material-icons hvr-float-shadow">content_copy</i>
															</a>
															<a href="#sad" id="course-details" course-id="<?php echo $row['course_id']; ?>" onclick="
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
						} elseif ($row['course_type'] == 5) {
								?>
							<li class="collection-item dismissable">
								<div><span style="
									background-color: #FAF3DF;
									padding: 2px 6px;
									border-radius: 7px;
								">
								<?php $cn 	= $conn->prepare('SELECT `name` FROM `sp_opt_courses` WHERE `id` = ?');
											$cn   ->execute(array($row['course_id']));
											$cnr 	= $cn->fetch();
											echo $cnr['name'];
											?></span><input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>share.php?course-id=<?php echo $row['course_id']; ?>&ct=<?php echo '5' ?>
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
										" class=" tooltipped cop secondary-content" data-position="top" data-delay="50" data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $row['course_id']; ?>">
																<i class="material-icons hvr-float-shadow">content_copy</i>
															</a>
															<a href="#sad" id="course-details" course-id="<?php echo $row['course_id']; ?>" onclick="
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
						} elseif ($row['course_type'] == 6) {
								?>
							<li class="collection-item dismissable">
								<div><span style="
									background-color: #FAF3DF;
									padding: 2px 6px;
									border-radius: 7px;
								">
								<?php $cn 	= $conn->prepare('SELECT `name` FROM `uni_other_courses` WHERE `id` = ?');
											$cn   ->execute(array($row['course_id']));
											$cnr 	= $cn->fetch();
											echo $cnr['name'];
											?></span><input type="text" style="position: absolute;opacity: 0" name="courseUrl" id="courseUrl" value="
										http://<?php echo $host; ?>share.php?course-id=<?php echo $row['course_id']; ?>&ct=<?php echo '6' ?>
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
										" class=" tooltipped cop secondary-content" data-position="top" data-delay="50" data-tooltip="نسخ الرابط ومشاركته" course-id="<?php echo $row['course_id']; ?>">
																<i class="material-icons hvr-float-shadow">content_copy</i>
															</a>
															<a href="#sad" id="course-details" course-id="<?php echo $row['course_id']; ?>" onclick="
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
						} } ?>
								
						</ul>
						</div>
						<div class="col s12 m12 l12" >
								<button type="submit" disabled class="btn z-depth-1 waves-light green save-schedule-btn hoverable">حفظ الجدول </button>
						
						</div>
				</form>
		</div>
	</div>
		<!-- end add table -->
		<!-- end sections -->
		<!-- start footer-->
		
<footer class="footer">
				
		<div class="copyright row">
				<div class="col s12 m6 l4"><span class="l" >&copy; 2018 , Akram Yamin , All rights reserved </span></div>
				<div class="col s12 m6 l4 contact"><span >
				<a href="https://www.facebook.com/EduMedia-147910035882502/" target="_blank"><img src="layout/imgs/fb.png"></a>
				<a href="https://www.linkedin.com/in/akram-yamin-82399a100/" target="_blank"><img src="layout/imgs/li.png"></a>
				<a href="https://www.youtube.com/channel/UCheeDMx3cKyF_Whw7E16xRg" target="_blank"><img src="layout/imgs/yt.png"></a></span></div>
				<div class="col s12 m12 l4"><span class="r " ><span style="background-color: #FFF; padding: 2px; border-radius: 2px;position: relative;
		top: -2px;"><span style="font-weight: bold; background-color: #264e90; border-radius: 1px">&nbsp;e </span><sub style="color: #000; font-weight: bold">&nbsp;media </sub></span>&nbsp;| Web Design &amp; Development by Akram Yamin </span></div>
		
		
		
		
		
		</div>
</footer>    
		<!-- end footer-->
		
		<!-- import js files-->
		
		</div>
<?php require $temp . 'footer.php'; ?>