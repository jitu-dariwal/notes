<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet"/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>

<style>
	.bootstrap-tagsinput input[type="text"]{
		display:none !important;
	}
</style>


<div class="panel-body">
    <form id="sbYearRevForm" class="form-horizontal" method="post">

        <div class="form-group">
            <label class="col-sm-2 control-label">
                 Year(s)<span style="color: red"> *</span>
            </label>
            <div class="col-sm-10">
                <!-- <input type="tel" pattern='\d{9}'  id="msisdn" name="msisdn" placeholder="Subscriber No.(77xxxxxxx)" class="form-control input-sm" required> -->
                <input type="text" id="yearPicker" name="years" class="form-control input-sm"  required>
                 <input class='tags' type="hidden" id="inputTags" data-role="tagsinput" style="display:none">
            </div>
        </div>
    </form>
<div/>

<script>
	$(document).ready(function(){

		$('#inputTags').tagsinput({
			typeaheadjs: {
				minViewMode: 2,
				format: 'yyyy',
				multidate: true,
				endDate: '+0y',
				startDate: '2016'
			}
		});
		 $('#yearPicker').datepicker({

		changeMonth: true,
			changeYear: true,
			showButtonPanel: true,
			format: 'yyyy',
			multidate: true,
			endDate: '+0y',
			startDate: '2016',
			onSelect: function(dateText) {
			$('#inputTags').tagsinput('add', dateText);
		  }
		});


	});
</script>