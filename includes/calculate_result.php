<?php require_once("init.php");

$selected_options = $_POST['selected_options'];
$number_of_questions = strlen($selected_options);
$questions = Quiz::find_all();
$score = 0;

foreach ($questions as $question_key => $question_value) {
	$question_value->answer;
	$selected_option = substr($selected_options, $question_key, 1);
	if ($question_value->answer == $selected_option){
		$score += 1;
	}
}

$percentage_score = round($score / ($number_of_questions /100), 0);

?>
<div class="percentage-score"><?php echo $percentage_score; ?>%</div>
<div class="count-score"><?php echo $score; ?> out of <?php echo $number_of_questions; ?></div>