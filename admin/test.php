<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
	<div class="container">
		<input type="text" class="form-control-sm" id="class" data=skill[]>
		<div class="row">
			<div class="col-6" id="table_data">

			</div>
		</div>
	</div>
	<script>
		// $(document).ready(function(){
		// 	$('#class').on('keyup', function () {
        //         var search_term = $(this).val();

        //         $.ajax({
        //             url: 'ajax_live_search.php',
        //             type: "POST",
        //             data: { search: search_term },
        //             success: function (data) {
        //                 $('#table_data').html(data);
        //             }
        //         });
        //     });

			// $("#class").change(function(){
			// 	  var search_term = $("#class option:selected").text()
			// 	  $.ajax({
			// 		url : 'ajax_live_search.php',
			// 		type: "POST",
			// 		data: { search: search_term },
			// 		success: function(data){
			// 			$('#table_data').html(data);
			// 		}
			// 	});
			//  })
	// 	});
	 </script>

<!-- <div class="container">
	<div class="row">
		<table class="col-6 table table-borderless table-secondary table-sm text-center">
			<thead>
				<tr>
					<th>Heading1</th>
					<th>Heading2</th>
					<th>Heading3</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input type="text" name='subject_1' pattern="[0-9]{2}" required> Out of 100</td>
					<td><input type="text" name='subject_1' pattern="[0-9]{2}" required> Out of 100</td>
					<td><input type="text" name='subject_1' pattern="[0-9]{2}" required> Out of 100</td>
				</tr>
			</tbody>
		</table>
	</div>
</div> -->

</body>

</html>