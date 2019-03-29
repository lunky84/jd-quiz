<?php

class Quiz extends Db_object{

	protected static $db_table = "questions";
	protected static $db_table_fields = array('question', 'option_1', 'option_2', 'option_3', 'option_4', 'answer');
	public $id;
	public $question;
	public $option_1;
	public $option_2;
	public $option_3;
	public $option_4;
	public $answer;


} // End of class Quiz

?>