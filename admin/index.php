<?php


require_once('../mysqli_connect.php');

$query="SELECT  timestamp, name, email, subject, feedback FROM contacts order by timestamp desc" ;

$response = @mysqli_query($DBC, $query);

if($response){

	echo '<table border="1" align="left" cellspacing="5" cellpadding="8">

	<tr>
	<th align="left"><b>Timestamp<b></th>
	<th align="left"><b>Name<b></th>
	<th align="left"><b>E-mail<b></th>
	<th align="left"><b>Subject</b></th>
	<th align="left"><b>Feedback</b></th>
	</tr>' ;

	while($row = mysqli_fetch_array($response)){

		echo '<tr><td align="left">' . 
		$row[timestamp] . '</td><td align="left">' .
		$row[name] . '</td><td align="left">' .
		$row[email] . '</td><td align="left">' .
		$row[subject] . '</td><td align="left">' .
		$row[feedback];
		echo '</tr>';
	}

	echo '</table>';

} else {

	echo "Colud not issue database query";
	echo "mysqli_error$(DBC)" ;
}
	mysqli_close($DBC) ;


?>
