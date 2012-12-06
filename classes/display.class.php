<?php
class Display {
	function formElement($display,$form_field,$required=0) {
		if ($required==1) {
			$display = '<font color="Red">*</font>'.$display;
		} else {
			$display = ' &nbsp; '.$display;
		}
		
		if (isset($_SESSION['post']['errors']) && is_array($_SESSION['post']['errors'])) {
			if (is_array($form_field)) {
				foreach ($form_field as $ff) {
					if (in_array($ff,$_SESSION['post']['errors'])) {
						echo '<span class="error">'.$display.'</span>';
						$match = 1;
					}
				}
				if ($match != 1) {
					echo $display;
				}
			} else {
				
				if (in_array($form_field,$_SESSION['post']['errors'])) {
					echo '<span class="error">'.$display.'<br /></span>';
				} else {
					echo $display;
				}
			}
		} elseif (isset($_SESSION['post']['chars']) && is_array($_SESSION['post']['chars'])) {
			if (in_array($form_field,$_SESSION['post']['chars'])) {
				echo '<span class="error">'.$display.'</span><br />';
				echo '<span style="color: rgb(204, 0, 0); font-size="8px">This field contains illegal characters.</span>';
			} else {
				echo $display;
			}
		} else {
			echo $display;
		}
	}
	
	function error_message() {
		$str = '';
		// Do we have a specific error?
		if (isset($_SESSION['general_error']) && count($_SESSION['general_error']) > 0) {
			foreach($_SESSION['general_error'] as $key=>$val) {
				$str .= $val.'<br />';
			}
		} else {
			$str = '<div id="errorMessage">Sorry, there was an error with your submission.  Fields in <span class="error">Red</span> are required.</div>';
		}
		
		if (isset($_SESSION['post']['errors']) && is_array($_SESSION['post']['errors']) && count($_SESSION['post']['errors']) > 0) {
			?>
			<div class="errorMessage">
				<?=$str?>
			</div>
			<?php
		}
	}
	
	public function userInfoWindow($userInfo) {
		if ($_SESSION['showUserWindow'] == 1) {
			$bigShow = 'block';
			$smallShow = 'none';
		} else {
			$bigShow = 'none';
			$smallShow = 'block';
		}
		?>
		<div class="userWindow" id="userWindow" style="display: <?=$bigShow?>">
		 <table>
		  <tr>
		   <td>Customer:</td>
		   <td><?=stripslashes($userInfo['name'])?></td>
		  </tr>
		  <tr>
		   <td>Email:</td>
		   <td><a href="mailto:<?=$userInfo['email']?>"><?=$userInfo['email']?></a></td>
		  </tr>
		  <tr>
		   <td>Username:</td>
		   <td><?=$userInfo['username']?></td>
		  </tr>
		  <tr>
		   <td>Password:</td>
		   <td><?=$userInfo['password']?></td>
		  </tr>
		 </table>
		 <ul class="tools" style="padding: 10px 0 25px 0;">
			<li><a href="edit_user.php?user_id=<?=$userInfo['id']?>" class="adduser">Edit User</a></li>
                        <li><a href="user_login_do.php?user_id=<?=urlencode($userInfo['username'])?>&password=<?=$userInfo['password']?>" target="_blank" class="login">Login</a></li>
			<li><a href="javascript:void(0);" id="hideWindow" class="hidewindow">Hide Window</a></li>
		</ul>
		
		</div>
		
		<div id="minUserWindow" class="userWindowMin" style="display: <?=$smallShow?>">
			<a href="javascript:void(0);">Show User Window</a>
		</div>
		<?php
	}
	
	public function getInclude($type) {
		global $cfg;
		return file_get_contents($cfg['include_directory'].'/registrationEmail.inc');
	}
	
       
        
	public static function displayQuestionsByTypeId($type_id, $section=null, $options_array, $add_question = false, $iterate = null, $default_answer=true) {
		$questions = document::getDocumentQuestionsByTypeId($type_id, $section);
		
		if ($_REQUEST['id']) {
			$answers = document::getDocumentAnswers($_REQUEST['id']);
			$custom_answers = document::getCustomDocumentAnswers($_REQUEST['id']);
                        $default_answer = false;
		} else {
			$answers = array();                        
		}                
                //var_dump($default_answer);exit;

                if (is_array($questions)) {
			$nums = 1;
			$letters = 'A';
			echo '<table width="100%" class="dataTable">';
			foreach($questions as $questionArray) {
				?>
				<tr>
				<?php
				if ($iterate == 'numbers') {
					?>
					<td><?=$nums?>.</td>
					<?php
				} elseif ($iterate == 'letters') {
					?>
					<td><?=strtoupper($letters)?>.</td>
					<?php
				}
				?>
				<td width="70%"><?=$questionArray['question']?> <?php echo ($add_question) ? '?' : ''; ?></td>
				<?php
				if ($option_name_array = document::getCustomOption($questionArray['id'])) {
					?>
					<td colspan="<?=count($options_array)*2;?>">
					<table width="100%">
					<?php
					foreach($option_name_array as $key => $row) {
						?>
						<tr>
						 <td width="30%" align="right"><?=$row['optionname_before']?></td>
						 <td width="50%"><input style="width: 130px;" type="text" name="custom_question[<?=$row['question_id']?>][<?=$row['id']?>][]" value="<?=$custom_answers[$row['id']]?>" /></td>
						 <?php
						 if (!empty($row['optionname_after'])) {
						 	?>
						 	<td width="10%" nowrap><?=$row['optionname_after']?></td>
						 	<?php
						 }
						 ?>
						</tr>
						<?php
					}
					?>
					</table>
					<?php
				} else {
					foreach($options_array as $key => $value) {
						?>
						<td align="right"><input type="radio" name="question[<?=$questionArray['id']?>]" value="<?=$value?>"  style="width: 10px;" 
						<?php
						if (!empty($answers[$questionArray['id']]) && $answers[$questionArray['id']] == $value) {
							echo ' checked="checked"';
						} elseif ($default_answer && (strtolower($value) == 'yes' || strtolower($value) == 'pass')) {
                                                    echo ' checked="checked"';
                                                }
						?>/></td>
						<td><?=$value?></td>
						<?php
					}
				}
				?>
				</tr>
				<?php
				$nums++;
				$letters = document::iterate($letters);
			}
			echo '</table>';
		}
	}
	
	public static function getTechs($techs, $name, $selected=null) {
		?>
		<select name="<?=$name?>">
		<option value="">-- Select --</option>
		<?php
		foreach($techs as $t) {
//                        if ($t['cfaa_number'] != '') {
//                            $name = $t['name'].' (CFAA #:'.$t['cfaa_number'].')';
//                        } else {
//                            $name = $t['name'];
//                        }
                        
                        $name = $t['name'];
			?>
			<option value="<?=$name?>" <?php echo ($t['name'] == $selected) ? ' selected' : '';?>><?=$t['name']?></option>
			<?php
		}
		?>	
		</select>
		<?php
	}
	
	public static function getCFAA($techs, $name, $selected=null) {
		?>
		<select name="<?=$name?>">
		<option value="">-- Select --</option>
		<?php
		foreach($techs as $t) {
			?>
			<option value="<?=$t['cfaa_number']?>" <?php echo ($t['cfaa_number'] == $selected) ? ' selected' : '';?>><?=$t['name']?> - <?=$t['cfaa_number']?></option>
			<?php
		}
		?>	
		</select>
		<?php
	}
}