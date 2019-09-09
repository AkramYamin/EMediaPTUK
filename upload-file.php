<?php 
	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
	//Check upload_max_filesize and post_max_size in php.ini
	$courseId = $contentId = '';
	 // generate path function 
	function generatePath($adminType) {
    	$path = 'content/';
    	$path = $path .  $adminType[3] . '/';
    	if ($adminType[3] == 3) {
    		$path = $path . $adminType[0] . '/';
    	}
    	if ($adminType[3] == 4 or $adminType[3] == 5) {
    		$path = $path . intval($adminType[1] . $adminType[2]) . '/';
    	}
    	return $path;
	} 
	// create course directory and its contents
	function createCourseDir ($path, $courseId) {
		if (file_exists ( $path . $courseId )) {
			return $path . $courseId . '/';
		} else {
			$newP = $path . $courseId . '/';
			mkdir($newP, 0777, true);
			for ($i=1; $i <8 ; $i++) { 
				mkdir($newP . $i . '/' , 0777, true);
			}
			return $newP;
		}
	}
	function addPathToDataBase ($contentId, $path, $adminType, $courseId, $conn) {
		$query ='' ;
		if ($adminType == 1) {
			if ($contentId == 1) {
				$query = 'UPDATE `uni_mand_courses` SET `main_book`=? WHERE id = ?';
			} elseif ($contentId == 2) {
				$query = 'UPDATE `uni_mand_courses` SET `first_material`=? WHERE id = ?';
			} elseif ($contentId == 3) {
				$query = 'UPDATE `uni_mand_courses` SET `second_material`=? WHERE id = ?';
			} elseif ($contentId == 4) {
				$query = 'UPDATE `uni_mand_courses` SET `final_material`=? WHERE id = ?';
			} elseif ($contentId == 5) {
				$query = 'UPDATE `uni_mand_courses` SET `first_exam`=? WHERE id = ?';
			} elseif ($contentId == 6) {
				$query = 'UPDATE `uni_mand_courses` SET `second_exam`=? WHERE id = ?';
			} elseif ($contentId == 7) {
				$query = 'UPDATE `uni_mand_courses` SET `final_exam`=? WHERE id = ?';
			}
		} elseif ($adminType == 2) {
			if ($contentId == 1) {
				$query = 'UPDATE `uni_opt_courses` SET `main_book`=? WHERE id = ?';
			} elseif ($contentId == 2) {
				$query = 'UPDATE `uni_opt_courses` SET `first_material`=? WHERE id = ?';
			} elseif ($contentId == 3) {
				$query = 'UPDATE `uni_opt_courses` SET `second_material`=? WHERE id = ?';
			} elseif ($contentId == 4) {
				$query = 'UPDATE `uni_opt_courses` SET `final_material`=? WHERE id = ?';
			} elseif ($contentId == 5) {
				$query = 'UPDATE `uni_opt_courses` SET `first_exam`=? WHERE id = ?';
			} elseif ($contentId == 6) {
				$query = 'UPDATE `uni_opt_courses` SET `second_exam`=? WHERE id = ?';
			} elseif ($contentId == 7) {
				$query = 'UPDATE `uni_opt_courses` SET `final_exam`=? WHERE id = ?';
			}
		} elseif ($adminType == 3) {
			if ($contentId == 1) {
				$query = 'UPDATE `coll_mand_courses` SET `main_book`=? WHERE id = ?';
			} elseif ($contentId == 2) {
				$query = 'UPDATE `coll_mand_courses` SET `first_material`=? WHERE id = ?';
			} elseif ($contentId == 3) {
				$query = 'UPDATE `coll_mand_courses` SET `second_material`=? WHERE id = ?';
			} elseif ($contentId == 4) {
				$query = 'UPDATE `coll_mand_courses` SET `final_material`=? WHERE id = ?';
			} elseif ($contentId == 5) {
				$query = 'UPDATE `coll_mand_courses` SET `first_exam`=? WHERE id = ?';
			} elseif ($contentId == 6) {
				$query = 'UPDATE `coll_mand_courses` SET `second_exam`=? WHERE id = ?';
			} elseif ($contentId == 7) {
				$query = 'UPDATE `coll_mand_courses` SET `final_exam`=? WHERE id = ?';
			}
		} elseif ($adminType == 4) {
			if ($contentId == 1) {
				$query = 'UPDATE `sp_mand_courses` SET `main_book`=? WHERE id = ?';
			} elseif ($contentId == 2) {
				$query = 'UPDATE `sp_mand_courses` SET `first_material`=? WHERE id = ?';
			} elseif ($contentId == 3) {
				$query = 'UPDATE `sp_mand_courses` SET `second_material`=? WHERE id = ?';
			} elseif ($contentId == 4) {
				$query = 'UPDATE `sp_mand_courses` SET `final_material`=? WHERE id = ?';
			} elseif ($contentId == 5) {
				$query = 'UPDATE `sp_mand_courses` SET `first_exam`=? WHERE id = ?';
			} elseif ($contentId == 6) {
				$query = 'UPDATE `sp_mand_courses` SET `second_exam`=? WHERE id = ?';
			} elseif ($contentId == 7) {
				$query = 'UPDATE `sp_mand_courses` SET `final_exam`=? WHERE id = ?';
			}
		} elseif ($adminType == 5) {
			if ($contentId == 1) {
				$query = 'UPDATE sp_opt_courses` SET `main_book`=? WHERE id = ?';
			} elseif ($contentId == 2) {
				$query = 'UPDATE `sp_opt_courses` SET `first_material`=? WHERE id = ?';
			} elseif ($contentId == 3) {
				$query = 'UPDATE `sp_opt_courses` SET `second_material`=? WHERE id = ?';
			} elseif ($contentId == 4) {
				$query = 'UPDATE `sp_opt_courses` SET `final_material`=? WHERE id = ?';
			} elseif ($contentId == 5) {
				$query = 'UPDATE `sp_opt_courses` SET `first_exam`=? WHERE id = ?';
			} elseif ($contentId == 6) {
				$query = 'UPDATE `sp_opt_courses` SET `second_exam`=? WHERE id = ?';
			} elseif ($contentId == 7) {
				$query = 'UPDATE `sp_opt_courses` SET `final_exam`=? WHERE id = ?';
			}
		} elseif ($adminType == 6) {
			if ($contentId == 1) {
				$query = 'UPDATE `coll_other_courses` SET `main_book`=? WHERE id = ?';
			} elseif ($contentId == 2) {
				$query = 'UPDATE `coll_other_courses` SET `first_material`=? WHERE id = ?';
			} elseif ($contentId == 3) {
				$query = 'UPDATE `coll_other_courses` SET `second_material`=? WHERE id = ?';
			} elseif ($contentId == 4) {
				$query = 'UPDATE `coll_other_courses` SET `final_material`=? WHERE id = ?';
			} elseif ($contentId == 5) {
				$query = 'UPDATE `coll_other_courses` SET `first_exam`=? WHERE id = ?';
			} elseif ($contentId == 6) {
				$query = 'UPDATE `coll_other_courses` SET `second_exam`=? WHERE id = ?';
			} elseif ($contentId == 7) {
				$query = 'UPDATE `coll_other_courses` SET `final_exam`=? WHERE id = ?';
			}
		}
		$stmt 	= $conn->prepare($query);
		$stmt   ->execute(array($path, $courseId));
		list($content, $courseType, $spId, $courseId, $contentType) = explode("/", $path);
		$zip_file = 'zipped/' . $spId . $courseId . $contentType . '.zip';
		if(file_exists($zip_file)){
		    unlink($zip_file);
		}

	}
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$courseId = $_POST['courseId'];
		$contentId = $_POST['contentId'];
		if(isset($_FILES) && !empty($_FILES['file']['name'])){
			$allowed_ext = array('jpg','png', 'rar', 'zip', 'pdf', 'docx', 'pptx', 'PNG', 'JPG');
			$filename = $_FILES['file']['name'];
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
				$myP =  generatePath($adminType);
				$myP = createCourseDir($myP, $courseId);
				$tempPath = $myP . $contentId ;
				$myP = $myP . $contentId . '/';
			$ext = explode('.',$filename);
			$ext = end($ext);
			if(in_array($ext,$allowed_ext)){
				if (move_uploaded_file($_FILES['file']['tmp_name'], $myP . date('y-m-d') . '-' . $_FILES['file']['name'])) {
					addPathToDataBase($contentId, $tempPath, $adminType[3], $courseId, $conn);
					echo 'تم تحميل الملف بنجاح "' . $_FILES['file']['name'] . ' "' ;

			} else {
				echo "حدث خطأ أثناء رفع الملف الرجاء المحاولة مرة اخرى";
			}
			}else{
				echo 'صيغة الملف غير مدعومة يسمح فقط ب jpg, png, rar, zip, pdf, docx, ppz';
			}
		}else{
			echo 'الرجاء  اختيار ملف لتحميله';
		}
		exit;
	}