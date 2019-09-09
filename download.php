<?php 
    require 'paths.php'; // Include Paths 
    require $func . 'connect.php'; //Connect To Database
    
    $courses = '';
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $dir = $_GET['path'];
                list($content, $courseType, $spId, $courseId, $contentType) = split('[/.-]', $dir);
                $zip_file = 'zipped/' . $spId . $courseId . $contentType . '.zip';
                
                // Get real path for our folder
                $rootPath = realpath($dir);

                // Initialize archive object
                $zip = new ZipArchive();

                if ($zip->open($zip_file) !== TRUE) {
                
                $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

                // Create recursive directory iterator
                /** @var SplFileInfo[] $files */
                $files = new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator($rootPath),
                    RecursiveIteratorIterator::LEAVES_ONLY
                );

                foreach ($files as $name => $file)
                {
                    // Skip directories (they would be added automatically)
                    if (!$file->isDir())
                    {
                        // Get real and relative path for current file
                        $filePath = $file->getRealPath();
                        $relativePath = substr($filePath, strlen($rootPath) + 1);

                        // Add current file to archive
                        $zip->addFile($filePath, $relativePath);
                    }
                }

                // Zip archive will be created only after closing object
                $zip->close();
                }
		$query ='' ;
                $how = '';
$courseTemp;
        if ($courseType == 1) {
            $query = 'UPDATE `uni_mand_courses` SET `downloads`= ? WHERE `id` = ?';
            $how = 'SELECT `downloads` FROM `uni_mand_courses` WHERE `id` = ?';
	    $courseTemp = $spId;
        } elseif ($courseType == 2) {
            $query = 'UPDATE `uni_opt_courses` SET `downloads`= ? WHERE `id` = ?';
            $how = 'SELECT `downloads` FROM `uni_opt_courses` WHERE `id` = ?';
	    $courseTemp = $spId;
        } elseif ($courseType == 3) {
            $query = 'UPDATE `coll_mand_courses` SET `downloads`= ? WHERE `id` = ?';
            $how = 'SELECT `downloads` FROM `coll_mand_courses` WHERE `id` = ?';
	    $courseTemp = $courseId;
        } elseif ($courseType == 4) {
            $query = 'UPDATE `sp_mand_courses` SET `downloads`= ? WHERE `id` = ?';
            $how = 'SELECT `downloads` FROM `sp_mand_courses` WHERE `id` = ?';
	    $courseTemp = $courseId;
        } elseif ($courseType == 5) {
            $query = 'UPDATE `sp_opt_courses` SET `downloads`= ? WHERE `id` = ?';
            $how = 'SELECT `downloads` FROM `sp_opt_courses` WHERE `id` = ?';
	    $courseTemp = $courseId;
        } elseif ($courseType == 6) {
            $query = 'UPDATE `uni_other_courses` SET `downloads`= ? WHERE `id` = ?';
            $how = 'SELECT `downloads` FROM `uni_other_courses` WHERE `id` = ?';
	    $courseTemp = $spId;
        }
        $stmt   = $conn->prepare($how);
        $stmt   ->execute(array($courseTemp));
        $row    = $stmt->fetch();
        $stmt   = $conn->prepare($query);
        $stmt   ->execute(array(intval($row['downloads']) +1, $courseTemp));
                header('Location:http://www.emediaptuk.com/' . $zip_file);
		exit;
            } else {
        header('Location:http://www.emediaptuk.com/');
        exit;
    }   
