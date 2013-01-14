<?php
$link = mysql_connect('localhost','crownfire','uu9cyK9f');
mysql_select_db('crownfire',$link);

$type_id = 9;
$section_id = 6;

// We need to know what the next section will be
$query = "SELECT max(section) as max_section FROM document_questions WHERE type_id = $type_id";
$results = mysql_query($query);

$new_section_id = mysql_result($results,0,'max_section')+1;

$query = "SELECT id, question, weight FROM document_questions WHERE type_id = $type_id AND section = $section_id ORDER BY weight";
$results = mysql_query($query);

while ($myrow = mysql_fetch_array($results)) {
	$id 		= $myrow['id'];
	$question 	= $myrow['question'];
	$weight		= $myrow['weight'];
		
	// First we need to insert a new question and get the ID
	$query = "INSERT INTO document_questions SET type_id = $type_id, question = '".mysql_real_escape_string($question)."', section='$new_section_id', weight = '$weight'";
	$res = mysql_query($query);
	
	$new_question_id = mysql_insert_id();
	
	// Now let's get all the options for this question ...
	$query = "SELECT * FROM document_question_options WHERE question_id = $id";
	$results2 = mysql_query($query);
	
	while($myrow2 = mysql_fetch_array($results2)) {
		$option_before = $myrow2['optionname_before'];
		$option_after = $myrow2['optionname_after'];
		
		// Insert the options for new question
		$query = "INSERT INTO 
					document_question_options 
				  SET
				  	question_id			= '".$new_question_id."',
				  	optionname_before	= '".$option_before."',
				  	optionname_after	= '".$option_after."'";
		mysql_query($query);
	}
}
echo mysql_error();
echo "New section is $new_section_id";