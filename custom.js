

function calculate_result(){

	$.ajax({
        type : 'POST',
        url : 'includes/calculate_result.php',
        dataType : 'html',
        data: {
            selected_options : $("#selected_options").val()
        },
        success : function(data){
        	$( ".score" ).append( data );
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            console.log ('Something went wrong');
        }
    });

    return false;
}


$(document).ready(function(){

	var question_total = $( ".progress-bar" ).data( "question-count" );

	var increment_percentage = 100/question_total;

	var quesiton_count = 0;

	$( ".next-button" ).click(function() {
		var question_input = $( this ).parent().parent().find("[type=radio]:checked");
		if(question_input.is(':checked')) {

			quesiton_count += 1;
			var progress_percentage = increment_percentage * quesiton_count;

			$( ".progress" ).css("width", progress_percentage + "%");

			var selected_value = $("#selected_options").val() + question_input.val();
			$("#selected_options").val(selected_value);
			var next_item = $( ".current-item" ).next();
			$( ".current-item" ).removeClass("current-item");
			if (next_item.hasClass("quiz-results")){
				calculate_result();
			}
			next_item.addClass("current-item");
		} else {
			alert ("Please select an option");
		}	
	});

	$( ".restart-button" ).click(function() {
		$( ".quiz-results" ).removeClass("current-item");
		$( ".question-item" ).first().addClass("current-item");
		$( ".progress" ).css("width", 0 + "%");
		$("#selected_options").val('');
		$(".question-option input").prop("checked", false);
		quesiton_count = 0;
		$( ".score" ).empty();
	});

});

