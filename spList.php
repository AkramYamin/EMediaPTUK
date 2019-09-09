<?php 

	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database

	$collage = '';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$collage = $_POST['coll-id']; 
	} else {
		if(isset($_SESSION['user-coll'])) {
			$collage = $_SESSION['user-coll'];
		} else {
			$collage = 1;
		}
	} 

		// Retreav Collage Data
		$stmt 	= $conn->prepare('SELECT * FROM `specialty` WHERE `sp_col_fk` = ?');
		$stmt   ->execute(array($collage));
		$rows   = $stmt ->fetchall();
		foreach ($rows as $row) { ?>
					<li class="hvr-underline-from-right hoverable change-sp" 
						onclick="
						$('.sp-name').text($(this).attr('sp-name'));
						$('#adv-plan').show();
						$('#adv-plan').attr('href', '<?php echo $row['sp_plan']; ?>');
						var newSp = $(this).attr('value');
				                  	$.ajax({  
					                  type: 'POST',
					                  url: 'courseTypes.php',
					                  data: {
					                  	'new-sp' : newSp
					                  },
					                  success : function(data) {
					                  	$('.courses-type').html(data);
					                  },
					                  error : function(){
					                        alert('Whoops! This didn\'t work. Please contact us.')
					                    }
					                });
						"
						value="<?php echo $row['sp_id']; ?>" 
						sp-name="<?php echo $row['sp_name']; ?>">
						<a href="#moad" >
							<?php echo $row['sp_name']; ?>
						</a>
					</li>
		<?php } ?>