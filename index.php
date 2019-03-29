<?php require_once("includes/init.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JD Quiz</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

	<link rel="stylesheet" href="styles.css">

</head>
<body>

<?php

$questions = Quiz::find_all();

?>

<div class="jd-quiz">

	<div class="container">

		<div class="progress-bar" data-question-count="<?php echo count($questions); ?>">
			<div class="progress"></div>
		</div>

		<input type="hidden" id="selected_options">

		<?php

		foreach ($questions as $question_key => $question_value) { ?>


			<?php

			$question_id = $question_value->id;

			if ($question_key == 0) {
				$current_item = ' current-item';
			} else {
				$current_item = '';
			}

			?>

			<div class="question-item<?php echo $current_item; ?>">
				<div class="question"><?php echo $question_value->question; ?></div>

				<div class="question-options">
					<div class="question-option">
						<input type="radio" name="q<?php echo $question_id ?>" id="q<?php echo $question_id ?>a" value="1">
						<label for="q<?php echo $question_id ?>a"><?php echo $question_value->option_1; ?></label>
					</div>

					<div class="question-option">
						<input type="radio" name="q<?php echo $question_id ?>" id="q<?php echo $question_id ?>b" value="2">
						<label for="q<?php echo $question_id ?>b"><?php echo $question_value->option_2; ?></label>
					</div>

					<div class="question-option">
						<input type="radio" name="q<?php echo $question_id ?>" id="q<?php echo $question_id ?>c" value="3">
						<label for="q<?php echo $question_id ?>c"><?php echo $question_value->option_3; ?></label>
					</div>

					<div class="question-option">
						<input type="radio" name="q<?php echo $question_id ?>" id="q<?php echo $question_id ?>d" value="4">
						<label for="q<?php echo $question_id ?>d"><?php echo $question_value->option_4; ?></label>
					</div>
				</div>

				<div class="controls">
					<div class="button next-button">Next Question</div>
				</div>
			</div>



		<?php } ?>



		<div class="quiz-results">
			<h3>Quiz Complete</h3>
			<p>You scored</p>
			<div class="score"></div>
			<div class="controls">
					<div class="button restart-button">Restart Quiz</div>
			</div>
		</div>

	</div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="custom.js"></script>


	
</body>
</html>