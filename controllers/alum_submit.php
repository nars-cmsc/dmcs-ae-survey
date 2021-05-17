<<?php

session_start();

require ('config/connection.php');

$errors = array();
$error;

if(isset($_POST["submit-alum"]))
{
	?>
	<script type="text/javascript">
	window.location="contactemp_ques.php";
	</script>

<?php
}

$ques5c_arr = array(
	"Activities of Households as Employers; Undifferentiated Goods-and Services-producing Activities of Households for Own Use",
	"Activities of International Organizations and Bodies",
	"Administrative and Support Service Activities", "Agriculture, Forestry and Fishing", "Arts, Entertainment and Recreation",
	"Construction", "Education", "Electricity, Gas, Steam and Air Conditioning Supply", "Finance, Banks, and Insurance", 
	"Hotel/Accommodation, and Restaurant and Food Service", "Human Health and Social Work Activities", "Information Technology", 
	"Manufacturing", "Media and Communication", "Mining and Quarrying", "Other Service Activities", 
	"Professional, Scientific and Technical Activities", "Public Administration and Defense; Compulsory Social Security", 
	"Real Estate Activities", "Transportation and Storage", "Water Supply; Sewerage, Waste Management and Remediation Activities", 
	"Wholesale and Retail Trade"
);

$ques8_arr = array (
	"Armed Forces Occupations", "Clerical Support Workers", 
	"Craft and Related Trade Workers", "Elementary Occupations (e.g. laborers and unskilled workers, domestic helpers, etc.)", 
	"Managers", "Plant and Machine Operators, and Assemblers", "Professionals", "Service and Sales Workers",
	"Skilled Agricultural, Forestry and Fishery Workers", "Technicians and Associate Professionals"
);

$ques18_arr = array(
	"Possess the skills and mindset to improve human life", 
	"Commit to the freedom and welfare of all",
	"Demonstrate mastery of knowledge in your specific discipline",
	"Possess breadth of mind",
	"Possess strength of character",
	"Possess generosity of spirit",
	"Inclusively engage with society and the world at large",
	"Be mindful of the needs and capabilities of people",
	"Be sensitive to the challenges and opportunities of national development and global change",
	"Think critically",
	"Demonstrate discernment"
);


/*if(isset($_POST["submit-alum"]))
{
	?>
	<script type="text/javascript">
	window.location="contactemp_ques.php";
	</script>

<?php
}*/

// ALUMNI SURVEY

// use $_POST['<name>'] to get info from survey form
// if user clicks submit button in alum_survey
if (isset($_POST['submit-alum']) && $_POST['submitted'] == '1') {
	$id = mysqli_real_escape_string($db_conn, $_POST['user_id']);

	$user_check_query = "SELECT * FROM alum_survey WHERE user_id='$id' LIMIT 1";
  	$result = mysqli_query($db_conn, $user_check_query);
  	$user = mysqli_fetch_assoc($result);

 	// if user already answered the survey
	if($user){ 
	    if ($user['user_id'] == $id) {
		    $errors['user'] = "Feedback from user already exists";
		    $error = true;
		    $user_exist = true;
	    }
	}else {
		$error = false;
		$user_exist = false;
	} 
	// end of else user does not exist
	
	// variables for each question
	
	if (isset($_POST['ques1'])) {
		$one = $_POST['ques1'];
	}
	if (isset($_POST['ques2'])) {
		$two = $_POST['ques2'];
	}
	if (isset($_POST['ques3'])) {
		$three = $_POST['ques3'];
	}
	if (isset($_POST['ques4'])) {
		$four = $_POST['ques4'];
	}
/*	if (isset($_POST['ques5'])) {
	$five = $_POST['ques5'];
		if ($five == 'Yes') {
			$five_a = $_POST['ques5_1'];
			$five_c = $_POST['ques5c'];
			if ($five_c == 'other') {
			$five_c_other = $_POST['ques5c_other'];
			}		
		}
		else if ($five == 'No') {
			$five_b = $_POST['ques5_2'];
		}	
	} */
	if (isset($_POST['ques6'])) {
		$six = $_POST['ques6'];
		if ($six == 'Associate’s degree') {
			$sixacademicfield = $_POST['ques6_acadfield'];
		} 
		if ($six == 'Bachelor’s degree') {
			$sixacademicfield = $_POST['ques6_acadfield'];
		}
		if ($six == 'Master’s degree') {
			$sixacademicfield = $_POST['ques6_acadfield'];
		}
		if ($six == 'Doctoral degree') {
			$sixacademicfield = $_POST['ques6_acadfield'];
		}
		else if ($six == 'other'){
			$sixothers = $_POST['ques6_others'];
		}	
	}
	if (isset($_POST['ques7'])) {
		$seven = $_POST['ques7'];
		if ($seven == 'Associate’s degree') {
			$sevenacademicfield = $_POST['ques7_acadfield'];
		} 
		if ($seven == 'Bachelor’s degree') {
			$sevenacademicfield = $_POST['ques7_acadfield'];
		}
		if ($seven == 'Master’s degree') {
			$sevenacademicfield = $_POST['ques7_acadfield'];
		}
		if ($seven == 'Doctoral degree') {
			$sevenacademicfield = $_POST['ques7_acadfield'];
		}
		else if ($seven == 'other'){
			$sevenothers = $_POST['ques7_others'];
		}	
	}
	if (isset($_POST['ques8'])) {
		$eight = $_POST['ques8'];
	}
	if (isset($_POST['ques9'])) {
		$nine = $_POST['ques9'];
	}
	//if (isset($_POST['ques10'])) {
	//	$ten = $_POST['ques10'];
	//}
	
	if (isset($_POST['ques11'])) {
		$eleven = $_POST['ques11'];
		if ($eleven == 'Yes') {
			$eleven_a = $_POST['ques11_1'];
		}
	}
	if (isset($_POST['ques12'])) {
		$twelve = $_POST['ques12'];
		if ($twelve == 'No experience') {
			$twelve_a = $_POST['ques12_1'];
		} else if ($twelve == 'Less than one (1) year') {
			$twelve_a = $_POST['ques12_1'];
		} else if ($twelve == 'One (1) to three (3) years') {
			$twelve_a = $_POST['ques12_1'];
		} else if ($twelve == 'Three (3) to six (6) years') {
			$twelve_a = $_POST['ques12_1'];
		} else if ($twelve == 'More than six (6+) years') {
			$twelve_a = $_POST['ques12_1'];
		}
	}

	if (isset($_POST['ques13'])) {
		$thirteen = $_POST['ques13'];
	}
	if (isset($_POST['ques14'])) {
		$fourteen = $_POST['ques14'];
	}
	if (isset($_POST['ques15'])) {
		$fifteen = $_POST['ques15'];
	}
	if (isset($_POST['ques16'])) {
		$sixteen = $_POST['ques16'];
	}
	if (isset($_POST['ques17'])) {
		$seventeen = $_POST['ques17'];
	}
	if (isset($_POST['ques18_1'])) {
		$eighteen_a = $_POST['ques18_1'];
	}
	if (isset($_POST['ques18_2'])) {
		$eighteen_b = $_POST['ques18_2'];
	}
	if (isset($_POST['ques18_3'])) {
		$eighteen_c = $_POST['ques18_3'];
	}
	if (isset($_POST['ques18_4'])) {
		$eighteen_d = $_POST['ques18_4'];
	}
	if (isset($_POST['ques18_5'])) {
		$eighteen_e = $_POST['ques18_5'];
	}
	if (isset($_POST['ques18_6'])) {
		$eighteen_f = $_POST['ques18_6'];
	}
	if (isset($_POST['ques18_7'])) {
		$eighteen_g = $_POST['ques18_7'];
	}
	if (isset($_POST['ques18_8'])) {
		$eighteen_h = $_POST['ques18_8'];
	}
	if (isset($_POST['ques18_9'])) {
		$eighteen_i = $_POST['ques18_9'];
	}
	if (isset($_POST['ques18_10'])) {
		$eighteen_j = $_POST['ques18_10'];
	}
	if (isset($_POST['ques18_11'])) {
		$eighteen_k = $_POST['ques18_11'];
	}
	if (isset($_POST['ques19'])) {
		$nineteen = $_POST['ques19'];
		if ($nineteen == 'Yes') {
			$nineteen_txt = $_POST['ques19_ytxt'];
		}
	} 
	
	
	
	// VALIDATION / ERROR HANDLING

	// ERROR: required fields are empty or only white spaces
	
		if (empty($one) && $user_exist == false) {
		$errors['es_q1'] = "Need to answer #1. Field cannot be empty.";
		$error = true;
	}
		if (empty($two) && $user_exist == false) {
		$errors['es_q2'] = "Need to answer #2. Field cannot be empty.";
		$error = true;
	}	
		if (empty($three) && $user_exist == false) {
		$errors['es_q3'] = "Need to answer #3. Field cannot be empty.";
		$error = true;
	}
		if (empty($four) && $user_exist == false) {
		$errors['es_q4'] = "Need to answer #4. Field cannot be empty.";
		$error = true;
	}	
/*		if (empty($five) && $user_exist == false) {
		$errors['es_q5'] = "Need to answer #5. Field cannot be empty.";
		$error = true;
	}
		if (isset($_POST['ques5']) && $five == 'Yes' && $user_exist == false) {
			$errors['es_q5_1'] = "Need to answer #5.1. Field cannot be empty.";
			$error = true;
		}
		if (isset($_POST['ques5']) && $five == 'No' && $user_exist == false) {
			$errors['es_q5_2'] = "Need to answer #5.2. Field cannot be empty.";
			$error = true;
		}
		if (isset($_POST['ques5']) && $five == 'Yes' && $user_exist == false) {
			$errors['es_q5_3'] = "Need to answer #5.3. Field cannot be empty.";
			$error = true;
		}
			if (isset($_POST['ques5']) && $five_c == 'other' && (empty($five_c_other) || strlen(trim($five_c_other)) <= 0) && $user_exist == false) {
				$errors['es_q5_3_other'] = "Need to answer #5c. 'Others' field cannot be empty.";
				$error = true; 
			}		*/
		if (empty($six) && $user_exist == false) {
		$errors['es_q6'] = "Need to answer #6. Field cannot be empty.";
		$error = true;
	}
		if (isset($_POST['ques6']) && $six == 'Associate’s degree'
		&& (empty($sixacademicfield) || strlen(trim($sixacademicfield)) <= 0) && $user_exist == false) {
				$errors['es_q6'] = "Need to answer #6. Field cannot be empty.";
				$error = true;
			}	
		if (isset($_POST['ques6']) && $six == 'Bachelor’s degree'
		&& (empty($sixacademicfield) || strlen(trim($sixacademicfield)) <= 0) && $user_exist == false) {
				$errors['es_q6'] = "Need to answer #6. Field cannot be empty.";
				$error = true;
			}
		if (isset($_POST['ques6']) && $six == 'Master’s degree'
		&& (empty($sixacademicfield) || strlen(trim($sixacademicfield)) <= 0) && $user_exist == false) {
				$errors['es_q6'] = "Need to answer #6. Field cannot be empty.";
				$error = true;
			}
		if (isset($_POST['ques6']) && $six == 'Doctoral degree'
		&& (empty($sixacademicfield) || strlen(trim($sixacademicfield)) <= 0) && $user_exist == false) {
				$errors['es_q6'] = "Need to answer #6. Field cannot be empty.";
				$error = true;
			}
		if (isset($_POST['ques6']) && $six == 'other'
		&& (empty($sixothers) || strlen(trim($sixothers)) <= 0) && $user_exist == false) {
				$errors['es_q6'] = "Need to answer #6. Field cannot be empty.";
				$error = true;
			}
		if (empty($seven) && $user_exist == false) {
		$errors['es_q7'] = "Need to answer #7. Field cannot be empty.";
		$error = true;
	}
		if (isset($_POST['ques7']) && $seven == 'Associate’s degree'
		&& (empty($sevenacademicfield) || strlen(trim($sevenacademicfield)) <= 0) && $user_exist == false) {
				$errors['es_q7'] = "Need to answer #7. Field cannot be empty.";
				$error = true;
			}	
		if (isset($_POST['ques7']) && $seven == 'Bachelor’s degree'
		&& (empty($sevenacademicfield) || strlen(trim($sevenacademicfield)) <= 0) && $user_exist == false) {
				$errors['es_q7'] = "Need to answer #7. Field cannot be empty.";
				$error = true;
			}
		if (isset($_POST['ques7']) && $seven == 'Master’s degree'
		&& (empty($sevenacademicfield) || strlen(trim($sevenacademicfield)) <= 0) && $user_exist == false) {
				$errors['es_q7'] = "Need to answer #7. Field cannot be empty.";
				$error = true;
			}
		if (isset($_POST['ques7']) && $seven == 'Doctoral degree'
		&& (empty($sevenacademicfield) || strlen(trim($sevenacademicfield)) <= 0) && $user_exist == false) {
				$errors['es_q7'] = "Need to answer #7. Field cannot be empty.";
				$error = true;
			}
		if (isset($_POST['ques7']) && $seven == 'other'
		&& (empty($sevenothers) || strlen(trim($sevenothers)) <= 0) && $user_exist == false) {
				$errors['es_q7'] = "Need to answer #7. Field cannot be empty.";
				$error = true;
			}
		
		if (empty($eight) && $user_exist == false) {
		$errors['es_q8'] = "Need to answer #8. Field cannot be empty.";
		$error = true;
	}
		if (empty($nine) && $user_exist == false) {
		$errors['es_q9'] = "Need to answer #9. Field cannot be empty.";
		$error = true;
	}
	//	if (empty($ten) && $user_exist == false) {
	//	$errors['es_q10'] = "Need to answer #10. Field cannot be empty.";
	//	$error = true;
	//}
		if (empty($eleven) && $user_exist == false) {
		$errors['es_q11'] = "Need to answer #11. Field cannot be empty.";
		$error = true;
	}
		if (isset($_POST['ques11']) && $eleven == 'Yes' && empty($eleven_a) && $user_exist == false) {
		$errors['es_q11_1'] = "Need to answer #11.1. Field cannot be empty.";
		$error = true;
	}
		if (empty($twelve) && $user_exist == false) {
			$errors['es_q12'] = "Need to answer #12. Field cannot be empty.";
			$error = true;
	}
		if (isset($_POST['ques12']) && $twelve == 'No experience'
		&& (empty($twelve_a) || strlen(trim($twelve_a)) <= 0) && $user_exist == false) {
			$errors['es_q12_1'] = "Need to answer #12. Field cannot be empty.";
			$error = true;
		}
		if (isset($_POST['ques12']) && $twelve == 'Less than one (1) year'
		&& (empty($twelve_a) || strlen(trim($twelve_a)) <= 0) && $user_exist == false) {
			$errors['es_q12_1'] = "Need to answer #12. Field cannot be empty.";
			$error = true;
		}
		if (isset($_POST['ques12']) && $twelve == 'One (1) to three (3) years'
		&& (empty($twelve_a) || strlen(trim($twelve_a)) <= 0) && $user_exist == false) {
			$errors['es_q12_1'] = "Need to answer #12. Field cannot be empty.";
			$error = true;
		}
		if (isset($_POST['ques12']) && $twelve == 'Three (3) to six (6) years'
		&& (empty($twelve_a) || strlen(trim($twelve_a)) <= 0) && $user_exist == false) {
			$errors['es_q12_1'] = "Need to answer #12. Field cannot be empty.";
			$error = true;
		}
		if (isset($_POST['ques12']) && $twelve == 'More than six (6+) years'
		&& (empty($twelve_a) || strlen(trim($twelve_a)) <= 0) && $user_exist == false) {
			$errors['es_q12_1'] = "Need to answer #12. Field cannot be empty.";
			$error = true;
		}
		
		if (empty($thirteen) && $user_exist == false) {
		$errors['es_q13'] = "Need to answer #13. Field cannot be empty.";
		$error = true;
	}
		if (empty($fourteen) && $user_exist == false) {
		$errors['es_q14'] = "Need to answer #14. Field cannot be empty.";
		$error = true;
	}
		if (empty($fifteen) && $user_exist == false) {
		$errors['es_q15'] = "Need to answer #15. Field cannot be empty.";
		$error = true;
	}
		if (empty($sixteen) && $user_exist == false) {
		$errors['es_q16'] = "Need to answer #16. Field cannot be empty.";
		$error = true;
	}
		if (empty($seventeen) && $user_exist == false) {
		$errors['es_q17'] = "Need to answer #17. Field cannot be empty.";
		$error = true;
	}
	if (empty($eighteen_a) || empty($eighteen_b) || empty($eighteen_c) ||
		empty($eighteen_d) || empty($eighteen_e) || empty($eighteen_f) ||
		empty($eighteen_g) || empty($eighteen_h) || empty($eighteen_i) ||
		empty($eighteen_j) || empty($eighteen_k)  && $user_exist == false) {
		$errors['es_q18'] = "There are items in #18 that were not answered.";
		$error = true;
	}

	if (empty($nineteen) && $user_exist == false) {
		$errors['es_q19'] = "Need to answer #19. Field cannot be empty.";
		$error = true;
	}
	if (isset($_POST['ques19']) && $nineteen == 'Yes' && (empty($nineteen_txt) || strlen(trim($nineteen_txt)) <= 0) && $user_exist == false) {
		$errors['es_q19'] = "Need to answer #19. 'Yes' field cannot be empty.";
		$error = true;
	}

		
	
	// if there are no errors store answers to db
	if ($error == false) {
		// QUESTION NUMBER 1
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['one']);
		$one = mysqli_real_escape_string($db_conn, $_POST['ques1']);

		// store to db
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$one')";
	    mysqli_query($db_conn, $sql);
		
		// QUESTION NUMBER 2
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['two']);
		$two = mysqli_real_escape_string($db_conn, $_POST['ques2']);

		// store to db
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$two')";
	    mysqli_query($db_conn, $sql);
	
		// QUESTION NUMBER 3
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['three']);
		$three = mysqli_real_escape_string($db_conn, $_POST['ques3']);

		// store to db
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$three')";
	    mysqli_query($db_conn, $sql);
		
		// QUESTION NUMBER 4
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['four']);
		$four = mysqli_real_escape_string($db_conn, $_POST['ques4']);

		// store to db
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$four')";
	    mysqli_query($db_conn, $sql);
		
		
/*		// QUESTION NUMBER 5 Other shit balikan mo itooooeezzz
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['five']);
		$five = mysqli_real_escape_string($db_conn, $_POST['ques5']);
		
		if ($five == 'Yes') {
			$five_a = "Yes_" . mysqli_real_escape_string($db_conn, $_POST['ques5_1']);
			$five_c = "Yes_" . mysqli_real_escape_string($db_conn, $_POST['ques5c']);
				if (five_c == 'other'){
				$five_c_field = "Other_" . mysqli_real_escape_string($db_conn, $five_c_other);
				} else {
				$five_c_field = $five_c;
				}
		} else {
			$five_b = "No_" . mysqli_real_escape_string($db_conn, $_POST['ques5_2']);
		}
		
		
		// store to db
		$sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$five_a')";
		mysqli_query($db_conn, $sql);
		$sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$five_b')";
		mysqli_query($db_conn, $sql);
		$sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$five_c')";
		mysqli_query($db_conn, $sql);
		$sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$five_c_field')";
		mysqli_query($db_conn, $sql);
		
		*/			
		// QUESTION NUMBER 6
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['six']);
		$six = mysqli_real_escape_string($db_conn, $_POST['ques6']);

		
		if ($six == 'Associate’s degree') {
			$sixfield = "Associate’s degree_" . mysqli_real_escape_string($db_conn, $_POST['ques6_acadfield']);
		} else if ($six == 'Bachelor’s degree') {
			$sixfield = "Bachelor’s degree_" . mysqli_real_escape_string($db_conn, $_POST['ques6_acadfield']);
		} else if ($six == 'Master’s degree') {
			$sixfield = "Master’s degree_" . mysqli_real_escape_string($db_conn, $_POST['ques6_acadfield']);
		} else if ($six == 'Doctoral degree') {
			$sixfield = "Doctoral degree_" . mysqli_real_escape_string($db_conn, $_POST['ques6_acadfield']);
		} else if ($six == 'other'){
			$sixfield =  "Other_" . mysqli_real_escape_string($db_conn, $_POST['ques6_others']);
		} else {
			$sixfield = $six;
		}
		

		// store to db
		 $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$sixfield')";
	    mysqli_query($db_conn, $sql);
		
		// QUESTION NUMBER 7
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['seven']);
		$seven = mysqli_real_escape_string($db_conn, $_POST['ques7']);

		
		if ($seven == 'Associate’s degree') {
			$sevenfield = "Associate’s degree_" . mysqli_real_escape_string($db_conn, $_POST['ques7_acadfield']);
		} else if ($seven == 'Bachelor’s degree') {
			$sevenfield = "Bachelor’s degree_" . mysqli_real_escape_string($db_conn, $_POST['ques7_acadfield']);
		} else if ($seven == 'Master’s degree') {
			$sevenfield = "Master’s degree_" . mysqli_real_escape_string($db_conn, $_POST['ques7_acadfield']);
		} else if ($seven == 'Doctoral degree') {
			$sevenfield = "Doctoral degree_" . mysqli_real_escape_string($db_conn, $_POST['ques7_acadfield']);
		} else if ($seven == 'other'){
			$sevenfield =  "Other_" . mysqli_real_escape_string($db_conn, $_POST['ques7_others']);
		} else {
			$sevenfield = $seven;
		}
	
		// store to db
		 $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$sevenfield')";
	    mysqli_query($db_conn, $sql);
			
		
		// QUESTION NUMBER 8
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['eight']);
		$eight = mysqli_real_escape_string($db_conn, $_POST['ques8']);

		// store to db
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$eight')";
	    mysqli_query($db_conn, $sql);
		
		// QUESTION NUMBER 9
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['nine']);
		$nine = mysqli_real_escape_string($db_conn, $_POST['ques9']);

		// store to db
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$nine')";
	    mysqli_query($db_conn, $sql);
		
		// QUESTION NUMBER 10
		//$ques_num = mysqli_real_escape_string($db_conn, $_POST['ten']);
		//$ten = mysqli_real_escape_string($db_conn, $_POST['ques10']);

		// store to db
	    //$sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$ten')";
	    //mysqli_query($db_conn, $sql);
		
		// QUESTION NUMBER 11
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['eleven']);
		$eleven = mysqli_real_escape_string($db_conn, $_POST['ques11']);
		
		if ($eleven == 'Yes') {
			$eleven_field = "Yes_" . mysqli_real_escape_string($db_conn, $_POST['ques11_1']);
		} else {
			$eleven_field = $eleven;
		}
		// store to db
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$eleven_field')";
	    mysqli_query($db_conn, $sql);
	
		
		// QUESTION NUMBER 12
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['twelve']);
		$twelve = mysqli_real_escape_string($db_conn, $_POST['ques12']);
		
		if ($twelve == 'No experience') {
			$twelve_field = "No experience_" . mysqli_real_escape_string($db_conn, $_POST['ques12_1']);
		} else if ($twelve == 'Less than one (1) year') {
			$twelve_field = "Less than one (1) year_" . mysqli_real_escape_string($db_conn, $_POST['ques12_1']);
		} else if ($twelve == 'One (1) to three (3) years') {
			$twelve_field = "One (1) to three (3) years_" . mysqli_real_escape_string($db_conn, $_POST['ques12_1']);
		} else if ($twelve == 'Three (3) to six (6) years') {
			$twelve_field = "Three (3) to six (6) years_" . mysqli_real_escape_string($db_conn, $_POST['ques12_1']);
		} else if ($twelve == 'More than six (6+) years') {
			$twelve_field = "More than six (6+) years_" . mysqli_real_escape_string($db_conn, $_POST['ques12_1']);
		}
	
		// store to db
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$twelve_field')";
	    mysqli_query($db_conn, $sql);
	
		
		// QUESTION NUMBER 13
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['thirteen']);
		$thirteen = mysqli_real_escape_string($db_conn, $_POST['ques13']);

		// store to db
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$thirteen')";
	    mysqli_query($db_conn, $sql);
		
		// QUESTION NUMBER 14
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['fourteen']);
		$fourteen = mysqli_real_escape_string($db_conn, $_POST['ques14']);

		// store to db
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$fourteen')";
	    mysqli_query($db_conn, $sql);
		
		// QUESTION NUMBER 15
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['fifteen']);
		$fifteen = mysqli_real_escape_string($db_conn, $_POST['ques15']);

		// store to db
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$fifteen')";
	    mysqli_query($db_conn, $sql);
		
		// QUESTION NUMBER 16
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['sixteen']);
		$sixteen = mysqli_real_escape_string($db_conn, $_POST['ques16']);

		// store to db
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$sixteen')";
	    mysqli_query($db_conn, $sql);
		
		// QUESTION NUMBER 17
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['seventeen']);
		$seventeen = mysqli_real_escape_string($db_conn, $_POST['ques17']);

		// store to db
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$seventeen')";
	    mysqli_query($db_conn, $sql);
		
		// QUESTION NUMBER 18
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['eighteen']);
		$eighteen_a = mysqli_real_escape_string($db_conn, $_POST['ques18_1']);
		$eighteen_b = mysqli_real_escape_string($db_conn, $_POST['ques18_2']);
		$eighteen_c = mysqli_real_escape_string($db_conn, $_POST['ques18_3']);
		$eighteen_d = mysqli_real_escape_string($db_conn, $_POST['ques18_4']);
		$eighteen_e = mysqli_real_escape_string($db_conn, $_POST['ques18_5']);
		$eighteen_f = mysqli_real_escape_string($db_conn, $_POST['ques18_6']);
		$eighteen_g = mysqli_real_escape_string($db_conn, $_POST['ques18_7']);
		$eighteen_h = mysqli_real_escape_string($db_conn, $_POST['ques18_8']);
		$eighteen_i = mysqli_real_escape_string($db_conn, $_POST['ques18_9']);
		$eighteen_j = mysqli_real_escape_string($db_conn, $_POST['ques18_10']);
		$eighteen_k = mysqli_real_escape_string($db_conn, $_POST['ques18_11']);

		// store to db
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$eighteen_a')";
	    mysqli_query($db_conn, $sql);
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$eighteen_b')";
	    mysqli_query($db_conn, $sql);
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$eighteen_c')";
	    mysqli_query($db_conn, $sql);
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$eighteen_d')";
	    mysqli_query($db_conn, $sql);
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$eighteen_e')";
	    mysqli_query($db_conn, $sql);
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$eighteen_f')";
	    mysqli_query($db_conn, $sql);
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$eighteen_g')";
	    mysqli_query($db_conn, $sql);
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$eighteen_h')";
	    mysqli_query($db_conn, $sql);
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$eighteen_i')";
	    mysqli_query($db_conn, $sql);
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$eighteen_j')";
	    mysqli_query($db_conn, $sql);
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$eighteen_k')";
	    mysqli_query($db_conn, $sql);
		
		// QUESTION NUMBER 19
		$ques_num = mysqli_real_escape_string($db_conn, $_POST['nineteen']);
		$nineteen = mysqli_real_escape_string($db_conn, $_POST['ques19']);
		$nineteen_txt = mysqli_real_escape_string($db_conn, $_POST['ques19_ytxt']);

		// if other is selected
		if ($nineteen == 'Yes') {
			$nineteen_field = mysqli_real_escape_string($db_conn, $nineteen_txt);
		} else {
			$nineteen_field = $nineteen;
		}

		// store to db
	    $sql = "INSERT INTO alum_survey (question_num, user_id, answer_body) VALUES ('$ques_num', '$id', '$nineteen_field')";
	    mysqli_query($db_conn, $sql);
		
	}
}//end of submit-alum

?>