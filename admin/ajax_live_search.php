<?php
$search_value = $_POST['search'];

$conn = mysqli_connect('localhost', 'root', '', 'testing');
$sql = "SELECT * FROM classes WHERE standard LIKE '%{$search_value}%' ";
$result = mysqli_query($conn, $sql) or die("quert failed");

if(mysqli_num_rows($result) > 0 ){
    $output = " 

    ";

    while($row = mysqli_fetch_assoc($result)){
        
        $output .= "
        <thead>
        <tr>
            <th>{$row['lang_1']}</th>
            <th>{$row['lang_2']}</th>
            <th>{$row['lang_3']}</th>
        </tr>
        </thead>
        ";}
    $output .= "
    <tbody>
	    <tr>
			<td><input class='form-control' type='text' name='subject_1' pattern='[0-9]{2}' required> Out of 100</td>
			<td><input class='form-control' type='text' name='subject_2' pattern='[0-9]{2}' required> Out of 100</td>
			<td><input class='form-control' type='text' name='subject_3' pattern='[0-9]{2}' required> Out of 100</td>
		</tr>
	</tbody>
    ";
    mysqli_close($conn);
    echo $output;
}else{
    echo "no record found"; 
}
?>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- <script>
	$(document).ready(function(){
		$("#class").change(function(){
              var search_term = $("#class option:selected").text()
              $.ajax({
				url : 'ajax_live_search.php',
				type: "POST",
				data: { search: search_term },
				success: function(data){
					$('#table_data').html(data);
				}
			});
          })
	});
</script> -->